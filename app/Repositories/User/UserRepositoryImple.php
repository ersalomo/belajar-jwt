<?php

namespace App\Repositories\User;

class UserRepositoryImple implements UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getUserById($id)
    {
        return $this->model->findOrFail($id);
    }
}
