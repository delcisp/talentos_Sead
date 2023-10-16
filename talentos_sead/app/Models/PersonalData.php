<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personalData extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
    protected $table = 'personal_data';

    use HasFactory;
}
