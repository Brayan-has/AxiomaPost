<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// namespace for the relationship
use Illuminate\Database\Eloquent\Relations\HasOne;
class Rol extends Model #model parent
{ 
    use HasFactory;

    public function employee(): hasOne
    {
        // first param the children model
        // the second param the foreign key
        // the third param the parent model id
        return $this->hasOne(Employee::class,'id_rol','id')->withDefault([
            "name" => null
        ]);
        // 
        
    }
    protected $fillable = [
        "name",
    ];
}
