<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// namespace for the relationship belongsTo
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model #chilndren model
{
    use HasFactory;

    // relation inverse
    public function rol(): BelongsTo
    {
        // the second param is the foreign key
        return $this->belongsTo(Rol::class,'id_rol','id');
    }
    
    public function sale(): HasOne{
        return $this->hasOne(Sale::class,"id_employee","id");
    }

    protected $fillable = [
        "name",
        "lastname",
        "email",
        "password",
        "id_rol",
        "rol"
        
    ];
}
