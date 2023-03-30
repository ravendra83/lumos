<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use Carbon\Carbon;

class AdminController extends Controller
{
    //New project list
    public function dashboard(){
        $data['title'] = "Dasbhoard";        
        $objtask = new Task();
        $data['newcount'] = $objtask->getnewCount(); 
        $data['todaycount'] = $objtask->gettodayCount(); 
        $data['weekcount'] = $objtask->getweekCount();
        $data['beyondcount'] = $objtask->getbeyondCount();
        $data['pendingcount'] = $objtask->getpendingCount();
        $data['projectlist']= Task::select("*")
        ->where([['status', '=', 'In review'],['assigned_uid', '=', 0]])
        ->whereIn('category', ['Review','DTR','Wmt','Ad-Hoc'])
        ->get();  
        return view('admin.dashboard',$data);
    }
    public function todayproject(){
        $data['title'] = "Today Project";
        $objtask = new Task();
        $data['newcount'] = $objtask->getnewCount(); 
        $data['todaycount'] = $objtask->gettodayCount(); 
        $data['weekcount'] = $objtask->getweekCount();
        $data['beyondcount'] = $objtask->getbeyondCount();
        $data['pendingcount'] = $objtask->getpendingCount();
        $data['todayprojectlist']= Task::select('reviewtask.*','users.name')
        ->join('users','users.id','=','reviewtask.assigned_uid')
        ->whereDate('review_due_date', '=', now()->format('Y-m-d'))
        ->where('reviewtask.status', '!=', 'Completed')
        ->whereIn('category', ['Review','DTR','Wmt','Ad-Hoc'])
        ->get();  
        return view('admin.today',$data);
    }
    public function weekproject(){
        $data['title'] = "Week Deliveries";
        $objtask = new Task();
        $data['newcount'] = $objtask->getnewCount(); 
        $data['todaycount'] = $objtask->gettodayCount(); 
        $data['weekcount'] = $objtask->getweekCount();
        $data['beyondcount'] = $objtask->getbeyondCount();
        $data['pendingcount'] = $objtask->getpendingCount();
        $data['weekprojectlist']= Task::select('reviewtask.*','users.name')
        ->join('users','users.id','=','reviewtask.assigned_uid')
        ->whereBetween('review_due_date', 
        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->where('reviewtask.status', '!=', 'Completed')
        ->whereIn('category', ['Review','DTR','Wmt','Ad-Hoc'])
        ->get();  
        return view('admin.week',$data);
    }
    public function beyondproject(){
        $data['title'] = "beyond Deliveries";
        $objtask = new Task();
        $data['newcount'] = $objtask->getnewCount(); 
        $data['todaycount'] = $objtask->gettodayCount(); 
        $data['weekcount'] = $objtask->getweekCount();
        $data['beyondcount'] = $objtask->getbeyondCount();
        $data['pendingcount'] = $objtask->getpendingCount();
        $date = Carbon::parse('next monday')->toDateString();
        $data['beyondprojectlist']= Task::select('reviewtask.*','users.name')
        ->join('users','users.id', '=', 'reviewtask.assigned_uid')
        ->where('review_due_date', '>', $date)
        ->where('reviewtask.status', '!=', 'Completed')
        ->whereIn('category', ['Review','DTR','Wmt','Ad-Hoc'])
        ->get();  
        return view('admin.beyond',$data);
    }
    public function pendingproject(){
        $data['title'] = "Pending Deliveries"; 
        $objtask = new Task();
        $data['newcount'] = $objtask->getnewCount(); 
        $data['todaycount'] = $objtask->gettodayCount(); 
        $data['weekcount'] = $objtask->getweekCount();
        $data['beyondcount'] = $objtask->getbeyondCount();
        $data['pendingcount'] = $objtask->getpendingCount();      
        $data['pendingprojectlist']= DB::table('reviewtask')
        ->join('users', function($join)
        {
            $join->on('users.id', '=', 'reviewtask.assigned_uid')
            ->whereDate('reviewtask.review_due_date', '<', now()->format('Y-m-d'))
            ->where('reviewtask.status','!=', 'Completed')
            ->whereIn('reviewtask.category', ['Review','DTR','Wmt','Ad-Hoc']);
        })->select('reviewtask.*','users.name')
        ->get();
        return view('admin.pending',$data);
    }
    public function holidaycalander(){
        $title = 'Holiday Calander';
        $location = DB::table('location')->select("*")->get();  
        $data = DB::table('holidaycalander')->select('title','location','holidaydate','id','year')->get();
        return view('admin.holidaycalander',compact('title','data','location'));
    }
    public function deleteholiday($id){        
        $holiday = DB::table('holidaycalander')->where('id','=',$id)->delete();
        //$holiday->delete();
        return back()->with('success', 'holiday has been deleted successfully');
    }
    public function saveholiday(Request $request){
        $title = $request->input('title');
        $date = $request->input('date');
        $location = $request->input('location');
        $location =  implode(',',$location);
        DB::table('holidaycalander')->insert(
            ['title' => $title, 'holidaydate' => $date, 'location' => $location ,'year' => date('Y'),'created_at' => Carbon::now()]
        );        
        //return redirect('/admin/dashboard/holiday')->with('success', 'holiday has been added successfully');
     }
     public function compoff(){
        $title = 'Comp off';
        $user = DB::table('users')->select("id","name")
        ->where('program','=',1)
        ->where('status','=',1)
        ->get(); 
        $compoff = DB::table('compoff')->select('*')->where('program','=',1)->where('year','=',date('Y'))->get();
        return view('admin.compoff',compact('title','compoff','user'));
     }
     public function savecompoff(Request $request){
        $uid = $request->input('uid');
        $date = $request->input('date');
        $program = 1;
        $total = $request->input('total');
        $details = $request->input('details');
        DB::table('compoff')->insert(
            ['uid' => $uid, 'date' => $date,'details' => $details , 'total' => $total ,'program' => $program ,'year' => date('Y'),'created_at' => Carbon::now()]
        );  
     }
     public function deletecompoff($id){
        $holiday = DB::table('compoff')->where('id','=',$id)->delete();        
        return back()->with('success', 'Comp off has been deleted successfully');
     }
     public function updatedate(Request $request){
         $taskid = $request->input('taskid');
         $review_due_date = $request->input('review_due_date');
         $hours = $request->input('hours');
         $minutes = $request->input('minutes');
         $seconds = $request->input('seconds');         
         $tid = explode("|", $taskid);
         $tid = implode(",",$tid);
         $review_due_date = $review_due_date.' '.$hours.':'.$minutes.':'.$seconds;         
         DB::table('reviewtask')->whereIn('id', [$tid])->update(array('review_due_date' => $review_due_date,'dueupdate' => 1)); 
         return back()->with('success', 'updated successfully');
        }
     public function updatewc(Request $request){
        $taskid = $request->input('uctaskid');
        $tid = explode("|", $taskid);
        $tid = implode(",",$tid);
        $worldcount = $request->input('worldcount');
        DB::table('reviewtask')->whereIn('id',[$tid])->update(array('worldcount'=>$worldcount));
        return back()->with('success', 'updated successfully');
     }
}
