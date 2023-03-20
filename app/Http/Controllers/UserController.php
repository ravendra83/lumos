<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;

class UserController extends Controller
{
    public function userlist(){
        $data['title'] ='User List';
        $data['userlist'] = User::whereIn('type', ['2','3','4','5'])->get();
        return view('admin.user',$data);
    }
}
