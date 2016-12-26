<?php

use yii\db\Migration;

/**
 * Handles the creation of table `portfolio`.
 */
class m161225_200640_create_portfolio_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('portfolio', [
            'id' => $this->primaryKey(),
            'title' =>  $this->string()->notNull(),
            'description' =>  $this->string()->notNull(),
            'image' =>  $this->string()->notNull(),
            'url' =>  $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('portfolio');
    }
}
