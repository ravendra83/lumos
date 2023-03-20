<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Task extends Model
{
    use HasFactory;
    protected $table ='reviewtask';
    public function getnewCount(){
       return Task::select("*")
        ->where([['status', '=', 'In review'],['assigned_uid', '=', 0]])
        ->whereIn('category', ['Review','DTR','Wmt','Ad-Hoc'])
        ->count(); 
    }
    public function gettodayCount(){
        return Task::select('reviewtask.*','users.name')
        ->join('users','users.id','=','reviewtask.assigned_uid')
        ->whereDate('review_due_date', '=', now()->format('Y-m-d'))
        ->where('reviewtask.status', '!=', 'Completed')
        ->whereIn('category', ['Review','DTR','Wmt','Ad-Hoc'])
        ->count();   
     }
     public function getweekCount(){
        return Task::select('reviewtask.*','users.name')
        ->join('users','users.id','=','reviewtask.assigned_uid')
        ->whereBetween('review_due_date', 
        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->where('reviewtask.status', '!=', 'Completed')
        ->whereIn('category', ['Review','DTR','Wmt','Ad-Hoc'])
        ->count();  
     }
     public function getbeyondCount(){
        $date = Carbon::parse('next monday')->toDateString();
        return Task::select('reviewtask.*','users.name')
        ->join('users','users.id', '=', 'reviewtask.assigned_uid')
        ->where('review_due_date', '>', $date)
        ->where('reviewtask.status', '!=', 'Completed')
        ->whereIn('category', ['Review','DTR','Wmt','Ad-Hoc'])
        ->count();  
     }
     public function getpendingCount(){
        return DB::table('reviewtask')
        ->join('users', function($join)
        {
            $join->on('users.id', '=', 'reviewtask.assigned_uid')
            ->whereDate('reviewtask.review_due_date', '<', now()->format('Y-m-d'))
            ->where('reviewtask.status','!=', 'Completed')
            ->whereIn('reviewtask.category', ['Review','DTR','Wmt','Ad-Hoc']);
        })->select('reviewtask.*','users.name')
        ->count(); 
     }
}
