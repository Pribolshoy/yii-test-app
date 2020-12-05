<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Авторизация';
$this->breadcrumbs=array(
    'Авторизация',
);
?>

<h1 class="mb-5">Авторизация</h1>

<div class="form">
<?php $form=$this->beginWidget(
    'CActiveForm', array(
    'id'=>'login-form',
    'htmlOptions' => ['class' => 'form-horizontal'],
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    )
); ?>

    <p class="note">Поля отмеченые <span class="required">*</span> обязательны для заполнения.</p>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'username', ['class' => 'col-sm-2 control-label']); ?>
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'password', ['class' => 'col-sm-2 control-label']); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
    </div>

<?php $this->endWidget(); ?>
</div><!-- form -->
