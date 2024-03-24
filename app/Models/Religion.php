<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Religion extends Model
{     use HasTranslations;
    use HasFactory;
    public $translatable = ['name_religion'];
    protected $fillable = ['name_religion'];
}
