<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id_transaction';

    protected $fillable = [
        'nama_pembeli',
        'no_hp',
        'alamat',
        'harga',
        'id_categories',
        'tanggal'
    ];

    public function category()
{
    return $this->belongsTo(Category::class, 'id_categories', 'id_categories');
}

}
