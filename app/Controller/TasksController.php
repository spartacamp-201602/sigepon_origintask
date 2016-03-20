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
	
	public function edit($id){
		
		/*$task = $this->Task->findById($id);	
		
		if (!$task){
			$this->Flash->error('そんなタスクないよ');
			$this->redirect(array('action' => 'index'));
		}
		
		if ($this->request->is('post', 'put')){
			
			$this->Task->id = $id;
			
			if ($this->Task->save($this->request->data)){
				$this->Flash->success('タスク' .$id. 'を編集しました' );
				$this->redirect('/tasks/index');
			}else{
				$this->Flash->erroe('編集できませんでした');
			}
		}else{
			$this->request->data = $task;
		}*/
		
		$options = array(
			'conditions' => array(
				'Task.id' => $id,
				'Task.status' => 0
			)
		);
		
		$task = $this->Task->find('first', $options);
		
		if (!$task){
			$this->Flash->error('タスクが見つかりません');
			$this->redirect(array('action' => 'index'));
		}
		
		if ($this->request->is(array('post', 'put'))){
			
			$this->Task->id = $id;
		
		if ($this->Task->save($this->request->data)){
			$this->Flash->success('更新しました');
			return $this->redirect(array('action' => 'index'));
		}else{
			$this->Flash->error('更新できませんでした');
		}
	 }else{
		$this->request->data = $task;
	 }
  }
}