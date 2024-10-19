<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

//clase padre
class Customer extends Model
{
    use HasFactory;

    public function sale(): hasOne{
        return $this->hasOne(Sale::class,"id_customer","id");
    }

    protected $fillable =[
        'name',
        'lastname',
        'email',
        'phone',
        'nit'
    ];
}
