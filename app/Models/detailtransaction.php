<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailtransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'transactionId',
        'collectionId',
        'tanggalKembali',
        'status',
        'keterangan',
    ];
 
}
