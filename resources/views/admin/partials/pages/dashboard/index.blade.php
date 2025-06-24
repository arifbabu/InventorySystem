@extends('admin.master')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-9 col-md-9">
                <h1 class="text-center" style="color: red; font-size: 45px; font-weight: 600;">User Information</h1>
            </div>
        </div>
        <hr style="border: 1px solid red;">
        {{-- Second Row Started --}}
        <div class="row">
            <div class="col-lg-12 col-sm-9 col-md-9">
                <ol>
                    <li>User Name : {{$user->name}}</li>
                    <li>User Name : {{$user->email}}</li>
                    {{-- <li>Total post : {{$user->posts->count()}}</li>
                    <li>Active post : {{$user->posts->where('status', 1)->count()}}</li>
                    <li>InActive post : {{$user->posts->where('status', 0)->count()}}</li> --}}
                    {{-- <li>Member Since : {{$user->email_verified_at->format('F j, Y')}}</li> --}}
                    <li>Member Since : {{$user->email_verified_at}}</li>
                </ol>
            </div>
        </div>
        <hr style="border : 1px solid red;">
    </div><!-- /.container-fluid -->
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                user/dashBoard
            </div>
        </div>
    </div> --}}
</section>
<!-- /.content -->
@endsection
