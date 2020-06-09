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
          'email', 'first_name', 'last_name', 'password'
        ]);

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
        $user = User::find($id);

        return response()
          ->httpCode(200)
          ->json([ 'data' => $user ]);
    }

    public function update(string $id)
    {
        $user = User::find($id);

        $data = input()->all([
          'email', 'first_name', 'last_name'
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
        $user = User::findOrFail($id);

        $user->delete();

        http_response_code(204);

        return null;
    }

}