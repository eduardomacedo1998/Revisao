<?php

namespace App\Repositories;

use App\Models\User;

class UserReposytori
{

    private $UserClass;


    public function __construct(User $user)
    {
        $this->UserClass = $user;
    }

    public function getAllUsers()
    {
        return $this->UserClass->all();
    }

    // Login do usuario
    public function getUserByCredentials($username, $password)
    {
        return $this->UserClass
            ->where('usuario_nome', $username)
            ->where('senha', $password)
            ->first();
    }

    // Criar novo usuario
    public function createUser($data)
    {
        return $this->UserClass->create($data);
    }
}