<?php echo $this->Html->css('task'); ?>

<div class="roundBox">
<table>
    <tr>
        <th>ID</th>
        <th>名前<?php //echo h($tasks['Note'] as $note); ?></th>
        <th>期限日</th>
        <th>作成日</th>
        <th>操作</th>
    </tr>
    
        <tr>
            <td><?php echo $this->Html->link($task['Task']['id'], '/Tasks/view/' . $task['Task']['id']); ?></td>
            <td><?php echo h($task['Task']['name']); ?>
            
               	<?php foreach ($task['Note'] as $note) : ?>
   				<li><?php echo h($note['body']) ?></li>
   				<?php endforeach; ?>
                <li><?php echo $this->Html->link('コメントを追加', '/Notes/create'); ?></li>
            
            </td>
            <td><?php echo h($task['Task']['due_date']); ?></td>
            <td><?php echo h($task['Task']['created']); ?></td>
            
            
            <td>
				<?php echo $this->Html->link('このタスクを完了する', '/Tasks/done/' . $task['Task']['id']); ?><br>
                <?php echo $this->Html->link('このタスクを編集する', '/Tasks/edit/' . $task['Task']['id']); ?>
            </td>
        </tr>
    
</table>
</div>