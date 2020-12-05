<div class="form">

<?php $form=$this->beginWidget(
    'CActiveForm', array(
    'id'=>'user-form',
    'htmlOptions' => ['enctype'=>'multipart/form-data', 'class' => 'form-horizontal'],
    'enableAjaxValidation'=>false,
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
        <?php echo $form->passwordField($model, 'password', array('size'=>60,'maxlength'=>128, 'value' => '')); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'email', ['class' => 'col-sm-2 control-label']); ?>
        <?php echo $form->textField($model, 'email', array('size'=>60,'maxlength'=>128)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'image', ['class' => 'col-sm-2 control-label']); ?>
        <?php echo $form->fileField($model, 'image'); ?>
        <?php echo $form->error($model, 'image'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'about_me', ['class' => 'col-sm-2 control-label']); ?>
        <?php echo $form->textArea($model, 'about_me', ['rows' => 5, 'cols' => 50]); ?>
        <?php echo $form->error($model, 'about_me'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Сохранить', ['class' => 'btn btn-success']); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->