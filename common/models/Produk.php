<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "produk".
 *
 * @property int $id_produk
 * @property int $akun_id_akun
 * @property string $nama_produk
 * @property string $deskripsi_produk
 * @property int $stok_produk
 * @property int $harga_produk
 * @property string $update_produk
 *
 * @property Detailpesanan $detailpesanan
 * @property Akun $akunIdAkun
 */
class Produk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['akun_id_akun'], 'required'],
            [['akun_id_akun', 'stok_produk', 'harga_produk'], 'default', 'value' => null],
            [['akun_id_akun', 'stok_produk', 'harga_produk'], 'integer'],
            [['update_produk'], 'safe'],
            [['nama_produk'], 'string', 'max' => 45],
            [['deskripsi_produk'], 'string', 'max' => 200],
            [['akun_id_akun'], 'unique'],
            [['akun_id_akun'], 'exist', 'skipOnError' => true, 'targetClass' => Akun::className(), 'targetAttribute' => ['akun_id_akun' => 'id_akun']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_produk' => 'Produk',
            'akun_id_akun' => 'Akun',
            'nama_produk' => 'Nama Produk',
            'deskripsi_produk' => 'Deskripsi Produk',
            'stok_produk' => 'Stok Produk',
            'harga_produk' => 'Harga Produk',
            'update_produk' => 'Update Produk',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailpesanan()
    {
        return $this->hasOne(Detailpesanan::className(), ['produk_id_produk' => 'id_produk']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkunIdAkun()
    {
        return $this->hasOne(Akun::className(), ['id_akun' => 'akun_id_akun']);
    }
}
