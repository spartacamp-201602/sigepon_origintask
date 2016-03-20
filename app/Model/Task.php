<?php

class Task extends AppModel{
	public $validate = array(
		'name' => array(
			'rule' => array('between', 5, 30),
				'message' => 'タスクは５文字以上３０文字以内で入力してください'
		),
		'body' => array(
			'rule' => array('maxLength', 255),
			'message' => '詳細は255文字以内で入力してください'
		)
	);
}