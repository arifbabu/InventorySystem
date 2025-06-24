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
                        <h3 class="card-title">
                            <strong style="color: red;">
                                User Wise Views
                            </strong>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    @can('post.id')
                                    <th>ID</th>
                                    @endcan
                                    <th>post Name</th>
                                    <th>Category</th>
                                    <th>User Name</th>
                                    @can('user.email')
                                    <th>Email</th>
                                    @endcan
                                    @can('post.uniqueViews')
                                    <th>Unique View</th>
                                    @endcan
                                    @can('post.totalViews')
                                    <th>Total View</th>
                                    @endcan
                                    @can('post.createdAt')
                                    <th>Created-At</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userPopularposts as $item)
                                <tr>
                                    @can('post.id')
                                    <td>{{$item->id}}</td>
                                    @endcan
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->category->name}}</td>
                                    <td>{{$item->user->name}}</td>
                                    @can('user.email')
                                    <td>{{$item->user->email}}</td>
                                    @endcan
                                    @can('post.uniqueViews')
                                    <td>{{$item->unique_views_count}}</td>
                                    @endcan
                                    @can('post.totalViews')
                                    <td>{{$item->total_views}}</td>
                                    @endcan
                                    @can('post.createdAt')
                                    <td>{{$item->created_at->format('F j, Y')}}</td>
                                    @endcan
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 mx-auto col-md-1 col-sm-6 smallColumn">
                            {{$userPopularposts->links()}}
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
