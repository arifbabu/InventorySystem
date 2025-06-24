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
                        <h3 class="card-title"> <strong>Category</strong> hover style</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    @can('category.id')
                                    <th scope="col">ID</th>
                                    @endcan
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    @can('category.slug')
                                    <th scope="col">Slug</th>
                                    @endcan
                                    @can('category.activepost')
                                    <th scope="col">Active</th>
                                    @endcan
                                    @can('category.inActivepost')
                                    <th scope="col">InActive</th>
                                    @endcan
                                    @can('category.createdAt')
                                    <th scope="col">Created-At</th>
                                    @endcan
                                    @if (auth()->user()->can('category.edit') || auth()->user()->can('category.show') || auth()->user()->can('category.delete'))
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $category)
                                <tr>
                                    @can('category.id')
                                    <td>{{$category->id}}</td>
                                    @endcan
                                    <td>{{$category->name}}</td>
                                    <td>{{ Str::limit(strip_tags($category->subject, 20)) }}</td>
                                    @can('category.slug')
                                    <td>{{$category->slug}}</td>
                                    @endcan
                                    @can('category.activepost')
                                    <td>{{$category->posts->where('status', 1)->count() }}</td>
                                    @endcan
                                    @can('category.inActivepost')
                                    <td>{{$category->posts->where('status', 0)->count() }}</td>
                                    @endcan
                                    @can('category.createdAt')
                                    <td>{{$category->created_at->format('F j, Y')}}</td>
                                    @endcan
                                    <td>
                                        @can('category.edit')
                                        <a href="{{route('category.edit', $category->slug)}}" target="_blank"><i
                                            class="fas fa-edit" style="font-size:12px; color: black;"></i></a>
                                        @endcan
                                        @can('category.show')
                                        <a href="javascript:void(0)" data-url="{{ route('post.show', $category->id) }}"
                                            id="show-user"><i class="fas fa-eye"
                                                style="font-size:12px; color: green;"></i></a>
                                        @endcan
                                        @can('category.delete')
                                        <a href="javascript:void(0)" class="category_delete"
                                        data-id="{{$category->id}}"><i class="fa fa-trash" aria-hidden="true"
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
