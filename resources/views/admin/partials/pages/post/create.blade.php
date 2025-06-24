@extends('admin.master')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12 col-sm-9 col-md-9">
          <!-- small box -->
          <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputpost">Product Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputpost" placeholder="Enter post Name" autofocus>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Feature Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="triggerInput" accept="image/*" onchange="previewImage(event)">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>
              <div class="form-group" id="hiddenField">
                <img id="preview" src="#" style="width: 226px; height: 235px;" >
              </div>
              <div class="form-group">
                <label for="exampleSelectBorder">Category Selection <code>.form-control-border</code></label>
                <select class="custom-select form-control-border" name="category" id="exampleSelectBorder" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                  <textarea id="summernote" name="description">
                    Place <em>some</em> <u>text</u> <strong>here</strong>
                  </textarea>
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