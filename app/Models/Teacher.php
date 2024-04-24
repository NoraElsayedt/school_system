<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Gender;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasTranslations;
    use HasFactory;
    public $translatable = ['Name'];
    protected $fillable = ['Name','Email','Password','specialization_id','gender_id','Joining_Date','Address'];

    public function Gender()  {
        return $this->belongsTo(Gender::class ,'gender_id');
    }
    public function specialization()  {
        return $this->belongsTo(Specialization::class ,'specialization_id');
    }

    public  function Sections(){
        return $this->belongsToMany(Section::class,'section_teacher');
    }
   
}
