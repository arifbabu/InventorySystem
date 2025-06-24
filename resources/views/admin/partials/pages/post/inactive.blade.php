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
                        <h3 class="card-title">Product Index Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    @can('post.id')
                                    <th>ID</th>
                                    @endcan
                                    <th>Name</th>
                                    <th>User</th>
                                    <th>Feat. Image</th>
                                    <th>Description</th>
                                    @can('post.category')
                                    <th>Category</th>
                                    @endcan
                                    @can('post.userShow')
                                    <th>User</th>
                                    @endcan
                                    @can('post.slug')
                                    <th>Slug</th>
                                    @endcan
                                    @can('post.id')
                                    <th>Active</th>
                                    @endcan
                                    @if (auth()->user()->can('post.edit') || auth()->user()->can('post.show') || auth()->user()->can('post.delete'))
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    @can('post.id')
                                    <td>{{$post->id}}</td>
                                    @endcan
                                    <td>{{$post->name}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td>
                                        <img style="width: 50px; height: 50px; border-radius: 50%;"
                                            src="{{ asset($post->image) }}" alt="Avatar" />
                                    </td>
                                    <td>{!! Str::limit(strip_tags($post->description, 10)) !!}</td>
                                    @can('post.category')
                                    <td>{{$post->category->name}}</td>
                                    @endcan
                                    @can('post.userShow')
                                    <td>{{$post->user->name}}</td>
                                    @endcan
                                    @can('post.slug')
                                    <td>{{$post->slug}}</td>
                                    @endcan
                                    @can('post.active')
                                    <td>
                                        <div class="form-group">
                                            <div
                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input toggle-class"
                                            id="{{$post->id}}" data-id="{{$post->id}}"
                                            {{ $post->status ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="{{$post->id}}"></label>
                                        </div>
                                    </div>
                                </td>
                                @endcan
                                <td>
                                    @can('post.edit')
                                    <a href="{{route('post.edit', $post->slug)}}" target="_blank"><i
                                        class="fas fa-edit" style="font-size:12px; color: black;"></i></a>
                                    @endcan
                                    @can('post.show')
                                    <a href="javascript:void(0)" data-url="{{ route('post.active', $post->id) }}"
                                        id="show-user"><i class="fas fa-eye"
                                            style="font-size:12px; color: green;"></i></a>
                                    @endcan
                                    @can('post.delete')
                                    <a href="javascript:void(0)" class="post_delete" data-id="{{$post->id}}"><i
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
                            {{$posts->links()}}
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

<!-- Modal -->
<div class="modal fade" id="postShowModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="post-id"></span></p>
                <p><strong>Name:</strong> <span id="post-name"></span></p>
                <p><strong>User:</strong> <span id="post-user"></span></p>
                {{-- <p><strong>description:</strong> <span id="post-description"></span></p> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>





@endsection
