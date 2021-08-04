<?php

use yii\db\Schema;
use yii\db\Migration;

class m210804_082855_plan_type extends Migration
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
            '{{%plan_type}}',
            [
                'id'=> $this->primaryKey(11),
                'name'=> $this->string(100)->notNull()->comment('Тип ЭУИ'),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%plan_type}}');
    }
}
