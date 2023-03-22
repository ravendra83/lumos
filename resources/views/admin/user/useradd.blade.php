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
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('admin/dashboard/users')}}">User List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add User</li>
                        </ol>
                    </nav>
                    <!-- Bread Crumb END -->
                    @if(Session::has('success'))
                    <div class="col-12 text-center content alert alert-success">
                        {{Session::get('success')}}
                    </div>
                     @endif
                     @if(Session::has('failed'))
                    <div class="col-12 text-center content alert alert-warning">
                        {{Session::get('failed')}}
                    </div>
                    @endif
                        <div class="card p-4 mt-2 mb-5 rounded-0">
                        <form method="post" action="{{route('saveuser')}}">
                            @csrf
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">First Name<span class="text-danger">*</span></label>
                                        <input name="firstname" type="text" class="form-control" required>
                                            @error('firstname')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Last Name<span class="text-danger">*</span></label>
                                        <input  name="lastname" type="text" class="form-control" required>
                                        @error('lastname')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Password <span class="text-danger">*</span></label>
                                        <input name="password" type="password" class="form-control" required>
                                        @error('password')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Date Of birth<span class="text-danger">*</span></label>
                                        <input name="dob" type="date" class="form-control" required>
                                        @error('dob')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Date Of Joining<span class="text-danger">*</span></label>
                                        <input name="doj" type="date" class="form-control" required>
                                        @error('doj')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Contact Number</label>
                                        <input name="user_number" type="text" class="form-control">
                                        
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Email Address<span class="text-danger">*</span></label>
                                        <input name="email" type="email" class="form-control" required>
                                        @error('email')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">LDAP Email Address</label>
                                        <input name="ldap_email" type="email" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Sesame Email Address<span class="text-danger">*</span></label>
                                        <input name="sesame_email" type="email" class="form-control" required>
                                        @error('sesame_email')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Language</label>
                                        <select name="user_language" class="form-select" aria-label="Default select example" id="language">
                                            <option value="">Select</option>
                                            @foreach($language as $lan)
                                            <option value="{{$lan->code}}">{{$lan->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">TL</label>
                                        <select name="usertl" class="form-select" aria-label="Default select example" id="usertl">
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Location<span class="text-danger">*</span></label>
                                        <select name="location" class="form-select" aria-label="Default select example">
                                            <option value="">Select</option>
                                            @foreach ($location as $loc)
                                            <option value="{{$loc->id}}">{{$loc->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('location')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Role<span class="text-danger">*</span></label>
                                        <select name="role" class="form-select" aria-label="Default select example">
                                            <option value="">Select</option>
                                            @foreach($role as $userrole)
                                            <option value="{{$userrole->id}}">{{$userrole->title}}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                    </div>
                                    
                                </div>
                                <button type="submit" class="btn btn-info mt-3 text-center" style="float:right;">Submit</button>
                            </form>
                    </div>
                </div>
            </div>
        </section>
@include('common.footer')
<script>
    $('#language').change(function() {
        var lan = $(this).val();        
        $.ajax({
            url: "/admin/dashboard/user/gettl/"+lan,
            type: 'get',
            dataType: 'json',
            success: function(data) {
                $('#usertl').html('<option value="">Select</option>');
                $.each(data, function(key, value) {
                    $('#usertl').append('<option value="' + value.id + '">' + value.name + '</option>');
                });
                }
            });
    });
</script>