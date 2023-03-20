<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class reviewtask extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviewtask')->insert([            
            'projectid' => Str::random(10),
            'worldcount' => Str::random(10),
            'category' => Str::random(10),
            'subcategory' =>Str::random(10),
            'title' => Str::random(10),
            'projecttype' => Str::random(10),
            'contenttype' =>  Str::random(10),
            'product' =>  Str::random(10),
            'requestinstruction' => Str::random(10),
            'documentid' => Str::random(10),
            'sourcelanguage' => Str::random(10),
            'targetlanguage'=> Str::random(10),
            'status'=> Str::random(10)         
        ]);
    }
}
