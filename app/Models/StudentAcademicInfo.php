<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAcademicInfo extends Model
{
    use HasFactory;
    protected $fillable = ['roll','section','group','class','session','student_id'];

}
