<?php

namespace App\Http\Controllers\Settings ;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Settings\SettingsRepositoryInterface;

class SettingController extends Controller
{
    public $setting;
    public function __construct(SettingsRepositoryInterface $setting)
    {
        $this->setting = $setting;
        
    }
 
    public function index()
    {
        return $this->setting->index();
    }

   

  
   
    public function update(Request $request)
    {
        return $this->setting->update($request);
    }

   
   
}
