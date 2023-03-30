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
                            <li class="breadcrumb-item active" aria-current="page">Approved Dar</li>
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
                    
                    <div class="row mb-2">
                        <div class="col-md-12">
                        <a href="#" class="btn btn-info" data-bs-target="#model-popup" data-bs-toggle="modal">Add <i class="bi bi-plus-square"></i></a>
                        </div>
                    </div>
                     <!-- model popup -->
                     <div class="modal fade" id="model-popup" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                        
                            <div class="modal-content">
                                <div class="modal-body">
                                <form id="myForm">
                                @csrf
                                <div class="row">    
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Date<span class="text-danger">*</span></label>
                                    <input  name="date" type="date" class="form-control" required>                                   
                                </div>                                
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Title<span class="text-danger">*</span></label>
                                    <input  name="title" type="text" class="form-control" required>                                  
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Activity type<span class="text-danger">*</span></label>
                                   <select name="activitysubcategory" class="form-control" required>
                                    <option value="">select</option>
                                    @foreach($activity as $val)
                                    <option value="{{$val->id}}">{{$val->title}}</option>
                                    @endforeach
                                 </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Time Spent<span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                    <select name="hours" class="form-control">
                                    <option value="HH">HH</option>
                                     <option value="00">00</option>
                                     <option value="01">01</option>
                                     <option value="02">02</option>
                                     <option value="03">03</option>
                                     <option value="04">04</option>
                                     <option value="05">05</option>
                                     <option value="06">06</option>
                                     <option value="07">07</option>
                                     <option value="08">08</option>
                                     <option value="09">09</option>
                                     @for($i=10;$i < 25;$i++)
                                     <option value="{{$i}}">{{$i}}</option>
                                     @endfor                                    
                                    </select></div>
                                    <div class="col-md-4">
                                    <select name="minutes" class="form-control">
                                    <option value="MM">MM</option>
                                     <option value="00">00</option>
                                     <option value="01">01</option>
                                     <option value="02">02</option>
                                     <option value="03">03</option>
                                     <option value="04">04</option>
                                     <option value="05">05</option>
                                     <option value="06">06</option>
                                     <option value="07">07</option>
                                     <option value="08">08</option>
                                     <option value="09">09</option>
                                     @for($i=10;$i < 60;$i++)
                                     <option value="{{$i}}">{{$i}}</option>
                                     @endfor                                    
                                    </select></div>
                                    <div class="col-md-4">
                                    <select name="seconds" class="form-control">
                                    <option value="SS">SS</option>
                                     <option value="00">00</option>
                                     <option value="01">01</option>
                                     <option value="02">02</option>
                                     <option value="03">03</option>
                                     <option value="04">04</option>
                                     <option value="05">05</option>
                                     <option value="06">06</option>
                                     <option value="07">07</option>
                                     <option value="08">08</option>
                                     <option value="09">09</option>
                                     @for($i=10;$i < 60;$i++)
                                     <option value="{{$i}}">{{$i}}</option>
                                     @endfor                                    
                                    </select>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Comment<span class="text-danger">*</span></label>
                                    <textarea name="comment" rows="4" cols="50" class="form-control" required></textarea>                                                                    
                                </div> 
                                <div class="col-md-2 mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                </div>
                               </div>
                               </form>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                
                               </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- model popup-->
                    <div class="tab-menu mt-4">
                        <ul class="nav">
                            <li class="nav-item border border-secondary">
                                <a class="nav-link active" href="{{url('admin/dashboard/dar/notapproved')}}">
                                    <div class="tab">
                                        <div class="tab-hed">Not Approved <span>Dar</span></div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item border border-secondary">
                                <a class="nav-link" href="{{url('admin/dashboard/dar/approved')}}">
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
                                        <th class="text-center">Dar Type</th>
                                        <th class="text-center">created_at</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>                                
                                <tbody>
                                @foreach($notapproveddar as $list) 
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
                'targets': [17], // column index (start from 0)
                'orderable': false, // set orderable false for selected columns
            }],
            paging: false,
            scrollX: 490,

        });
    });
 $(document).ready(function() {
        $('#myForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/admin/dashboard/dar/save",
                data: $(this).serialize(),
                success: function(response) {
                    //console.log(response);
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    }); 
</script>