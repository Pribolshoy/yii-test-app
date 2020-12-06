<?php

class m201205_170020_create_user_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('user', array(
            'id' => 'integer(11) NOT NULL PRIMARY KEY AUTO_INCREMENT',
            'username' => 'varchar(128) NOT NULL',
            'password' => 'varchar(128) NOT NULL',
            'email' => 'varchar(128) NULL',
            'image' => 'varchar(255) NULL',
            'about_me' => 'text NULL'
        ));
	}

	public function down()
	{
        $this->dropTable('user');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}