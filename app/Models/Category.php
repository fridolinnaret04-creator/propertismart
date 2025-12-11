<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id_categories';

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'gambar'
    ];

    public $timestamps = false;
}
