<?php
namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    public function __construct(private UserRepository $userRepository) {}

    public function all()
    {
        return $this->userRepository->all();
    }
    public function register($data)
    {
        return $this->userRepository->create($data);
    }

    public function login($email, $password)
    {
        return $this->userRepository->findUser($email, $password);
    }
}
