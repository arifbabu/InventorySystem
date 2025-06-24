@extends('admin.master')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-12 col-sm-9 col-md-9">
              <!-- small box -->
              <form action="{{route('category.update', $category->id)}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputCategory">Category Name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control" id="exampleInputCategory" placeholder="Enter Category Name">
                  </div>
                  <div class="form-group mb-4">
                    <label for="exampleFormControlTextarea" class="exampleFormControlTextarea">Write Your Message</label>
                    <textarea class="form-control" name="subject" id="exampleFormControlTextarea1" rows="3" placeholder="Write A Description">{{$category->subject}}</textarea>
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