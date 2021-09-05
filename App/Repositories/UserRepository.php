<?php

/**
 * Created by PhpStorm.
 * User: Matveev.Andrey
 * Date: 05.09.2021
 * Time: 18:40
 */

namespace app\Repositories;

use app\Entities\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return User|\yii\db\ActiveRecord|null
     */
    public function findById(int $id): ?User
    {
        return $this->getBy(['id' => $id]);
    }

    /**
     * @param string $login
     *
     * @return User|\yii\db\ActiveRecord|null
     */
    public function findByLogin(string $login): ?User
    {
        return $this->getBy(['login' => $login]);
    }

    /**
     * @param User $user
     */
    public function save(User $user): void
    {
        if (!$user->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    /**
     * @param array $condition
     *
     * @return User
     */
    private function getBy(array $condition): User
    {
        if (!$user = User::find()->andWhere($condition)->limit(1)->one()) {
            throw new \DomainException('User not found.');
        }
        return $user;
    }
}
