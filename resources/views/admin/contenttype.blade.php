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
                    <li class="breadcrumb-item active" aria-current="page">Conetnt Types</li>
                </ol>
            </nav>
            <!-- Bread Crumb END -->
            <div class="row mb-2">
                <div class="col-md-12">
                    <a href="#" class="btn btn-info float-end" data-bs-target="#add-content" data-bs-toggle="modal">Add <i class="bi bi-plus-square"></i></a>
                </div>
            </div>
            <!-- for show message -->
            @if(\Session::get('success'))
                <div class="mb-3">
                    <div class="alert alert-success alert-dismissible fade show">
                        <div class="alert-body">
                            {{ \Session::get('success') }}
                        </div>
                    </div>
                </div> 
            @endif
            <!-- table data for list view -->
            <div class="table-responsive">
                <table id="datatable" class="text-center table nowrap table-bordered border-primary" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">Title</th> 
                            <th class="text-center">Create Date</th>                                      
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($contentlists as $list)
                        <tr>                          
                            <td>{{$list->title}}</td>
                            <td>{{ date('D M d Y', strtotime($list->created_at)) }}</td>
                            <td>
                                <!--<button type="button" class="btn btn-info edit-btn" value="{{$list->id}}"><i class="bi bi-pencil-square"></i></button>-->
                                <a href="{{url('admin/dashboard/contenttype/'.$list->id)}}" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                    @endforeach	                                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- model Popup start -->
<div class="modal fade" id="add-content" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <form method="POST" action="{{url('admin/dashboard/contenttype')}}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required />
                </div>
                <button type="submit" class="btn btn-info float-end">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- model Popup End -->
<!-- Edit Model Popup start -->
<div class="modal fade" id="edit-model" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Content Types</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Edit Popup
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" >Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Edit Model Popup End -->
@include('common.footer')
<script>
    $(document).ready(function(){
        $('#datatable').DataTable({
            'columnDefs': [ {
                'targets': [2], // column index (start from 0)
                'orderable': false, // set orderable false for selected columns
            }],
            paging: false,
            scrollX: 490,

        });
    });
</script>