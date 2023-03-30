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
                            <li class="breadcrumb-item active" aria-current="page">Not Approved Dar</li>
                        </ol>
                    </nav>
                    <!-- Bread Crumb END --> 
                    <!-- Search Form -->
                    <div class="card mt-3 mb-3 rounded-0">
                        <form class="p-4 search-form">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label>End Date</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label>Project Id</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label>Language</label>
                                    <select name="language" class="form-control">
                                        <option value="">Select</option>
                                        <option value="COVID-19">HI</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>Name</label>
                                    <select name="language" class="form-control">
                                        <option value="">Select</option>
                                        <option value="COVID-19">aaa</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>Service Type</label>
                                    <select name="language" class="form-control">
                                        <option value="">Select</option>
                                        <option value="COVID-19">LPE</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>Product</label>
                                    <select name="language" class="form-control">
                                        <option value="">Select</option>
                                        <option value="COVID-19">LPE</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>Content Type</label>
                                    <select name="language" class="form-control">
                                        <option value="">Select</option>
                                        <option value="COVID-19">LPE</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>Category</label>
                                    <select name="language" class="form-control">
                                        <option value="">Select</option>
                                        <option value="COVID-19">LPE</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-info">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-menu mt-4">
                        <ul class="nav">
                            <li class="nav-item border border-secondary">
                                <a class="nav-link" href="{{url('admin/dashboard/dar/notapproved')}}">
                                    <div class="tab">
                                        <div class="tab-hed">Not Approved <span>Dar</span></div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item border border-secondary">
                                <a class="nav-link active" href="{{url('admin/dashboard/dar/approved')}}">
                                    <div class="tab">
                                        <div class="tab-hed">Approved <span>Dar</span></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>                           
                    @if(Session::has('success'))
                    <div class="col-12 text-center content alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    
                        <div class="table-responsive">
                            <table id="datatable" class="text-center table nowrap table-bordered border-primary" style="width:100%">
                                <thead>
                                    <tr> 
                                        <th class="text-center">Date</th>                                      
                                        <th class="text-center">Name</th> 
                                        <th class="text-center">Project ID</th>
                                        <th class="text-center">Project Title</th>                                        
                                        <th class="text-center">Language</th>
                                        <th class="text-center">Activity Cat</th>
                                        <th class="text-center">Activity Sub Cat</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Service Type</th>
                                        <th class="text-center">Product</th>
                                        <th class="text-center">Content Type</th>
                                        <th class="text-center">Wordcount</th>
                                        <th class="text-center">Output</th>                                        
                                        <th class="text-center">Time</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Approved By</th>
                                        <th class="text-center">Approved Date</th>
                                        <th class="text-center">Not approve Reason</th>
                                        <th class="text-center">Dar Type</th>                                        
                                        <th class="text-center">created_at</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>                                
                                <tbody>
                                @foreach($approveddar as $list) 
                                    <tr>
                                       <td>{{ date('D M d Y', strtotime($list->dardate)) }}</td>
                                       <td>{{App\models\Common::getlead($list->userid)}}</td> 
                                       <td>{{$list->projectid}}</td>
                                       <td>{{$list->title}}</td>  
                                       <td>{{$list->language}}</td>
                                       <td>{{App\models\Common::getactivityCategory($list->activitycategory)}}</td>
                                       <td>{{App\models\Common::getactivitysubCategory($list->activitysubcategory)}}</td>
                                       <td>{{$list->comments}}</td>
                                       <td>{{$list->projecttype}}</td>
                                       <td>{{$list->product}}</td>
                                       <td>{{$list->contenttype}}</td>
                                       <td>{{$list->wordcount}}</td>
                                       <td>{{$list->output}}</td>
                                       <td>{{$list->hours}}:{{$list->minutes}}:{{$list->seconds}}</td>
                                       <td>{{$list->status}}</td>
                                       <td>{{App\models\Common::getlead($list->approvedby)}}</td>
                                       <td>{{ date('D M d Y, H:i:s A', strtotime($list->actiondate)) }}</td>
                                       <td>{{$list->unapprovereason}}</td>
                                       <td>{{$list->dartype}}</td>
                                       <td>{{ date('D M d Y, H:i:s A', strtotime($list->created_at)) }}</td>
                                       <td><a href="{{url('/admin/dashboard/dar/delete')}}/{{$list->id}}">delete</a></td>
                                    </tr>
                                    @endforeach	                                   
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </section>
@include('common.footer')
<script>
    $(document).ready(function(){
        $('#datatable').DataTable({
            'columnDefs': [ {
                'targets': [19], // column index (start from 0)
                'orderable': false, // set orderable false for selected columns
            }],
            paging: false,
            scrollX: 490,

        });
    });
</script>