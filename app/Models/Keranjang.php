<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $visible = ['produk', 'total_harga', 'jumlah_produk'];
    protected $fillable = ['produk', 'total_harga', 'jumlah_produk'];
    public $timestamps = true;

    public function barang()
    {
        // data dari Model "Book" bisa di miliki oleh model "Author"
        // melalui fk "author_id"
        return $this->belongsTo('App\Models\Barang', 'produk');
    }

    public function order()
    {
        //data dari Model "Book" bisa di miliki oleh model "Author"
        //melalui fk "author_id"
        return $this->hasMany('App\Models\Order', 'id_user');
    }
}
