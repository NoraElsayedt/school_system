<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialization extends Model
{
    use HasTranslations;
    use HasFactory;
    public $translatable = ['Name'];
    protected $fillable = ['Name'];
}
