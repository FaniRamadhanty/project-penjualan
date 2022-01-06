<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $visible = ['id_user', 'nama', 'telepon', 'alamat1', 'alamat2'];
    protected $fillable = ['id_user', 'nama', 'telepon', 'alamat1', 'alamat2'];
    public $timestamps = true;

    public function keranjang()
    {
        return $this->belongsTo('App\Models\Keranjang', 'id_user');
    }

    public function transaksi()
    {
        //data model "Author" bisa memiliki banyak data
        //data model "Book" melalui fk "author_id"
        $this->hasMany('App\Models\Transaksi', 'id_transaksi');
    }
}
