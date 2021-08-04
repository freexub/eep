<?php

use yii\db\Schema;
use yii\db\Migration;

class m210804_082813_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_plan_autor_plan_id',
            '{{%plan_autor}}','plan_id',
            '{{%plan}}','id',
            'CASCADE','CASCADE'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_plan_autor_plan_id', '{{%plan_autor}}');
    }
}
