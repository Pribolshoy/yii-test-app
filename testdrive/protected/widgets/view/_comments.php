<div class="view">
    <b><?php echo CHtml::encode($data->getAttributeLabel('author_id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->user->username), array('view', 'id'=>$data->user->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('date_added')); ?>:</b>
    <?php echo CHtml::encode($data->date_added); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
    <?php echo CHtml::encode($data->content); ?>
    <br />
</div>
