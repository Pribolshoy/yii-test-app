<?php

class UserController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;

    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
        'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     *
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
        array('allow',  // allow all users to perform 'index' and 'view' actions
        'actions'=>array('index','view'),
        'users'=>array('*'),
        ),
        array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array('create','update'),
        'users'=>array('@'),
        ),
        array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions'=>array('admin','delete'),
        'users'=>array('admin'),
        ),
        array('deny',  // deny all users
        'users'=>array('*'),
        ),
        );
    }

    /**
     * Displays a particular model.
     */
    public function actionView()
    {
        $model = $this->loadModel();
        $comment_form = new UserToComment();

        if(isset($_POST['UserToComment'])) {
            $user_to_comment = new UserToComment();
            $user_to_comment->attributes = $_POST['UserToComment'];
            $user_to_comment->user_id = $model->id;
            $user_to_comment->author_id = Yii::app()->user->id;

            if($user_to_comment->validate()) {
                $user_to_comment->save();
            } else {
                $comment_form = $user_to_comment;
            }
        }

        $this->render(
            'view', array(
            'model'=>$model,
            'comment_form'=>$comment_form,
            )
        );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model=new User;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['User'])) {
            $model->attributes=$_POST['User'];
            if($model->save()) {
                $this->redirect(array('view','id'=>$model->id));
            }
        }

        $this->render(
            'create', array(
            'model'=>$model,
            )
        );
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate()
    {
        $model = User::model()->findbyPk(Yii::app()->user->id);

        // Uncomment the following line if AJAX validation is needed
        //         $this->performAjaxValidation($model);

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if(isset($_POST['User'])) {
            if (!$_POST['User']['password']) {
                unset($_POST['User']['password']);
            }

            $model->oldPassword = $model->password;
            $model->oldImage = $model->image;
            $model->attributes = $_POST['User'];
            if($model->save()) {
                $this->redirect(['view', 'id' => $model->id]);
            }
        }

        $this->render(
            'update', array(
            'model'=>$model,
            )
        );
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionDelete()
    {
        if(Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $model = User::model()->findbyPk(Yii::app()->user->id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax'])) {
                $this->redirect(array('index'));
            }
        }
        else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('User');
        $this->render(
            'index', array(
            'dataProvider'=>$dataProvider,
            )
        );
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new User('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['User'])) {
            $model->attributes=$_GET['User'];
        }

        $this->render(
            'admin', array(
            'model'=>$model,
            )
        );
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel()
    {
        if($this->_model===null) {
            if(isset($_GET['id'])) {
                $this->_model=User::model()->findbyPk($_GET['id']);
            }
            if($this->_model===null) {
                throw new CHttpException(404, 'The requested page does not exist.');
            }
        }
        return $this->_model;
    }

    /**
     * Performs the AJAX validation.
     *
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
