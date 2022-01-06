<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    
    protected $visible = ['id_kategori', 'nama_barang', 'cover', 'harga', 'stok' ];
    protected $fillable = ['id_kategori', 'nama_barang', 'cover', 'harga', 'stok'];
    public $timestamps = true;

    public function kategori()
    {
        //data dari Model "Book" bisa di miliki oleh model "Author"
        //melalui fk "author_id"
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }
    

    public function image()
    {
        if ($this->cover && file_exists(public_path('image/barang/' . $this->cover))) {
            return asset('image/barang/' . $this->cover);
        } else {
            return asset('image/no_image.png');
        }
    }
     
    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('image/barang/' . $this->cover))) {
            return unlink(public_path('image/barang/' . $this->cover));
        }
    }

    public function keranjang()
    {
        //data dari Model "Book" bisa di miliki oleh model "Author"
        //melalui fk "author_id"
        return $this->hasMany('App\Models\Keranjang', 'produk');
    }

}
