<?php //debug($tasks); ?>

<?php echo $this->Html->link('新規タスク', '/Tasks/create') ?>

<h3><?php echo count($tasks); ?>件のタスクが未完了です</h3>

<?php foreach ($tasks as $task) : ?>

	<?php echo $this->element('task',array('task' => $task)); ?>

<?php endforeach; ?>