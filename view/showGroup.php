<?php ob_start();

    $link='<link rel="stylesheet" href="/mysite/css/show.css">';
 ?>
<div class="container">
    <h2>Cведения об одной группе:</h2>
    <div class="well well-sm"><?php echo $data->getGroupName()." ".$data->getStep().$data->getAbbreviation(); ?></div>
    <div class="well well-sm">Начало обучения: <?php echo $data->getBeginMonth().".".$data->getBeginYear();?></div>
    <div class="well well-sm">Окончание: <?php echo $data->getEndMonth() .".". $data->getEndYear();?></div>

</div>
<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>
