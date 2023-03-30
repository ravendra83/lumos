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
                            <li class="breadcrumb-item active" aria-current="page">Watch Out</li>
                        </ol>
                    </nav>
                   
                    <!-- Bread Crumb END -->
                    <a href="#" class="btn btn-info" data-bs-target="#model-popup" data-bs-toggle="modal">Add <i class="bi bi-plus-square"></i></a>
                     <!-- model popup -->
                     <div class="modal fade" id="model-popup" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                        
                            <div class="modal-content">
                                <div class="modal-body">
                                <form id="myForm">
                                @csrf
                                <div class="row">    
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Project ID<span class="text-danger">*</span></label>
                                    <input  name="projectid" type="text" class="form-control" required>                                   
                                </div>                                
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Language<span class="text-danger">*</span></label>
                                    <select name="language[]" class="form-select"  multiple aria-label="Default select example" required>
                                        <option value="">Select</option>
                                        @foreach ($language as $lan)
                                        <option value="{{$lan->code}}">{{$lan->name}}</option>
                                         @endforeach
                                </select>                                 
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
                    @if(Session::has('success'))
                    <div class="col-12 text-center content alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif                    
                        <div class="table-responsive">
                            <table id="datatable" class="text-center table nowrap table-bordered border-primary" style="width:100%">
                                <thead>
                                    <tr>                                      
                                        <th class="text-center">Project</th>
                                        <th class="text-center">Language</th>
                                        <th class="text-center">Comment</th>
                                        <th class="text-center">Created Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>                                
                                <tbody>
                                @foreach($watchout as $list)
                                    <tr>                                       
                                       <td>{{$list->projectid}}</td>
                                       <td>{{$list->language}}</td>
                                       <td>{{$list->comment}}</td>
                                       <td>{{ date('D M d Y', strtotime($list->created_at))}}</td>
                                       <td><a href="{{url('/admin/dashboard/watchout/delete')}}/{{$list->id}}">delete</a></td>
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
 $(document).ready(function() {
        $('#myForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "/admin/dashboard/watchout/save",
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