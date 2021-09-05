<?php

use yii\db\Migration;

// php yii migrate/create create_address_book_table --fields="name:string:notNull:comment('Наименование'),total_count:integer:notNull:defaultValue(0):comment('Кол-во')" --comment="Адресные книги"

/**
 * Handles the creation of table `{{%address_book}}`.
 */
class m210905_125308_create_address_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%address_book}}', [
            'id'          => $this->primaryKey(),
            'name'        => $this->string()->notNull()->comment('Наименование'),
            'total_count' => $this->integer()->notNull()->defaultValue(0)->comment('Кол-во'),
        ]);
        $this->addCommentOnTable('{{%address_book}}', 'Адресные книги');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%address_book}}');
    }
}
