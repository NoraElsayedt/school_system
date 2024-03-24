<?php

namespace App\Livewire;

use App\Models\Blood;
use Livewire\Component;
use App\Models\Myparent;
use App\Models\Religion;
use App\Models\Nationalitie;
use Livewire\WithFileUploads;
use App\Models\ParentAttachment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AddParent extends Component
{
    use WithFileUploads;

    public $successMessage = '';

    public $catchError;
    public  $currentStep = 1;
    public $Email;
    public $Password;
    public $Name_Father;
    public $Name_Father_en;
    public $Job_Father;
    public $Job_Father_en;
    public $National_ID_Father;
    public $Passport_ID_Father;
    public $Phone_Father;
    public $Nationality_Father_id;
    public $Blood_Type_Father_id;
    public $Religion_Father_id;
    public $Address_Father;
    // Mother_INPUTS
    public $Name_Mother, $Name_Mother_en,
        $National_ID_Mother, $Passport_ID_Mother,
        $Phone_Mother, $Job_Mother, $Job_Mother_en,
        $Nationality_Mother_id, $Blood_Type_Mother_id,
        $Address_Mother, $Religion_Mother_id;



    public $photos = [];
    public $Parent_id, $updateMode = false, $show_table = true;

    public function render()
    {
        return view('livewire.add-parent', [
            'Nationalities' => Nationalitie::all(),
            'Type_Bloods' => Blood::all(),
            'Religions' => Religion::all(),
            'my_parents' => Myparent::all(),
        ]);
    }

    public function showformadd()
    {
        $this->show_table = false;
    }

    public function edit($id)
    {


        try {


            $this->show_table = false;
            $this->updateMode = true;
            $My_Parent = Myparent::where('id', $id)->first();
            $this->Parent_id = $id;
            $this->Email = $My_Parent->email;
            $this->Password = $My_Parent->password;
            $this->Name_Father = $My_Parent->getTranslation('name_f', 'ar');
            $this->Name_Father_en = $My_Parent->getTranslation('name_f', 'en');
            $this->Job_Father = $My_Parent->getTranslation('job_f', 'ar');;
            $this->Job_Father_en = $My_Parent->getTranslation('job_f', 'en');
            $this->National_ID_Father = $My_Parent->national_id_f;
            $this->Passport_ID_Father = $My_Parent->passport_id_f;
            $this->Phone_Father = $My_Parent->phone_f;
            $this->Nationality_Father_id = $My_Parent->nationalitie_id;
            $this->Blood_Type_Father_id = $My_Parent->blood_id;
            $this->Address_Father = $My_Parent->address_f;
            $this->Religion_Father_id = $My_Parent->religion_id;

            $this->Name_Mother = $My_Parent->getTranslation('name_m', 'ar');
            $this->Name_Mother_en = $My_Parent->getTranslation('name_m', 'en');
            $this->Job_Mother = $My_Parent->getTranslation('job_m', 'ar');;
            $this->Job_Mother_en = $My_Parent->getTranslation('job_m', 'en');
            $this->National_ID_Mother = $My_Parent->national_id_m;
            $this->Passport_ID_Mother = $My_Parent->passport_id_m;
            $this->Phone_Mother = $My_Parent->phone_m;
            $this->Nationality_Mother_id = $My_Parent->nationalitie_id_m;
            $this->Blood_Type_Mother_id = $My_Parent->blood_id_m;
            $this->Address_Mother = $My_Parent->address_m;
            $this->Religion_Mother_id = $My_Parent->religion_id_m;
        } catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };
    }

    public function submitForm_edit()
    {

        if ($this->Parent_id) {
            $myparent =  Myparent::find($this->Parent_id);
            $myparent->update([
                'email' => $this->Email,
                'password' => Hash::make($this->Password),
                'name_f' => ['ar' => $this->Name_Father, 'en' => $this->Name_Father_en],
                'national_id_f' => $this->National_ID_Father,
                'passport_id_f' => $this->Passport_ID_Father,
                'phone_f' => $this->Phone_Father,
                'job_f' => ['ar' => $this->Job_Father, 'en' => $this->Job_Father_en],
                'blood_id' => $this->Blood_Type_Father_id,
                'nationalitie_id' => $this->Nationality_Father_id,
                'religion_id' => $this->Religion_Father_id,
                'address_f' => $this->Address_Father,
                'name_m' => ['ar' => $this->Name_Mother, 'en' => $this->Name_Mother_en],
                'national_id_m' => $this->National_ID_Mother,
                'passport_id_m' => $this->Passport_ID_Mother,
                'phone_m' => $this->Phone_Mother,
                'job_m' => ['ar' => $this->Job_Mother, 'en' => $this->Job_Mother_en],
                'blood_id_m' => $this->Blood_Type_Mother_id,
                'nationalitie_id_m' => $this->Nationality_Mother_id,
                'religion_id_m' => $this->Religion_Mother_id,
                'address_m' => $this->Address_Mother,

            ]);
        }
// return $this->photos;

        foreach ($this->photos as $photo) {

            $photo->storeAs($this->National_ID_Father, $photo->getClientOriginalName(), $disk = 'parent_attachment');

            ParentAttachment::create([

                'file_name' => $photo->getClientOriginalName(),
                'myparent_id' => $myparent->id
            ]);
        }

        return redirect()->to('/show_form_wizard');
    }
    // first step
    public function firstStepSubmit()
    {

        $this->validate([
            'Email' => 'required|unique:myparents,email,',
            'Password' => 'required',
            'Name_Father' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/|unique:myparents,national_id_f,',
            'Passport_ID_Father' => 'required|min:10|max:10|unique:myparents,passport_id_f,',
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Nationality_Father_id' => 'required',
            'Blood_Type_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required',




        ]);



        $this->currentStep = 2;
    }

    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;
    }

    //secondStepSubmit
    public function secondStepSubmit()
    {


        $this->validate([
            'Name_Mother' => 'required',
            'Name_Mother_en' => 'required',
            'National_ID_Mother' => 'required|unique:myparents,national_id_m,',
            'Passport_ID_Mother' => 'required|unique:myparents,passport_id_m,',
            'Phone_Mother' => 'required',
            'Job_Mother' => 'required',
            'Job_Mother_en' => 'required',
            'Nationality_Mother_id' => 'required',
            'Blood_Type_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required',
            'National_ID_Mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Mother' => 'min:10|max:10',
            'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);


        $this->currentStep = 3;
    }

    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;
    }
    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function submitForm()
    {

        try {

            $myparent = new Myparent();
            $myparent->email = $this->Email;
            $myparent->password = Hash::make($this->Password);
            $myparent->name_f = ['ar' => $this->Name_Father, 'en' => $this->Name_Father_en];
            $myparent->national_id_f = $this->National_ID_Father;
            $myparent->passport_id_f = $this->Passport_ID_Father;
            $myparent->phone_f = $this->Phone_Father;
            $myparent->job_f = ['ar' => $this->Job_Father, 'en' => $this->Job_Father_en];
            $myparent->blood_id = $this->Blood_Type_Father_id;
            $myparent->nationalitie_id = $this->Nationality_Father_id;
            $myparent->religion_id = $this->Religion_Father_id;
            $myparent->address_f = $this->Address_Father;
            $myparent->name_m = ['ar' => $this->Name_Mother, 'en' => $this->Name_Mother_en];
            $myparent->national_id_m = $this->National_ID_Mother;
            $myparent->passport_id_m = $this->Passport_ID_Mother;
            $myparent->phone_m = $this->Phone_Mother;
            $myparent->job_m = ['ar' => $this->Job_Mother, 'en' => $this->Job_Mother_en];
            $myparent->blood_id_m = $this->Blood_Type_Mother_id;
            $myparent->nationalitie_id_m = $this->Nationality_Mother_id;
            $myparent->religion_id_m = $this->Religion_Mother_id;
            $myparent->address_m = $this->Address_Mother;
            $myparent->save();



            if (!empty($this->photos)) {
                foreach ($this->photos as $photo) {

                    $photo->storeAs($this->National_ID_Father, $photo->getClientOriginalName(), $disk = 'parent_attachment');

                    ParentAttachment::create([

                        'file_name' => $photo->getClientOriginalName(),
                        'myparent_id' => $myparent->id
                    ]);
                }
            }


            $this->successMessage = trans('messages.success');

            $this->clearForm();

            $this->currentStep = 1;
            $this->show_table = true;
        } catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };
    }

    //clearForm
    public function clearForm()
    {
        $this->Email = '';
        $this->Password = '';
        $this->Name_Father = '';
        $this->Job_Father = '';
        $this->Job_Father_en = '';
        $this->Name_Father_en = '';
        $this->National_ID_Father = '';
        $this->Passport_ID_Father = '';
        $this->Phone_Father = '';
        $this->Nationality_Father_id = '';
        $this->Blood_Type_Father_id = '';
        $this->Address_Father = '';
        $this->Religion_Father_id = '';

        $this->Name_Mother = '';
        $this->Job_Mother = '';
        $this->Job_Mother_en = '';
        $this->Name_Mother_en = '';
        $this->National_ID_Mother = '';
        $this->Passport_ID_Mother = '';
        $this->Phone_Mother = '';
        $this->Nationality_Mother_id = '';
        $this->Blood_Type_Mother_id = '';
        $this->Address_Mother = '';
        $this->Religion_Mother_id = '';
    }

    public function delete($id)
    {



        $parent = Myparent::findOrFail($id);

        if ($parent->national_id_f) {
            // Storage::disk('parent_attachment')->delete('app/parent_attachment/' . $parent->national_id_f);
            $ParentAttachment = ParentAttachment::where('myparent_id', $id)->delete();
            $My_Parent = Myparent::where('id', $id)->delete();
        }



        $this->successMessage = trans('messages.Delete');
    }
}
