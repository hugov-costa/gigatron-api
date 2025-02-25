<?php

declare(strict_types=1);

namespace App\Domain\User;

interface UserRepository
{
    /**
     * @param array<string, string> $body
     * @return User
     */
    public function create(array $body): User;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * @return User[]
     */
    public function findAll(): array;

    /**
     * @param string $email
     * @return User
     * @throws UserNotFoundException
     */
    public function findUserOfEmail(string $email): User;

    /**
     * @param int $id
     * @return User
     * @throws UserNotFoundException
     */
    public function findUserOfId(int $id): User;

    /**
     * @param int $id
     * @param array<string, string> $body
     * @return User
     */
    public function update(int $id, array $body): User;
}
