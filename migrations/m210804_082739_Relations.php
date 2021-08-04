<?php

use yii\db\Schema;
use yii\db\Migration;

class m210804_082739_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_plan_status_id',
            '{{%plan}}','status_id',
            '{{%plan_status}}','id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_plan_type_id',
            '{{%plan}}','type_id',
            '{{%plan_type}}','id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_plan_cathedra_id',
            '{{%plan}}','cathedra_id',
            '{{%plan_cathedra}}','id',
            'CASCADE','CASCADE'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_plan_status_id', '{{%plan}}');
        $this->dropForeignKey('fk_plan_type_id', '{{%plan}}');
        $this->dropForeignKey('fk_plan_cathedra_id', '{{%plan}}');
    }
}
