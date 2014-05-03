<?php namespace IIMS\Repositories;

use IIMS\Models\User;
use IIMS\Interfaces\IUserRepository;

class UserRepository implements IUserRepository {

    public function findAll($fields = [])
    {
        if(empty($fields)) return User::paginate(15);
        return User::paginate(15, $fields);
    }

    public function find($id, $fields = [])
    {
        if(empty($fields)) return User::findOrFail($id);
        return User::findOrFail($id, $fields);
    }

    public function create($input)
    {
        User::create($input);
    }

    public function update($id, $input)
    {
        $user = User::findOrFail($id);
        $user->fill($input);

        $user->save();
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}