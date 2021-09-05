<?php

use yii\db\Migration;

// php yii migrate/create create_user_table --fields="login:string:unique:notNull:comment('Логин'),hash:string:notNull:comment('Хэш пароль'),last_login:datetime:null:comment('Последний раз был')" --comment="Пользователи"

/**
 * Handles the creation of table `{{%user}}`.
 */
class m210905_124810_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id'         => $this->primaryKey(),
            'login'      => $this->string()->unique()->notNull()->comment('Логин'),
            'hash'       => $this->string()->notNull()->comment('Хэш пароль'),
            'last_login' => $this->datetime()->null()->comment('Последний раз был'),
        ]);
        $this->addCommentOnTable('{{%user}}', 'Пользователи');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
