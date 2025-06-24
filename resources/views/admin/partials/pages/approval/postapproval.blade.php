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
                      <h3 class="card-title">post Approval Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>SI</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Category</th>
                          <th>User Email</th>
                          <th>User Image</th>
                          <th>Created-At</th>
                          <th>User Total Approved post</th>
                          <th>Approval</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            @if ($post->approval == 0)  
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->name}}</td>
                                <td>{!! $post->description !!}</td>
                                <td>{{$post->category->name}}</td>
                                <td>{{$post->user->email}}</td>
                                <td>{{$post->name}}</td>
                                <td>{{$post->name}}</td>
                                <td>{{$post->name}}</td>
                                <td>pending</td>
                                <td>
                                    <a href="{{route('post.edit', $post->id)}}" target="_blank" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('post.show', $post->id)}}" target="_blank" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-dark mr-1"><i class="fas fa-link"></i></a>
                                    {{-- <a href="{{route('post.destroy', $post->id)}}" class="btn btn-sm btn-danger mr-1"><i class="fas fa-trash"></i></a> --}}
                                    <form action="{{ route('post.destroy', [$post->id]) }}" class="mr-1" method="post">
                                      @method('DELETE')
                                      @csrf 
                                      <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                  </form>
                                </td>
                            </tr>
                            @endif
                            
                            @endforeach                      
                        </tbody>
                      </table>
                      {{-- {{$posts->links()}} --}}
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