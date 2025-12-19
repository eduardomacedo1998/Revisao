<?php

namespace App\Services;

use App\Repositories\UserReposytori;


class UserService
{
    private $userRepository;

    public function __construct(UserReposytori $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function listAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function loginUser($username, $password)
    {
        return $this->userRepository->getUserByCredentials($username, $password);
    }

    public function registerUser($data)
    {
        return $this->userRepository->createUser($data);
    }
}