<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Domain\User\User;
use Firebase\JWT\JWT;
use Psr\Http\Message\ResponseInterface as Response;

class CreateUserTokenAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $userEmail = $this->request->getParsedBody()['email'];
        $user = $this->userRepository->findUserOfEmail($userEmail);
        $token = $this->generateJwt($user);

        $this->logger->info("User of email {$userEmail} generated a token.");

        return $this->respondWithData($token);
    }

    private function generateJwt(User $user): string
    {
        $issuedAt = time();
        $expirationTime = $issuedAt + 3600;
        $payload = [
            'iss' => 'app',
            'iat' => $issuedAt,
            'exp' => $expirationTime,
            'sub' => $user->id
        ];

        return JWT::encode($payload, $_ENV['JWT_SECRET'], 'HS256');
    }
}
