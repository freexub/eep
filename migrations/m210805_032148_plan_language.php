<?php

use yii\db\Schema;
use yii\db\Migration;

class m210805_032148_plan_language extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%plan_language}}',
            [
                'id'=> $this->primaryKey(11),
                'name'=> $this->string(50)->notNull(),
                'short_name'=> $this->string(10)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%plan_language}}');
    }
}
