<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Common extends Model
{
    use HasFactory;
    public static function getrole($type){            
        return DB::table('role')
        ->where('id','=',$type)
        ->pluck('title')->first();
    }
    public static function getlead($utl){        
        return DB::table('users')
        ->whereIn('id', [$utl])        
        ->pluck('name')->first();
    }
    public static function getlocation($loc){ 
        $loc = explode(',',$loc);                   
        return DB::table('location')
        ->whereIn('id', $loc)        
        ->pluck('name')->implode(',');
    }
}
