<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%chefs}}`.
 */
class m230316_102049_create_chefs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%chefs}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%chefs}}');
    }
}
