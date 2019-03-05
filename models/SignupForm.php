<?php

namespace app\models;

use yii\base\Model;
use app\models\User;

/**
 * Signup form
 */
class SignupForm extends Model {

    public $username;
    public $email;
    public $password;
    public $nim;
    public $nama;
    public $tlp;
    public $kode_jurusan;
    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {
        if (!$this->validate()) {
            return null;
        }
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();

            $sql = "insert into prd_auth_assignment (item_name,user_id,created_at) values (:item_name,:user_id,:created_at)";
            $params = [":item_name" => "mahasiswa", ":user_id" => $user->id,":created_at"=>time()];
            \Yii::$app->db->createCommand($sql)->bindValues($params)->execute();

            
            
            return $user;
        }

        return null;
    }

}
