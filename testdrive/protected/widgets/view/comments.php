<?php
echo CHtml::openTag('div', ['class' => 'comment_list']);
$this->widget(
    'zii.widgets.CListView', [
    'dataProvider' => $dataProvider,
    'itemView'     => 'application.widgets.view._comments',
    ]
);
echo CHtml::closeTag('div');
