<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personalInfos extends Model
{
    protected $table = 'personal_infos'; // Defina o nome da tabela

    use HasFactory;

    public function personalData() {
        return $this->belongsTo(PersonalData::class);
    }
}