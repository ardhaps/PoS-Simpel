<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pesanan".
 *
 * @property int $id_pesanan
 * @property int $akun_id_akun
 * @property int $is_pesanansukses
 * @property string $tanggal_pesanan
 *
 * @property Detailpesanan $detailpesanan
 * @property Akun $akunIdAkun
 */
class Pesanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['akun_id_akun'], 'required'],
            [['akun_id_akun', 'is_pesanansukses'], 'default', 'value' => null],
            [['akun_id_akun', 'is_pesanansukses'], 'integer'],
            [['tanggal_pesanan'], 'safe'],
            [['akun_id_akun'], 'exist', 'skipOnError' => true, 'targetClass' => Akun::className(), 'targetAttribute' => ['akun_id_akun' => 'id_akun']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pesanan' => 'No. Order',
            'akun_id_akun' => 'ID Akun',
            'is_pesanansukses' => 'Pesanan Sukses',
            'tanggal_pesanan' => 'Tanggal Pesanan',
            'uang_pembayaran' => 'Cash',
            'uang_kembalian' => 'Kembalian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailpesanan()
    {
        return $this->hasOne(Detailpesanan::className(), ['pesanan_id_pesanan' => 'id_pesanan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkunIdAkun()
    {
        return $this->hasOne(Akun::className(), ['id_akun' => 'akun_id_akun']);
    }
}
