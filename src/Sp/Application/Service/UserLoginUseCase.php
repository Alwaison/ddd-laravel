<?php

namespace Sp\Application\Service;

use Sp\Domain\Model\User\User;
use Sp\Domain\Model\User\UserRepository;

class UserLoginUseCase // implements UseCase
{

    protected $userEmail;
    protected $userPassword;
    protected $userRepository;

    public function __construct(String $auserEmail, String $aUserPassword, UserRepository $repository)
    {
        $this->userEmail = $auserEmail;
        $this->userPassword = $aUserPassword;
        $this->userRepository = $repository;
    }
   
    public function execute(): User
    {

        return $this->userRepository->userExists($this->userEmail, $this->userPassword);
        
    }
}