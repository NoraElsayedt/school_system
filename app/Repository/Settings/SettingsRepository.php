<?php

namespace App\Repository\Settings;

use App\Models\Setting;
use App\Models\Student;
use App\Models\Fund_Account;
use App\Models\Student_Account;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\Exception;
use Illuminate\Support\Facades\Storage;
use App\Repository\Settings\SettingsRepositoryInterface;



class SettingsRepository implements SettingsRepositoryInterface
{

    public function index()
    {
        // flatMap ===> علشان يحولها الي key => value 

        $collection = Setting::all();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });

      return view('Settings.index',$setting);
    }

   
    public function update($request){

        try{
          
            //  except علشان يشيلها من request 
            $info = $request->except('_token', '_method', 'logo');
            foreach ($info as $key=> $value){
                Setting::where('key', $key)->update(['value' => $value]);
            }

// upload image 

            if($request->hasFile('logo')) {
                Storage::disk('Library')->deleteDirectory( $request->school_name);
                $logo = $request->file('logo');
                $logo_name = $logo->getClientOriginalName();
                Setting::where('key', 'logo')->update(['value' => $logo_name]);
                $logo->storeAs($request->school_name, $logo_name, 'Library');
            }

            toastr()->success(trans('messages.Update'));
            return back();
        }
        catch (\Exception $e){

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }
   
}
