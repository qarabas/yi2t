<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%checks}}`.
 */
class m230519_012536_create_checks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%checks}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%checks}}');
    }
}
