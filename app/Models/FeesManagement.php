<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesManagement extends Model
{
    use HasFactory;
    protected $fillable = ['name','amount','type','publish'];

    // public function log()
    // {
    //     return $this->hasOne(StudentAcademicInfo::class);
    // }

}
