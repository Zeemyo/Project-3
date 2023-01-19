<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['id_penitipan', 'midtrans_order_id', 'midtrans_transaction_id', 'midtrans_va_number', 'total', 'created_at', 'updated_at'];
}
