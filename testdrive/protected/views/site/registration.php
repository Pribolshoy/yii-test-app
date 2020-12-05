<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Регистрация';
$this->breadcrumbs=array(
    'Регистрация',
);
?>

<h1 class="mb-5">Регистрация</h1>

<div class="form">

<?php $form=$this->beginWidget(
    'CActiveForm', array(
    'id'=>'registration-form',
    'htmlOptions' => ['class' => 'form-horizontal'],
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    )
); ?>

    <p class="note">Поля отмеченые <span class="required">*</span> обязательны для заполнения.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'username', ['class' => 'col-sm-2 control-label']); ?>
        <?php echo $form->textField($model, 'username', array('size'=>60,'maxlength'=>128)); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'password', ['class' => 'col-sm-2 control-label']); ?>
        <?php echo $form->passwordField($model, 'password', array('size'=>60,'maxlength'=>128)); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'email', ['class' => 'col-sm-2 control-label']); ?>
        <?php echo $form->textField($model, 'email', array('size'=>60,'maxlength'=>128)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton('Создать', ['class' => 'btn btn-success']); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
