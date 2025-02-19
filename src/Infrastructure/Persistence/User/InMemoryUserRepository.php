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
        return User::create($body);
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

    /**
     * {@inheritdoc}
     */
    public function update(int $id, array $body): User
    {
        $user = $this->findUserOfId($id);

        $user->fill($body)->save();

        return $user;
    }
}
