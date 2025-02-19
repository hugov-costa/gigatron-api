<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Domain\User\User;
use App\Domain\User\UserNotFoundException;
use App\Domain\User\UserRepository;

class InMemoryUserRepository implements UserRepository
{
    /**
     * {@inheritdoc}
     */
    public function create(array $body): User
    {
        return User::create([
            'city' => $body['city'],
            'email' => $body['email'],
            'name' => $body['name'],
            'phone' => $body['phone'],
            'state' => $body['state'],
            'street' => $body['street'],
            'street_number' => $body['street_number'],
            'zip_code' => $body['zip_code'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return User::all()->toArray();
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfId(int $id): User
    {
        $user = User::where('id', $id)->first();
        
        if (! $user) {
            throw new UserNotFoundException();
        }

        return $user;
    }
}
