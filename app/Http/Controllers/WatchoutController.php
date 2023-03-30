<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class WatchoutController extends Controller
{
    //
    public function watchout(){
        $title = 'Watch Out';
        $language = DB::table('language')->select('name','code')->where('program','=',1)->get();
        $watchout = DB::table('reviewwatchout')->where('year','=',date('Y'))->get();
        return view('admin.watchout',compact('title','watchout','language'));
    }
    public function watchoutsave(Request $request){
        $projectid = $request->input('projectid');
        $language = $request->input('language');
        $comment = $request->input('comment');
       
        $year = date('Y');
        foreach ($language as $lan) {
            if(!empty($lan))
            {
                DB::table('reviewwatchout')->insert([
                  'projectid' => $projectid,
                    'language'   => $lan,
                    'comment'   => $comment,
                    'apiresponse' =>0,
                    'year' => $year,
                    'created_at' => Carbon::now()
                ]);
            }
        }  
        return back()->with('success','project has been added successuly');

    }
}
