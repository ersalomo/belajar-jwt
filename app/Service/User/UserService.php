<?php

namespace App\Service\User;

use App\Models\User;
use App\Service\User\UserRepository\UserRepository;

class UserService implements UserServiceInterface
{
    private UserRepository $repository;
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;

    }

    public function create($user)
    {
        return $this->repository->create($user);
    }

    public function listUsers()
    {

    }

    public function update($user)
    {
        return $this->repository->update($user);
    }

    public function getUserById($id) {
        return $this->repository->getUserById($id);
    }
}
