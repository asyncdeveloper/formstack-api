<?php


namespace App\Controllers;

use App\Models\User;
use Rakit\Validation\Validator;


class UserController
{

    public function index()
    {
        $users = User::all();

        return response()
          ->httpCode(200)
          ->json([ 'data' => $users ]);
    }

    public function store()
    {
        $validator = new Validator;
        $validation = $validator->validate(input()->all(), [
          'first_name' => 'required|alpha|max:191',
          'last_name' => 'required|alpha|max:191',
          'email' => "required|email|max:191|not_in:",
          'password' => 'required|alpha_num|max:191'
        ]);

        if ($validation->fails()) {
            return response()
              ->httpCode(422)
              ->json([ 'message' => $validation->errors()->all() ]);
        }

        $data = $validation->getValidatedData();

        if(User::where('email', $data['email'])->get()->count() > 0) {
            return response()
              ->httpCode(422)
              ->json([ 'message' => 'Email already exists.' ]);
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $user = User::create($data);

        return response()
          ->httpCode(201)
          ->json([
            'data' => $user,
            'message' => 'User created successfully.'
          ]);
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return response()
          ->httpCode(200)
          ->json([ 'data' => $user ]);
    }

    public function update(string $id)
    {
        $user = User::findOrFail($id);

        $validator = new Validator;
        $validation = $validator->validate(input()->all(), [
          'first_name' => "default:{$user->first_name}|alpha|max:191",
          'last_name' => "default:{$user->last_name}|alpha|max:191",
          'email' => "default:{$user->email}|email|max:191"
        ]);

        if ($validation->fails()) {
            return response()
              ->httpCode(422)
              ->json([ 'message' => $validation->errors()->all() ]);
        }

        $data = $validation->getValidatedData();

        $emailAlreadyExist = User::where([
            [ 'email', '=', $data['email'] ],
            [ 'id', '!=', $user->id ],
          ])->get()->count() > 0 ? true : false ;

        if($emailAlreadyExist) {
            return response()
              ->httpCode(422)
              ->json([ 'message' => 'Email already exists.' ]);
        }

        $user->update($data);

        return response()
          ->httpCode(200)
          ->json([
            'data' => $user,
            'message' => 'User updated successfully.'
          ]);
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        http_response_code(204);

        return null;
    }

}