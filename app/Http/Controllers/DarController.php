<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class DarController extends Controller
{
    public function approveddarlist(){
        $title ="Review Approved Dar";        
        $approveddar = DB::table('reviewdar')->where('isapprove','=',1)->get();
        return view('admin.review.approved',compact('title','approveddar'));
    }
    public function deletedar($id){
        DB::table('reviewdar')->where('id','=',$id)->delete();
        return back()->with('success', 'Dar has been deleted successfully');
    }
    public function notapproveddarlist(){
        $title ="Review Not Approved Dar";
        $activity = DB::table('activitycategory')->where('program','=',1)->get();
        $notapproveddar = DB::table('reviewdar')->where('isapprove','=',0)->get();
        return view('admin.review.notapproved',compact('title','notapproveddar','activity'));
    }
    public function darsave(Request $request){
        $acsid = $request->activitysubcategory;
        $actcat = DB::table('activitycategory')->select('groupid')->where('id','=',$acsid)->first();
       
        $request->validate([
            'date'=>'required',
            'title' => 'required',
            'activitysubcategory'=>'required',
            'comment'=>'required'
        ]);
        DB::table('reviewdar')->insert([
            'title' => $request->title,
            'userid' => Auth::user()->id,
            'dardate' => $request->date,
            'isapprove'=>0,
            'activitycategory'=>$actcat->groupid,
            'activitysubcategory'=>$request->activitysubcategory,
            'comments'=>$request->comment,
            'dartype'=>'manually',
            'hours'=>$request->hours,
            'minutes'=>$request->minutes,
            'seconds'=>$request->seconds,
            'year'=>date('Y'),
            'actiondate'=>Carbon::now(),
            'created_at' => Carbon::now()
        ]);				
        return redirect('/admin/dashboard/dar/notapproved')->with('success', 'Activity has been created successfully.');
    }
}
