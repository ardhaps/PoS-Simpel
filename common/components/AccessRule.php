<?php

namespace common\components;

use Yii;

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Akun;

class AccessRule extends \yii\filters\AccessRule {

    /**
     * @inheritdoc
     */
    protected function matchRole($user)
    {
        if (empty($this->roles)) {
            return true;
        }
        foreach ($this->roles as $role) {
            if ($role === '?') {
                if ($user->getIsGuest()) {
                    return true;
                }
            } elseif ($role === '@') {
                if (!$user->getIsGuest()) {
                    return true;
                }
            // Check if the user is logged in, and the roles match
            } elseif (!$user->getIsGuest()) {
                $akun = Akun::find()
                ->where(['user_id' => $user->identity->id])
                ->one();    
                if ($role === $akun->hakakses_id_hakakses) {
                    return true;
                } else {
                    Yii::$app->user->logout();
                }
            }
        }
        return false;
    }
}