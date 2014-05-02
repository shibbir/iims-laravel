<?php namespace IIMS\Repositories;

use IIMS\Models\User;
use IIMS\Interfaces\IUserRepository;

class UserRepository implements IUserRepository {

    public function findAll()
    {
        return User::paginate(15);
    }

    public function find($id)
    {
        return User::findOrFail($id);
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
    {}
}