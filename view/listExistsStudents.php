<?php
ob_start();?>
<?php
	$link='<link rel="stylesheet" href="/mysite/css/list.css">'
 ?>
<div class="container">
	<h3>Список всех учеников</h3>
		<ol>
			<?php foreach($data['students'] as $student): ?>
				<li class="well well-sm">
					<a href="/mysite/index.php/addstudenttogroup?student_id=<?php echo $student->getId();?>&group_id=<?php echo $data['group_id']?>">
						<?php echo $student->getName().' '.$student->getSurname(); ?>
					</a>
				</li>
			<?php endforeach ?>
		</ol>
</div>
<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>
