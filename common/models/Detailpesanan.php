<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detailpesanan".
 *
 * @property int $id_detailpesanan
 * @property int $pesanan_id_pesanan
 * @property int $produk_id_produk
 * @property int $jumlah_barang
 * @property int $total_harga
 *
 * @property Pesanan $pesananIdPesanan
 * @property Produk $produkIdProduk
 */
class Detailpesanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detailpesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pesanan_id_pesanan', 'produk_id_produk'], 'required'],
            [['pesanan_id_pesanan', 'produk_id_produk', 'jumlah_barang', 'total_harga'], 'default', 'value' => null],
            [['pesanan_id_pesanan', 'produk_id_produk', 'jumlah_barang', 'total_harga'], 'integer'],
            [['pesanan_id_pesanan'], 'exist', 'skipOnError' => true, 'targetClass' => Pesanan::className(), 'targetAttribute' => ['pesanan_id_pesanan' => 'id_pesanan']],
            [['produk_id_produk'], 'exist', 'skipOnError' => true, 'targetClass' => Produk::className(), 'targetAttribute' => ['produk_id_produk' => 'id_produk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_detailpesanan' => 'ID',
            'pesanan_id_pesanan' => 'No. Order',
            'produk_id_produk' => 'Produk',
            'jumlah_barang' => 'Jumlah Barang',
            'total_harga' => 'Total Harga',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesananIdPesanan()
    {
        return $this->hasOne(Pesanan::className(), ['id_pesanan' => 'pesanan_id_pesanan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdukIdProduk()
    {
        return $this->hasOne(Produk::className(), ['id_produk' => 'produk_id_produk']);
    }
}
