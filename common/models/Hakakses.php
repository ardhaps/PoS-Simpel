<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hakakses".
 *
 * @property int $id_hakakses
 * @property string $hakakses
 *
 * @property Akun $akun
 */
class Hakakses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hakakses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hakakses'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_hakakses' => 'ID Hak Akses',
            'hakakses' => 'Hak Akses',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkun()
    {
        return $this->hasOne(Akun::className(), ['hakakses_id_hakakses' => 'id_hakakses']);
    }
}
