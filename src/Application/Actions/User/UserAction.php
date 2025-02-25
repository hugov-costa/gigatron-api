<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

require dirname(__DIR__, 4) . '/app/database.php';

use App\Application\Actions\Action;
use App\Domain\User\UserRepository;
use Psr\Log\LoggerInterface;

abstract class UserAction extends Action
{
    protected UserRepository $userRepository;

    public function __construct(LoggerInterface $logger, UserRepository $userRepository)
    {
        parent::__construct($logger);
        $this->userRepository = $userRepository;
    }
}
