<?php
$this->breadcrumbs=array(
    $model->username,
);

$this->menu = array(
    array('label'=>'Редактирование', 'url'=>array('update'), 'visible'=>!Yii::app()->user->isGuest),
);
?>

<h1 class="mb-5">Профиль пользователя <?php echo $model->username; ?></h1>

<style>
.avatar-img {
    width: 100%;
    max-width: 150px;
}
</style>

<img src="<?php echo $model->getAvatar() ?>" title="Аватар пользователя <?php echo $model->username; ?>" class="avatar-img mb-4">

<?php $this->widget(
    'zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'id',
        'username',
        'email',
    ),
    )
); ?>
<br>
<p class="mb-0"><b>О себе</b></p>
<p><?php echo ($model->about_me)?: 'Автор ничего о себе не указал' ?></p>
<hr>
<h3>Комментарии:</h3>
<?php $this->widget(
    'application.widgets.CCommentList', array(
    'data'=>$model,
    )
); ?>

<?php if (!Yii::app()->user->isGuest) {
    echo $this->renderPartial(
        '_comment_form', [
        'model' => $comment_form
        ]
    );
}
?>