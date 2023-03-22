<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title',$title)</title>
        <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('bootstrap/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
        <link href="{{asset('bootstrap/css/responsive.bootstrap5.min.css')}}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet">
    </head>
    <body>
@include('common.header')
<section class="page-wrapp">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Bread Crumb Start -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard/newprojects')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Dashboard</li>
                        </ol>
                    </nav>
                    <!-- Bread Crumb END -->
                    <a href="{{url('/admin/dashboard/user/add')}}">Add</a>
                    @if(Session::has('success'))
                    <div class="col-12 text-center content alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    <div class="card p-4 mt-2 mb-5 rounded-0">
                        <div class="table-responsive">
                            <table id="datatable" class="text-center table nowrap table-bordered border-primary" style="width:100%">
                                <thead>
                                    <tr>                                      
                                        <th class="text-center">Name</th>                                       
                                        <th class="text-center">DOB</th>
                                        <th class="text-center">DOJ</th>
                                        <th class="text-center">ROLE</th>
                                        <th class="text-center">Language</th>
                                        <th class="text-center">Contact</th>
                                        <th class="text-center">Email</th>                                        
                                        <th class="text-center">SESAME EMAIL</th>
                                        <th class="text-center">Location</th>
                                        <th class="text-center">Lead</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>                                
                                <tbody>
                                @foreach($userlist as $list)                                
                                @if($list->status==1)
                                    @php $status = "Active" @endphp
                                @elseif($list->status==0)    
                                    @php $status = "InActive" @endphp
                                @endif
                                    <tr>                                       
                                       <td>{{$list->name}}</td> 
                                       <td>{{ date('D M d Y', strtotime($list->dob)) }}</td> 
                                       <td>{{ date('D M d Y', strtotime($list->doj)) }}</td> 
                                       <td>{{ App\models\Common::getrole($list->type) }}</td>
                                       <td>{{$list->user_language}}</td>
                                       <td>{{$list->user_number}}</td>
                                       <td>{{$list->email}}</td>
                                       <td>{{$list->sesame_email}}</td>
                                       <td>{{App\models\Common::getlocation($list->location)}}</td>
                                       <td>{{ App\models\Common::getlead($list->usertl)}}</td>
                                       <td>{{ App\models\Common::getrole($list->type)}}</td>
                                       <td>{{$status}}</td>
                                       <td><a href="{{url('/admin/dashboard/user/edit')}}/{{$list->id}}">edit</a> / <a href="{{url('/admin/dashboard/user/delete')}}/{{$list->id}}">Delete</a></td>
                                    </tr>
                                    @endforeach	                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@include('common.footer')
<script>
    $(document).ready(function(){
        $('#datatable').DataTable({
            'columnDefs': [ {
                'targets': [1], // column index (start from 0)
                'orderable': false, // set orderable false for selected columns
            }],
            paging: false,
            scrollX: 490,

        });
    });
</script>