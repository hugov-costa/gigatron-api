<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

namespace App\Application\Actions\User;

use App\Application\Actions\Action;
use App\Domain\User\UserRepository;
use Psr\Log\LoggerInterface;

abstract class UserAction extends Action
{
    protected UserRepository $userRepository;

    public function __construct(LoggerInterface $logger, UserRepository $userRepository)
    {
        die($userRepository);
        parent::__construct($logger);
        $this->userRepository = $userRepository;
    }
}
