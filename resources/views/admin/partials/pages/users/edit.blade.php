@extends('admin.master')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12 col-sm-9 col-md-9">

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                        </div>
                    </div>
                </div>
                <!-- small box -->
                <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <hr>
                        <div class="form-group">
                            <h5 for="exampleInputpost">User Name : {{$user->name}} </h5>
                        </div>
                        <div class="form-group">
                            <h5 for="exampleInputpost">User Email : {{$user->email}} </h5>
                        </div>
                        <hr>
                        <div class="form-group">
                            <h6 class="text-bold text-danger mb-3">Please Check Roles "Below One or Many" &nbsp; : </h6>
                            @foreach($roles as $tag)
                            <div class="custom-control custom-checkbox" style="margin-right: 20px">
                                <input class="custom-control-input" name="roles[]" type="checkbox" id="tag{{ $tag->id}}"
                                    value="{{ $tag->id }}" @foreach($userRole as $t) @if($tag->id == $t->id) checked
                                @endif
                                @endforeach
                                >
                                <label for="tag{{ $tag->id}}" class="custom-control-label">{{ $tag->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
