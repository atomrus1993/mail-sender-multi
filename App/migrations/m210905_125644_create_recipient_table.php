<?php

use yii\db\Migration;

// php yii migrate/create create_recipient_table --fields="email:string:notNull:unique:comment('E-mail')" --comment="Получатели"

/**
 * Handles the creation of table `{{%recipient}}`.
 */
class m210905_125644_create_recipient_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%recipient}}', [
            'id'    => $this->primaryKey(),
            'email' => $this->string()->notNull()->unique()->comment('E-mail'),
        ]);
        $this->addCommentOnTable('{{%recipient}}', 'Получатели');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%recipient}}');
    }
}
