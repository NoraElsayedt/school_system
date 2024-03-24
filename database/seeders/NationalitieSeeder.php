<?php

namespace Database\Seeders;

use App\Models\Nationalitie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NationalitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nationalities')->delete();
        // Nationalitie::truncate();
 
        $nationals = [
            ['en'=> 'Egyptian', 'ar'=> 'مصري'],
            ['en'=> 'Slovak','ar'=> 'سولفاكي'],
            [ 'en'=> 'Slovenian', 'ar'=> 'سولفيني']
        
        ];

      
        foreach ($nationals as $n ) {
        
            Nationalitie::create([
                'name_nationalitie'=>$n]);
            // dd($n);
        }

    }
}