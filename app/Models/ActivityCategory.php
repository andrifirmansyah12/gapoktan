<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityCategory extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
 
    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

}
