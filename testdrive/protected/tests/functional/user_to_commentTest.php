<?php

class user_to_commentTest extends WebTestCase
{
	public $fixtures=array(
		'user_to_comments'=>'user_to_comment',
	);

	public function testShow()
	{
		$this->open('?r=user_to_comment/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=user_to_comment/create');
	}

	public function testUpdate()
	{
		$this->open('?r=user_to_comment/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=user_to_comment/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=user_to_comment/index');
	}

	public function testAdmin()
	{
		$this->open('?r=user_to_comment/admin');
	}
}
