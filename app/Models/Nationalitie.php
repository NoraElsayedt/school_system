<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Nationalitie extends Model
{
    use HasTranslations;
    use HasFactory;
    public $translatable = ['name_nationalitie'];
    protected $fillable = ['name_nationalitie'];
}
