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
}
