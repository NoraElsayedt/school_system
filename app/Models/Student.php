<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    use SoftDeletes;
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded = [];

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
    public function Grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    public function classrooms()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function nationalitie()
    {
        return $this->belongsTo(Nationalitie::class, 'nationalitie_id');
    }
    public function blood()
    {
        return $this->belongsTo(Blood::class, 'blood_id');
    }
    public function myparent()
    {
        return $this->belongsTo(Myparent::class, 'myparent_id');
    }
    // relationship upload image
    
    // public function images(): MorphMany
    // {
    //     return $this->morphMany(Image::class, 'imageable');
    // }
}
