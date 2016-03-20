<?php

class TasksController extends AppController {
    //public $scaffold;
	
	public $helper = array('Html', 'Form');
	//public $helper = ['Html', 'Form'];
	public $components = array('Flash');
	
	public function index(){
		$options = array(
			'conditions' => array(
			'Task.status' => 0)
	);
	
	$tasks = $this->Task->find('all', $options);
	
	$this->set('tasks', $tasks);
	
	}
	
	public function done($id) {
		
        $this->Task->id = $id;
        $this->Task->saveField('status', 1);

        $msg = sprintf('タスク %s を完了しました', $id);
		
		$this->Flash->success('タスク' .$id. 'を完了しました');

//        $this->Flash->success($msg);
//        return $this->redirect(array('action' => 'index'));
    }
	
	public function create() {
        if ($this->request->is('post')) {

           if ($this->Task->save($this->request->data)){
           // $msg = sprintf('タスク %s を作成しました', $this->Task->id);
           // $this->Flash->success($msg);
		   
		   $this->Flash->success('保存成功!');
           $this->redirect(array('action' => 'index'));
		   }else{
			   $this->Flash->error('保存できませんでした...');
		   }
        }
    }
}