<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subjects extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];
    protected $guarded = [];
    public function Grade(){
        return $this->belongsTo(Grade::class , 'grade_id');
    }
    public function classrooms(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }
    public function Teacher(){
        return $this->belongsTo(Teacher::class ,'teacher_id');
    }
}
