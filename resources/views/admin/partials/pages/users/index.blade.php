@extends('admin.master')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12 col-sm-9 col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> <strong>User</strong> hover style</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                   @can('user.id')
                                   <th scope="col">ID</th>
                                   @endcan
                                    <th scope="col">Name</th>
                                    @can('user.email')
                                    <th scope="col">Email</th>
                                    @endcan
                                    @can('user.vTime')
                                    <th scope="col">Varification Time</th>
                                    @endcan
                                    @can('user.activepost')
                                    <th scope="col">Active post</th>
                                    @endcan
                                    @can('user.inActivepost')
                                    <th scope="col">InActive post</th>
                                    @endcan
                                    @can('user.role')
                                    <th scope="col">Role</th>
                                    @endcan
                                    @if (auth()->user()->can('user.edit') || auth()->user()->can('user.show') || auth()->user()->can('user.delete'))
                                    <th>Action</th>
                                    @endif                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                <tr>
                                   @can('user.id')
                                   <td>{{$user->id}}</td>
                                   @endcan
                                    <td>{{$user->name}}</td>
                                    @can('user.email')
                                    <td>{{$user->email}}</td>
                                    @endcan
                                    @can('user.vTime')
                                    <td>{{$user->email_verified_at}}</td>
                                    @endcan
                                    @can('user.activepost')
                                    <td>{{ $user->posts->where('status', 1)->count() }}</td>
                                    @endcan
                                    @can('user.inActivepost')
                                        <td>{{ $user->posts->where('status', 0)->count() }}</td>
                                    @endcan
                                    @can('user.role')                                        
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                        <label class="badge text-primary">{{ $v }}</label> |
                                        @endforeach
                                        @endif
                                    </td>
                                    @endcan
                                    <td>
                                        @can('user.edit')
                                        <a href="{{route('users.edit', $user->name)}}" target="_blank"><i
                                            class="fas fa-edit" style="font-size:12px; color: black;"></i></a>
                                        @endcan
                                        @can('user.show')
                                        <a href="{{route('users.show', $user->name)}}"><i class="fas fa-eye"
                                            style="font-size:12px; color: green;"></i></a>
                                        @endcan
                                        @can('user.delete')
                                        <a href="javascript:void(0)" class="user_delete" data-id="{{$user->id}}"><i
                                            class="fa fa-trash" aria-hidden="true"
                                            style="font-size:12px; color: red;"></i></a>
                                        @endcan                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 mx-auto col-md-1 col-sm-6 smallColumn">
                            {{$data->links()}}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
