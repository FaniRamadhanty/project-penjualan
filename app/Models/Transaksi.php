<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    
    protected $visible = ['id_transaksi', 'waktu_pembayaran', 'metode_pembayaran', 'jumlah_bayar'];
    protected $fillable = ['id_transaksi', 'waktu_pembayaran', 'metode_pembayaran', 'jumlah_bayar'];
    public $timestamps = true;

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'id_transaksi');
    }
}
