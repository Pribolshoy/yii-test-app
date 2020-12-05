<?php

/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RegistrationForm extends CFormModel
{
    public $username;
    public $password;
    public $email;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
        // username and password are required
        array('username, password', 'required'),
            array('password', 'length', 'min' => 8),
        // email needs to be a string
        array('email', 'email', 'allowEmpty' => true),
        // username needs to be unique
        array('username, email', 'unique', 'className' => 'User'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
        'username'=>'Логин',
        'password'=>'Пароль',
        'email'=>'E-mail',
        );
    }

    /**
     * Registrate and Logs in the user using the given username and password in the model.
     *
     * @return boolean whether registration is successful
     */
    public function registration()
    {
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = md5(trim($this->password));

        if ($user->save()) {
            $_identity = new UserIdentity($this->username, $this->password);
            if ($_identity->authenticate()) {
                $duration = 3600*24*30; // 30 days
                Yii::app()->user->login($_identity, $duration);
                return true;
            } else {
                $this->addError('password', 'Неожиданная ошибка связанная с аутентификацией нового пользователя.');
                return false;
            }

        } else {
            return false;
        }
    }
}
