<?php

use yii\db\Migration;

/**
 * Class m180210_042925_prueba
 */
class m180210_042925_prueba extends Migration
{
   
    public function up()
    {
        $this->createTable('news', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT,
        ]);
    }

    public function down()
    {
        $this->dropTable('news');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180210_042925_prueba cannot be reverted.\n";

        return false;
    }
    */
}
