@extends('admin.master')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12 col-sm-9 col-md-9">
                <!-- small box -->
                <form action="{{route('post.update', $post->slug)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputpost">post Name  - {{$post->id}}</label>
                            <input type="text" name="name" value="{{$post->name}}" class="form-control"
                                id="exampleInputpost" placeholder="Enter post Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Feature Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="imageInput" accept="image/*">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <img id="imagePreview" src="{{ asset($post->image) }}" alt="Image Preview" style="width: 226px; height: 235px;"/>
                        <div class="form-group">
                            <label for="exampleSelectBorder">Category Selection
                                <code>.form-control-border</code></label>
                            <select class="custom-select form-control-border" name="category" id="exampleSelectBorder"
                                aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" @if($post->category_id == $category->id) selected
                                    @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea id="summernote" name="description">
                    {{$post->description}}
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
