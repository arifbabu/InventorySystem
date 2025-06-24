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
                        <h3 class="card-title"> <strong>RoleTable</strong> hover style</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <tr>
                                @can('role.id')
                                <th>ID</th>
                                @endcan
                                @can('role.name')
                                <th>Name</th>
                                @endcan
                                @can('role.createdAt')
                                <th>Created-At</th>
                                @endcan
                                @if (auth()->user()->can('role.edit') || auth()->user()->can('role.show') || auth()->user()->can('role.delete'))
                                <th width="280px">Action</th>
                                @endif
                            </tr>
                            @foreach ($roles as $role)
                            <tr>
                                @can('role.id')
                                <td>{{ $role->id }}</td>
                                @endcan
                                @can('role.name')
                                <td>{{ $role->name }}</td>
                                @endcan
                                @can('role.createdAt')
                                <td>{{$role->created_at->format('F j, Y')}}</td>
                                @endcan
                                <td>
                                    @can('role.edit')
                                    <a target="_blank" href="{{ route('roles.edit',$role->name) }}"><i class="fas fa-edit"
                                        style="font-size:18px; color: black;"></i></a>
                                    @endcan
                                    @can('role.show')
                                    <a href="{{ route('roles.show',$role->name) }}" id="show-role"><i class="fas fa-eye"
                                        style="font-size:18px; color: green;"></i></a>
                                    @endcan
                                    @can('role.delete')
                                    <a href="javascript:void(0)" class="role_delete" data-id="{{$role->id}}"><i
                                        class="fa fa-trash" aria-hidden="true"
                                        style="font-size:18px; color: red;"></i></a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 mx-auto col-md-1 col-sm-6 smallColumn">
                            {{$roles->links()}}
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
