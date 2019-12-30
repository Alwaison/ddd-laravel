<?php

namespace Sp\Application\Service\User;

use Sp\Domain\Model\User\User;
use Sp\Domain\Model\User\UserRepository;
use Sp\Domain\Events\DomainEventPublisher;
use Sp\Domain\Model\User\UserLoggedIn;
use Sp\Domain\Service\UseCase;

class UserLoginUseCase implements UseCase
{

    protected $userEmail;
    protected $userPassword;
    protected $userRepository;

    public function __construct(String $aUserEmail, String $aUserPassword, UserRepository $repository)
    {
        $this->userEmail = $aUserEmail;
        $this->userPassword = $aUserPassword;
        $this->userRepository = $repository;
    }

    public function execute(): User
    {

        $userLogged = $this->userRepository->userExists($this->userEmail, $this->userPassword);
        $userLoggedInEvent = new UserLoggedIn($userLogged->id());
        event($userLoggedInEvent);
//        DomainEventPublisher::instance()->publish(
//            userLoggedInEvent
//        );

        return $userLogged;

    }
}
