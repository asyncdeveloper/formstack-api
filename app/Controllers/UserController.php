<?php


namespace App\Controllers;

use App\Models\User;


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
        $data = input()->all([
          'name', 'age', 'address'
        ]);

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
        $user = User::find($id);

        if(is_null($user)) {
            return response()->httpCode(404)->json([ 'message' => 'User not found.' ]);
        }

        return response()
          ->httpCode(200)
          ->json([ 'data' => $user ]);
    }

    public function update(string $id)
    {
        $user = User::find($id);

        if(is_null($user)) {
            return response()->httpCode(404)->json([ 'message' => 'User not found.' ]);
        }

        $data = input()->all([
          'name', 'age', 'address'
        ]);

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
        $user = User::find($id);

        if(is_null($user)) {
            return response()->httpCode(404)->json([ 'message' => 'User not found.' ]);
        }

        $user->delete();

        http_response_code(204);

        return null;
    }

}