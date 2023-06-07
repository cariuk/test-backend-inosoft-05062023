<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Relations\HasOne;

class Kendaraan extends BaseModel
{
    use HasFactory;

    protected $table = 'kendaraans';

    function mobil(): HasOne
    {
        return $this->hasOne(Mobil::class);
    }

    function motor(): HasOne
    {
        return $this->hasOne(Motor::class);
    }
}
