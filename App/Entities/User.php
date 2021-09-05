<?php

namespace app\Entities;

/**
 * This is the model class for table "user".
 *
 * @property int         $id
 * @property string      $login      Логин
 * @property string      $hash       Хэш пароль
 * @property string|null $last_login Последний раз был
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['login', 'hash'], 'required'],
            [['last_login'], 'safe'],
            [['login', 'hash'], 'string', 'max' => 255],
            [['login'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id'         => 'ID',
            'login'      => 'Логин',
            'hash'       => 'Хэш пароль',
            'last_login' => 'Последний раз был',
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }
}
