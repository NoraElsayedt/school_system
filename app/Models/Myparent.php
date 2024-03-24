<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Myparent extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name_f','job_f','name_m','job_m'];
    protected $guarded = [];
}
