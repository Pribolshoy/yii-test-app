<?php
$this->breadcrumbs=array(
    'Пользователи сайта'=>array('index'),
    $model->username=>array('view','id'=>$model->id),
    'Редактирование',
);

$this->menu = array(
    array('label'=>'Пользователи сайта', 'url'=>array('index'), 'visible'=>!Yii::app()->user->isGuest),
);
?>

<h1 class="mb-5">Редактирование пользователя <?php echo $model->username; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>