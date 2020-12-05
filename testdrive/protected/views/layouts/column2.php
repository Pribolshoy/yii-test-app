<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="col-sm-9">
    <div id="">
        <?php echo $content; ?>
    </div><!-- content -->
</div>
<div class="col-sm-3 last">
    <div id="sidebar">
    <?php
    $this->beginWidget(
        'zii.widgets.CPortlet', array(
        'title'=>'Меню пользователя',
        )
    );
    $this->widget(
        'zii.widgets.CMenu', array(
        'items'=>$this->menu,
        'htmlOptions'=>array('class'=>'operations'),
        )
    );
    $this->endWidget();
    ?>
    </div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>