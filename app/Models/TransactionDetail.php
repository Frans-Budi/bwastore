<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = "transactions_details";

    protected $fillable = [
        "transaction_id",
        "products_id",
        "price",
        "resi",
        "code",
        "shipping_status",
    ];

    protected $hidden = [];

    public function product()
    {
        return $this->hasOne(product::class, "id", "products_id");
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, "transaction_id");
    }
}
