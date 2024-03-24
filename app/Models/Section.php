<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Section extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name_section'];
    protected $fillable = ['name_section' ,'status','grade_id','classroom_id'];

    public function classrooms(){
        return $this->belongsTo(Classroom::class , 'classroom_id');
    }

    public  function Teacher(){
        return $this->belongsToMany(Teacher::class,'section_teacher');
    }

   
}
