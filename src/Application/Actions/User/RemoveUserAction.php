<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;

class RemoveUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $userId = (int) $this->resolveArg('id');
        $user = $this->userRepository->delete($userId);

        $this->logger->info("User was removed.");

        return $this->respondWithData($user);
    }
}
