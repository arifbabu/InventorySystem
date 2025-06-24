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
                        <h3 class="card-title">Product Trash Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    @can('post.id')
                                    <th>SI</th>
                                    @endcan
                                    <th>Name</th>
                                    <th>Description</th>
                                    @can('post.category')
                                    <th>Category</th>
                                    @endcan
                                    @can('user.email')
                                    <th>User Email</th>
                                    @endcan
                                    @can('post.createdAt')
                                    <th>Created-At</th>
                                    @endcan
                                    @can('post.deletedAt')
                                    <th>Deleted-At</th>
                                    @endcan
                                    @if (auth()->user()->can('post.restore') || auth()->user()->can('post.pDelete'))
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trashposts as $post)
                                <tr>
                                    @can('post.id')
                                    <td>{{$post->id}}</td>
                                    @endcan
                                    <td>{{$post->name}}</td>
                                    <td>{!! Str::limit(strip_tags($post->description, 10)) !!}</td>
                                    @can('post.category')
                                    <td>{{$post->category->name}}</td>
                                    @endcan
                                    @can('user.email')
                                    <td>{{$post->user->email}}</td>
                                    @endcan
                                    @can('post.createdAt')
                                    <td>{{$post->created_at->format('F j, Y')}}</td>
                                    @endcan
                                    @can('post.deletedAt')
                                    <td>{{$post->deleted_at->format('F j, Y')}}</td>
                                    @endcan
                                    <td>
                                        @can('post.restore')
                                        <a class="restorepost" data-id="{{$post->id}}">
                                            <i class="fas fa-trash-restore" style="font-size: 18px; color:green;"></i>
                                        </a>
                                        @endcan
                                        @can('post.pDelete')
                                        <a class="permanentDeletepost" data-id="{{$post->id}}">
                                            <i class="fas fa-trash" style="font-size: 18px; color:red;"></i>
                                        </a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 mx-auto col-md-1 col-sm-6 smallColumn">
                            {{$trashposts->links()}}
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
