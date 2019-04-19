<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "akun".
 *
 * @property int $id_akun
 * @property int $hakakses_id_hakakses
 * @property string $nama
 * @property string $no_telepon
 * @property string $alamat
 * @property string $alamat_toko
 * @property int $user_id
 *
 * @property Hakakses $hakaksesIdHakakses
 * @property User $user
 * @property Pesanan[] $pesanans
 * @property Produk $produk
 */
class Akun extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'akun';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hakakses_id_hakakses', 'user_id'], 'required'],
            [['hakakses_id_hakakses', 'user_id'], 'default', 'value' => null],
            [['hakakses_id_hakakses', 'user_id'], 'integer'],
            [['nama'], 'string', 'max' => 60],
            [['no_telepon'], 'string', 'max' => 20],
            [['alamat', 'alamat_toko'], 'string', 'max' => 200],
            [['hakakses_id_hakakses'], 'exist', 'skipOnError' => true, 'targetClass' => Hakakses::className(), 'targetAttribute' => ['hakakses_id_hakakses' => 'id_hakakses']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_akun' => 'Id Akun',
            'hakakses_id_hakakses' => 'Id Hakakses',
            'nama' => 'Nama',
            'no_telepon' => 'No Telepon',
            'alamat' => 'Alamat',
            'alamat_toko' => 'Alamat Toko',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHakaksesIdHakakses()
    {
        return $this->hasOne(Hakakses::className(), ['id_hakakses' => 'hakakses_id_hakakses']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesanans()
    {
        return $this->hasMany(Pesanan::className(), ['akun_id_akun' => 'id_akun']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduk()
    {
        return $this->hasOne(Produk::className(), ['akun_id_akun' => 'id_akun']);
    }
}
