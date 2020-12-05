<?php
$this->breadcrumbs=array(
    'Пользователи сайта',
);

$this->menu=array(
    array('label'=>'Редактирование', 'url'=>array('update'), 'visible'=>!Yii::app()->user->isGuest),
);
?>

<h1 class="mb-5">Пользователи сайта</h1>

<?php $this->widget(
    'zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )
); ?>
