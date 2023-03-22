<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\DB;
use App\Mail\userCreate;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function userlist(){
        $data['title'] ='User List';
        $data['userlist'] = User::whereIn('type', ['2','3','4','5'])->get();        
        return view('admin.user.userlist',$data);
    }
    public function userform(){
        $title ='User Add';
        $location = DB::table('location')->select("*")->get();  
        $role = DB::table('role')->select("*")->get();       
        $language = DB::table('language')->select("*")->get();  
        return view('admin.user.useradd',compact('title','location','role','language'));
    }
    public function getTl($lan){ 
        $userlist = DB::table('users')->select('id','name')
        ->where('user_language','=',$lan)
        ->where('type','=',4)
        ->where('status','=',1)
        ->get();
        return response()->json($userlist);        
    }
    public function saveuser(Request $request){        
        $request->validate([
            'firstname'=>'required|string|max:20',
            'lastname'=>'required|string|max:20',
            'password'=>'required|string|min:8|max:20',
            'dob'=>'required',
            'doj'=>'required',
            'email'=>'required|email',
            'sesame_email'=>'required|email',
            'location' =>'required',
            'role' =>'required',
        ]);
        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->name = $request->firstname.' '.$request->lastname;
        $user->password = Hash::make($request->password);
        $user->dob = $request->dob;
        $user->doj = $request->dob;
        $user->user_number = $request->user_number;
        $user->email = $request->email;
        $user->ldap_email = $request->ldap_email;
        $user->sesame_email = $request->sesame_email;
        $user->user_language = $request->user_language;
        if ($request->has('usertl')){
        $user->usertl = $request->usertl;
        }
        $user->location = $request->location;
        if ($request->has('role')){
        $user->type = $request->role;
        }
        $user->status=1;
        $user->onboard = 'Review';
        $res = $user->save();
        $data = array('firstname'=>$request->firstname,'lastname'=>$request->lastname,'email'=>$request->email,'password'=>$request->password,'sesame_email'=>$request->sesame_email);
        if($res){
            Mail::to($request->email)->cc([$request->ldap_email,$request->sesame_email])->send(new userCreate($data));
            return back()->with('success', 'User has been added successfully');
        }else{
            return back()->with('failed', 'User not added');
        }
        
    }
    public function deleteuser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success', 'User has been deleted successfully');
    }
    public function edituser($id){        
        $location = DB::table('location')->select("*")->get();  
        $role = DB::table('role')->select("*")->get();       
        $language = DB::table('language')->select("*")->get();  
        $title = 'User Edit';
        $user = User::findOrFail($id);
        $lan = $user->user_language;
        $usertl = DB::table('users')->select("id","name")
        ->where('user_language','=',$lan)
        ->where('type','=',4)
        ->where('status','=',1)
        ->get(); 
        
        return view('admin.user.useredit', compact('user','title','location','role','language','usertl'));
    }
    public function update(Request $request,$id){
        $user = User::find($id)->first();
        $request->validate([
            'firstname'=>'required|string|max:20',
            'lastname'=>'required|string|max:20',            
            'dob'=>'required',
            'doj'=>'required',
            'email'=>'required|email',
            'sesame_email'=>'required|email',
            'location' =>'required',
            'role' =>'required',
        ]);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->name = $request->firstname.' '.$request->lastname;
        if ($request->has('password')){
            $user->password = Hash::make($request->password);
        } 
        $user->dob = $request->dob;
        $user->doj = $request->dob;
        $user->user_number = $request->user_number;
        $user->email = $request->email;
        $user->ldap_email = $request->ldap_email;
        $user->sesame_email = $request->sesame_email;
        $user->user_language = $request->user_language;
        $user->usertl = $request->usertl;
        $user->location = $request->location;
        $user->type = $request->role;
        $user->status=1;
        $res = $user->save();
        if($res){
            return back()->with('success', 'User has been updated successfully');
        }else{
            return back()->with('failed', 'User not updated');
        }     
    }
}
