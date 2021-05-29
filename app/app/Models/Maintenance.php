<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
    protected $table = 'maintenance';

    public function user(){
        return $this->belongsTo(User::class,'userId','id');
    }
}
