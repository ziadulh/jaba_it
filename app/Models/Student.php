<?php

namespace App\Models;

use App\Models\StudentAcademicInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['sms_no','present_address','date_of_birth','gender','last_name','first_name','student_id','publish'];

    public function info()
    {
        return $this->hasOne(StudentAcademicInfo::class);
    }
}
