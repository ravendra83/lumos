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
@include('common.popup')
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

                    <!-- Tab For Table -->
                    <div class="tab-menu mt-4">
                        <ul class="nav">
                            <li class="nav-item border border-secondary">
                                <a class="nav-link active" href="{{url('admin/dashboard/newprojects')}}">
                                    <div class="tab">
                                        <div class="tab-hed">New <span>Projects</span></div>
                                        <div class="tab-total"><span class="language"><div style="font-size:12px">Projects due: {{$newcount}}</div></span></div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item border border-secondary">
                                <a class="nav-link" href="{{url('admin/dashboard/todayprojects')}}">
                                    <div class="tab">
                                        <div class="tab-hed">Deliveries <span>for Today</span></div>
                                        <div class="tab-total"><span class="language"><div style="font-size:12px">Projects due:  {{$todaycount}}</div></span></div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item border border-secondary">
                                <a class="nav-link" href="{{url('admin/dashboard/weekprojects')}}">
                                    <div class="tab">
                                        <div class="tab-hed">Deliveries <span>this week</span></div>
                                        <div class="tab-total"><span class="language"><div style="font-size:12px">Projects due: {{$weekcount}}</div></span></div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item border border-secondary">
                                <a class="nav-link" href="{{url('admin/dashboard/beyondprojects')}}">
                                    <div class="tab">
                                        <div class="tab-hed">Deliveries <span>beyond</span></div>
                                        <div class="tab-total"><span class="language"><div style="font-size:12px">Projects due: {{$beyondcount}}</div></span></div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item border border-secondary">
                                <a class="nav-link" href="{{url('admin/dashboard/pendingprojects')}}">
                                    <div class="tab">
                                        <div class="tab-hed">Deliveries <span>Pending</span></div>
                                        <div class="tab-total"><span class="language"><div style="font-size:12px">Projects due: {{$pendingcount}}</div></span></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
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
                                    <label>Type</label>
                                    <select name="projecttype" class="form-control">
                                        <option value="">Select</option>
                                        <option value="COVID-19">COVID-19</option>
                                        <option value="Transcreation">Transcreation</option>
                                        <option value="LPE">LPE</option>
                                        <option value="Partial-review">Partial-review</option>
                                        <option value="VIDEO_SUBTITLES">Video Localization</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-info">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- for color code -->
                    <div class="card mt-3 mb-3 p-4 rounded-0">
                        <div class="color-box">
                            <ul class="list-group list-group-horizontal">
                                <li>
                                    <a href="#">
                                        <div style="background-color:#8E900C;"></div>
                                        <span>&nbsp;&nbsp;COVID-19</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div style="background-color:#FFFF00;"></div>
                                        <span>&nbsp;&nbsp;Transcreation</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div style="background-color:#FFA500;"></div>
                                        <span>&nbsp;&nbsp;LPE</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div style="background-color:#FF00FF;"></div>
                                        <span>&nbsp;&nbsp;Partial-review</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div style="background-color:#F9BBDC;"></div>
                                        <span>&nbsp;&nbsp;Video Localization</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- for Buttons -->
                    <div>
                        <button class="btn btn-info" id="assign">Assign</button>
                        <button class="btn btn-info" id="dchange">Date Change</button>
                    </div>
                    <!-- table data for list view -->
                    <div class="card p-4 mt-2 mb-5 rounded-0">
                        <div class="table-responsive">
                            <table id="datatable" class="text-center table nowrap table-bordered border-primary" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center"><input type="checkbox" id="select-all" class="form-check-input"></th>
                                        <th class="text-center">Title</th>                                       
                                        <th class="text-center">Words</th>
                                        <th class="text-center">Language</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Product</th>
                                        <th class="text-center">Content Type</th>
                                        <th class="text-center">Status</th>                                        
                                        <th class="text-center">Review Due Date</th>
                                        <th class="text-center">Creation Date</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                @foreach($projectlist as $list)
                                @php
                                    $bgcolor="#fff"
                                @endphp
                                    @if($list->projecttype=='COVID-19')
                                    @php $bgcolor = "#8E900C" @endphp
                                    @elseif($list->projecttype=='Transcreation')
                                    @php $bgcolor = "#FFFF00" @endphp
                                    @elseif($list->projecttype=='LPE')
                                    @php $bgcolor = "#FFA500" @endphp
                                    @elseif($list->projecttype=='Partial-review')
                                    @php $bgcolor = "#FF00FF" @endphp
                                    @elseif($list->projecttype=='VIDEO_SUBTITLES')
                                    @php $bgcolor = "#F9BBDC" @endphp
                                    @endif
                                    <tr style="background-color:{{$bgcolor}}">
                                        <td><input type="checkbox" name="id[]" value="{{$list->id}}" class="form-check-input"></td>
                                        <td>{{$list->title}}</td>
                                        <td>{{$list->worldcount}}</td>
                                        <td>{{$list->targetlanguage}}</td>
                                        <td>{{$list->category}}
                                            @if($list->subcategory!="")
                                                / {{$list->subcategory}}
                                            @endif
                                        </td>                                        
                                        <td>{{$list->product}}</td>
                                        <td>{{$list->contenttype}}</td>
                                        <td>{{$list->status}}</td>
                                        <td>{{ date('D M d Y, H:i:s A', strtotime($list->review_due_date)) }}</td>                                                                                
                                        <td>{{ date('D M d Y, H:i:s A', strtotime($list->created_at)) }}</td>                                                                                
                                        
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
                'targets': [0], // column index (start from 0)
                'orderable': false, // set orderable false for selected columns
            }],
            order: [[1, 'asc']],
            paging: false,
            scrollX: 490,

        });
    });
    $(document).ready(function() {
        $('#select-all').click(function() {
            $('input[type="checkbox"]').prop('checked', this.checked);
        })
        $('#dchange').click(function(){
            if (($('input[type=checkbox]:checked').length) == 0) {
                    alert("Please select at least one task to change the date.");
                    return false;
            }
            var checkbox_value = "";                    
            $(".form-check-input:checkbox").each(function () {
                var ischecked = $(this).is(":checked");
                if (ischecked) {
                    checkbox_value += $(this).val() + "|";                            
                }
            });            
            $('#tid').val(checkbox_value);
            $('#dateChange-popup').modal('show');
        })
        $('#myForm').submit(function(e) {            
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/admin/dashboard/reviewtask/updatedate",
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
        $('#assign').click(function(){
            if (($('input[type=checkbox]:checked').length) == 0) {
                    alert("Please select at least one task for assign.");
                    return false;
            }
        })
    });
</script>