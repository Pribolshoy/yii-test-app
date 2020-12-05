<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
    <div class="row">
        <div id="header col-sm-12">
            <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
        </div><!-- header -->

        <div id="mainmenu" class="col-sm-12">
            <?php $this->widget(
                'zii.widgets.CMenu', array(
                    'items'=>array(
                        array('label'=>'Главная', 'url'=>array('/site/index')),
                        array('label'=>'Пользователи сайта', 'url'=>array('/user/index')),
                        array('label'=>'Личный кабинет', 'url'=>array('/user/view', 'id' => Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'Авторизация', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Регистрация', 'url'=>array('/site/registration'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                    ),
                )
            ); ?>
        </div><!-- mainmenu -->
        <?php if(isset($this->breadcrumbs)) : $this->widget(
            'zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
                'htmlOptions' => [
                    'class' => 'breadcrumbs col-sm-12 mt-1 mb-3'
                ]
            )
        ); ?><!-- breadcrumbs -->
        <?php endif?>

        <?php echo $content; ?>

        <div class="clear"></div>

        <div id="footer" class="col-sm-12 m-0">
            Copyright &copy; <?php echo date('Y'); ?> by Pribolshoy.<br/>
            <?php echo Yii::powered(); ?>
        </div><!-- footer -->
    </div>
</div><!-- page -->

</body>
</html>
