<?php

use think\migration\Migrator;

class CreateMemberProfile extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table("member_profile", ['primary_key' => ['uid']]);
        $table->addColumn("uid", "integer", ["signed" => false, "limit" => 15, "null" => false])
            ->addColumn("stu_no", "string", ["default" => "", "null" => false])
            ->addColumn("school", "string", ["default" => "", "null" => false])
            ->addColumn("class", "string", ["default" => "", "null" => false])
            ->addColumn("name", "string", ["default" => "", "null" => false])
            ->addSoftDelete()->addTimestamps()
            ->addForeignKey("uid", "ws_member", "uid", ["delete" => "CASCADE", "update" => "CASCADE"])
            ->save();
    }
}
