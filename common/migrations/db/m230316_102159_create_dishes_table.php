<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dishes}}`.
 */
class m230316_102159_create_dishes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dishes}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique(),
            'description' => $this->string(),
            'chef_id' => $this->integer()->notNull(),
            'is_ready' => $this->boolean()->defaultValue(false)
        ]);

        $this->addForeignKey(
            'FK_dishes_chef_id',
            '{{%dishes}}',
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
            'FK_dishes_chef_id',
            '{{%dishes}}');
        $this->dropTable('{{%dishes}}');
    }
}
