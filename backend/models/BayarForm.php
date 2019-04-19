<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Pesanan;
use common\models\Detailpesanan;

/**
 * Signup form
 */
class BayarForm extends Model
{
    public $uang_pembayaran;
    public $uang_kembalian;
    public $id_pesanan;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['uang_pembayaran', 'integer'],
            ['uang_kembalian', 'integer'],

        ];
    }

    /**
     */
    public function bayar()
    {
        if (!$this->validate()) {
            return null;
        }        
        $pesananbayar = Pesanan::find()
                                ->where(['=', 'is_pesanansukses', 0])
                                ->orderBy(['id_pesanan'=> SORT_DESC])
                                ->one();

        if ($pesananbayar != null) {
            $pesananbayar->is_pesanansukses = 1;
            $pesananbayar->uang_pembayaran = $this->uang_pembayaran;
            $pesananbayar->uang_kembalian = $this->uang_kembalian;
            
            return $pesananbayar->save();
        } 
        else {
            return null;
        }   
    }

    public function cancel()
    {
        if (!$this->validate()) {
            return null;
        }        
        $pesanancancel = Pesanan::find()
                                ->where(['=', 'is_pesanansukses', 0])
                                ->orderBy(['id_pesanan'=> SORT_DESC])
                                ->one();
        

        if ($pesanancancel != null) {

            Detailpesanan::deleteAll(['pesanan_id_pesanan' => $pesanancancel->id_pesanan]);
            Pesanan::deleteAll(['id_pesanan' => $pesanancancel->id_pesanan]);
        } 
        else {
            return null;
        }   
    }
}
