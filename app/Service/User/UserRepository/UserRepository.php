<?php

namespace App\Service\User\UserRepository;

use App\Models\User;
class UserRepository
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create($user) {
        return $this->user->create($user);
    }
    public function update($user) {
        return $this->user->update($user);
    }

    public function getUserById($id) {
        return $this->user->find($id);
    }

}
