<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m230519_013142_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'dish_id' => $this->integer()->notNull(),
            'check_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
        ]);

        $this->addForeignKey(
            'FK_orders_dish_id',
            '{{%orders}}',
            'dish_id',
            '{{%dishes}}',
            'id'
        );

        $this->addForeignKey(
            'FK_orders_check_id',
            '{{%orders}}',
            'check_id',
            '{{%checks}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'FK_orders_dish_id',
            '{{%orders}}');

        $this->dropForeignKey(
            'FK_orders_check_id',
            '{{%orders}}');

        $this->dropTable('{{%orders}}');
    }
}
