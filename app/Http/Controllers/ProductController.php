<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ProductController extends Controller
{
     /**
     * Show the product for Reading resource.
     */
    public function productlist(){
        $data['title'] = 'Product List';
        $data['productlist']= DB::table('products')->select('*')->orderBy('id', 'DESC')->get();
        return view('admin.product', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function productInsert(Request $request){
        
        $validated = $request->validate([
            'title' => 'required|unique:products',
        ]);

        DB::table('products')->insert([
            'title' => $request->title,
            'created_at' => Carbon::now()
        ]);		
        return back()->with('success', 'Product has been created successfully.');
    }

    public function productDelete($id){
        DB::table('products')->where('id','=',$id)->delete();
        return back()->with('success', 'Product has been Deleted Successfully.');
    }
}
