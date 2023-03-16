<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m230316_102101_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'order_number' => $this->integer(),
            'dish_id' => $this->integer(),
            'chef_id' => $this->integer(),
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
            'FK_orders_chef_id',
            '{{%orders}}',
            'chef_id',
            '{{%chefs}}',
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
            'FK_orders_chef_id',
            '{{%orders}}');

        $this->dropTable('{{%orders}}');
    }
}
