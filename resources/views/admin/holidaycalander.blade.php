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
                            <li class="breadcrumb-item active" aria-current="page">Holiday Calendar</li>
                        </ol>
                    </nav>
                    <!-- Bread Crumb END -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add</button>
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
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Location</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>                                
                                <tbody>
                                @foreach($data as $list)
                                    <tr>                                       
                                       <td>{{$list->title}}</td>
                                       <td>{{App\models\Common::getlocation($list->location)}}</td>
                                       <td>{{ date('D M d Y', strtotime($list->holidaydate))}}</td>
                                       <td><a href="{{url('/admin/dashboard/holiday/delete')}}/{{$list->id}}">delete</a></td>
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