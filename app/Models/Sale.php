<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

//class hijo
class Sale extends Model
{
    use HasFactory;
    public function customer(): BelongsTo{
        return $this->belongsTo(Sale::class,"id_customer","id");
    }

    public function employee(): BelongsTo{
        return $this->belongsTo(Sale::class,"id_employee","id");
    }

    protected $fillable = [
        'sale_date',
        'Total_sale',
        'id_customer',
        'id_employee'
    ];
}
