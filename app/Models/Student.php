<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;
    
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded =[];

    public function gender(){
        return $this->belongsTo(Gender::class  , 'gender_id');
    }
    public function Grade(){
        return $this->belongsTo(Grade::class  , 'grade_id');
    }
    public function classrooms(){
        return $this->belongsTo(Classroom::class  , 'classroom_id');
    }
    public function section(){
        return $this->belongsTo(Section::class  , 'section_id');
    }
    public function nationalitie(){
        return $this->belongsTo(Nationalitie::class ,'nationalitie_id');
    }
    public function blood(){
        return $this->belongsTo(Blood::class , 'blood_id');
    }
    public function myparent(){
        return $this->belongsTo(Myparent::class , 'myparent_id');   
    }
}
