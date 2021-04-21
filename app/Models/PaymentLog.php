<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    use HasFactory;
    protected $fillable = ['fees_id','student_id'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function fee()
    {
        return $this->belongsTo(FeesManagement::class, 'fees_id', 'id');
    }
}
