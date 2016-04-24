<?php ob_start(); ?>
<?php
	$link='
		<link rel="stylesheet" href="/mysite/css/list.css">'
 ?>
<div class="container">
	<h3>Список активных групп на текущий год</h3>
		<ol>
			<?php foreach($data["list"] as $row): ?>
				<li class="well well-sm">
					<a href="/mysite/index.php/showgroup?id=<?php echo $row->getId();?>">
						<?php echo $row->getStep().$row->getAbbreviation()." ".$row->getGroupname(); ?>
					</a>
				</li>
			<?php endforeach ?>
		</ol>
</div>
<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>
