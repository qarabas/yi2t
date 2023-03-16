<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dishes}}`.
 */
class m230316_101959_create_dishes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dishes}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dishes}}');
    }
}
