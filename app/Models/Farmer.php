<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function poktan()
    {
        return $this->belongsTo(Poktan::class);
    }

    public function plant()
    {
        return $this->hasMany(Plant::class);
    }

    public function historyEducation()
    {
        return $this->hasMany(HistoryEducation::class);
    }
}
