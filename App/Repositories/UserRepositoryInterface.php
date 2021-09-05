<?php
/**
 * Created by PhpStorm.
 * User: Matveev.Andrey
 * Date: 05.09.2021
 * Time: 19:03
 */

namespace app\Repositories;

use app\Entities\User;

interface UserRepositoryInterface
{
    public function findById(int $id): ?User;

    public function findByLogin(string $login): ?User;

    public function save(User $user): void;
}
