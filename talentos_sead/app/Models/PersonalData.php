<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    protected $table = 'personal_data';

    use HasFactory;

    public function personalInfo() {
        return $this->hasOne(PersonalInfos::class);
    }

    public function personalProfile() {
        return $this->hasOne(PersonalProfile::class);
    }
}
