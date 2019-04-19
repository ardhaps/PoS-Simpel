<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Akun;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $nama;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Username sudah digunakan. Coba username lain.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['nama', 'string'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        if ( $user->save()) {
            $akun = new Akun();
            $akun->user_id = $user->id;
            $akun->hakakses_id_hakakses = 2;
            $akun->nama = $this->nama;
            return $akun->save();
        }
        return $user->save();

    }
}
