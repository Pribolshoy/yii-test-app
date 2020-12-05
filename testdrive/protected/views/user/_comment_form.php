<div class="form">
<?php $form=$this->beginWidget(
    'CActiveForm', array(
    'id'=>'user-to-comment-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    )
); ?>
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'content'); ?>
        <?php echo $form->textArea($model, 'content', ['rows' => 6]); ?>
        <?php echo $form->error($model, 'content'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Отправить', ['class' => 'btn btn-success']); ?>
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->