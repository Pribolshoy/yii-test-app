<?php

/**
 * This is the model class for table "User".
 *
 * The followings are the available columns in table 'User':
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 */
class User extends CActiveRecord
{
    protected $oldPassword;

    protected $oldImage;
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'User';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        array('username, password', 'required'),
        array('username, password, email', 'length', 'max'=>128),
        array('about_me', 'length', 'max'=>500),
            array('password', 'length', 'min' => 8),
            array('password', 'processPassword'),
            array('image', 'file', 'allowEmpty' => true, 'types'=>'jpg, gif, png'),
            array('image', 'safe'),
        // The following rule is used by search().
        // Please remove those attributes that should not be searched.
        array('id, username, password, email, image', 'safe', 'on'=>'search'),
        );
    }

    public function processPassword($attribute, $params)
    {
        if(!$this->hasErrors()) {
            if($this->oldPassword && $this->oldPassword !== $this->password) {
                $this->password = md5(trim($this->password));
            }
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
        'id' => 'Id',
        'username' => 'Логин',
        'password' => 'Пароль',
        'email' => 'Email',
        'image' => 'Аватар',
        'about_me' => 'О себе',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id', $this->id);

        $criteria->compare('username', $this->username, true);

        $criteria->compare('email', $this->email, true);

        return new CActiveDataProvider(
            'User', array(
            'criteria'=>$criteria,
            )
        );
    }

    /**
     * Returns the static model of the specified AR class.
     *
     * @return User the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    protected function beforeSave()
    {
        $image = CUploadedFile::getInstance($this, 'image');

        if ($image) {
            if (!file_exists(Yii::getPathOfAlias('webroot').'/images/' . $image->getName())) {
                $path = Yii::getPathOfAlias('webroot') . '/images/' . $image->getName();
                $image->saveAs($path);
            }
            $this->image = $image->getName();
        } else {
            $this->image = $this->oldImage;
        }

        $this->about_me = (new CHtmlPurifier())->purify($this->about_me);
        return true;
    }

    public function getAvatar()
    {
        if ($this->image && file_exists(Yii::getPathOfAlias('webroot').'/images/' . $this->image)) {
            return '/testdrive/images/' . $this->image;
        } else {
            return '/testdrive/images/placeholder.png';
        }
    }
}