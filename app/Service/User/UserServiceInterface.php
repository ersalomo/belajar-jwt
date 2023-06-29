<?php

namespace App\Service\User;

use App\Models\User;

interface UserServiceInterface
{
    public function create($user);
    public function update($user);

    public function listUsers();
    public function getUserById($id);

}
