<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContenttypeController extends Controller{

    /**
     * Show the Content Type for Reading resource.
     */
    public function contentlist(){
        $data['title'] = 'Content Type List';
        $data['contentlists']= DB::table('contenttypes')->select('*')->orderBy('id', 'DESC')->get();
        return view('admin.contenttype', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function contentInsert(Request $request){
        $request->validate([
            'title' => 'required',
        ]);
		DB::table('contenttypes')->insert([
                    'title' => $request->title,
                    'created_at' => Carbon::now()
                ]);				
        return back()->with('success', 'Content created successfully.');
    }

    public function contentDelete($id){
		 DB::table('contenttypes')->where('id','=',$id)->delete();
        return back()->with('success', 'Content Types Deleted Successfully.');
    }
}
