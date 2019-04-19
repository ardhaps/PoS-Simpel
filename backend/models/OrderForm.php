<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Pesanan;
use common\models\Detailpesanan;
use common\models\Produk;
use common\models\Akun;

/**
 * Signup form
 */
class OrderForm extends Model
{
    public $produk_id_produk;
    public $jumlah_barang;
    public $id_pesanan;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['jumlah_barang', 'integer'],
            ['produk_id_produk', 'integer'],

        ];
    }

    /**
     */
    public function order()
    {
        if (!$this->validate()) {
            return null;
        }        

        $model = new Pesanan();
        $idLastPesanan = Pesanan::find()
                                ->orderBy(['id_pesanan'=> SORT_DESC])
                                ->one();

        if ($idLastPesanan != null) {
            if ($idLastPesanan->is_pesanansukses == 1) {
                $model->id_pesanan = $idLastPesanan->id_pesanan + 1;
                $model->is_pesanansukses = 0;
                $model->tanggal_pesanan = date('Y-m-d');
                $idakun = Akun::find()->where(['user_id' => Yii::$app->user->identity->id])->one()->id_akun;
                $model->akun_id_akun = $idakun;
                $model->save();
            }
            $detailpesanan = new Detailpesanan();

            $detailpesanan->pesanan_id_pesanan = $idLastPesanan->id_pesanan;
            $id_pesanan = $idLastPesanan->id_pesanan;

            $detailpesanan->produk_id_produk = $this->produk_id_produk;
            $detailpesanan->jumlah_barang = $this->jumlah_barang;

            $produkdibeli = Produk::findOne($this->produk_id_produk);
            $produkdibeli->stok_produk = $produkdibeli->stok_produk - $this->jumlah_barang;
            $detailpesanan->total_harga = $this->jumlah_barang *  $produkdibeli->harga_produk;
            
            if ($produkdibeli->save() && $detailpesanan->save()) {
                return $id_pesanan;
            }
            
            return 0;
        }

        else {
            if ($idLastPesanan == null) {
                $model->id_pesanan = 1;
                $id_pesanan = 1;
            }
            else {
                $model->id_pesanan = $idLastPesanan->id_pesanan + 1;
                $id_pesanan = $model->id_pesanan;
            }
    
            $model->is_pesanansukses = 0;
            $model->tanggal_pesanan = date('Y-m-d');
            $idakun = Akun::find()->where(['user_id' => Yii::$app->user->identity->id])->one()->id_akun;
            $model->akun_id_akun = $idakun;
    
            if ($model->save()) {
                $detailpesanan = new Detailpesanan();
                $detailpesanan->pesanan_id_pesanan = $model->id_pesanan;
                $detailpesanan->produk_id_produk = $this->produk_id_produk;
                $detailpesanan->jumlah_barang = $this->jumlah_barang;
    
                $produkdibeli = Produk::findOne($this->produk_id_produk);
                $produkdibeli->stok_produk = $produkdibeli->stok_produk - $this->jumlah_barang;
                $detailpesanan->total_harga = $this->jumlah_barang *  $produkdibeli->harga_produk;
                
                if ($produkdibeli->save() && $detailpesanan->save()) {
                    return $id_pesanan;
                }
            }
            return 0;
        }
        
    }
}
