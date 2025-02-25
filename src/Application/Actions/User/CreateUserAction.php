<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;

class CreateUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $user = $this->userRepository->create($this->request->getParsedBody());

        $this->logger->info("User was created.");

        return $this->respondWithData($user);
    }
}
