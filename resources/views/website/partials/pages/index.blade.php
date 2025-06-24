@extends('website.master')
@section('content')
<section class="HomePageDescriptionSection">
    <div class="container  p-0">
        <div class="row mb-5">
            <div class="col-lg-7">
                <p class="homePageDescription">
                    "Home Page Description" <br> <br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem iusto expedita ex nemo porro
                    dolor, dicta sapiente recusandae velit enim fugiat cumque libero itaque consequuntur optio.
                    Minima, temporibus laborum dicta aperiam quidem, optio rem quam dolorum architecto, ut quisquam!
                    Eum eos cupiditate, in iste voluptas eveniet doloribus accusantium sint velit quae odio
                    consequatur soluta aliquam. Provident, voluptatem, ad sed perferendis doloremque quaerat
                    explicabo, reprehenderit hic auam optio
                    eveniet, dolore, quaerat quis qui nostrum porro? Ullam accusantium odio natus porro facere.
                </p>
            </div>
        </div>
    </div>
    <!-- Card Item Starts Here -->
    <div class="container">
        <div class="row">
            {{-- Left 6 posts --}}
            <div class="col-lg-9 col-md-12  col-sm-12 smallColumn">
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-lg-6 col-md-6 col-sm-6 smallColumn ">
                        <div class="card p-0 mt-2">
                            <img class="card-img-top" style="height: 130px;"  src="https://loremflickr.com/200/200?random=1"
                                alt="Card image cap">
                            <div class="card-body">
                                <h6 class="card-title">{{$post->name}}</h6>
                                {{-- <p class="card-text"> {!! Str::limit(strip_tags($post->description, 20)) !!}</p> --}}
                                <p class="card-text"> {!! Str::limit($post->description, 15, ' ...') !!} </p>
                                <a href="{{route('post.view.show', $post->slug)}}"
                                    class="btn btn-primary container-fluid">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row mt-5">
                    <div class="col-lg-3 mx-auto col-md-1 col-sm-6 smallColumn">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>

            <!-- List Item Starts -->
            <div class="col">
                <!-- Popular post Starte Here -->
                <div class="row marginTop768">
                    <ul class="list-group popularpostList ListItemHover shadow p-0">
                        <a class="list-group-item bg-dark text-white text-center ListItempostHeader"
                            style="text-decoration: none; font-weight: 600; font-size: 17px;">
                            Popular Product Name
                        </a>
                        @foreach ($popularpost as $item)
                        <li class="list-group-item">
                            <i class="fa-solid fa-star"></i>
                            {{-- <a href="{{route('post.view.show', $item->slug)}}" --}}
                            <a href="#"
                                style="margin-left: 4px; text-decoration: none; outline: 0; color: black;" id="List_ItemDescription">
                                {{$item->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Popular post Ends Here -->

                <!-- Category Item Starts Here -->
                <div class="row categoryRow mt-5">
                    <div class="categoryMainDiv p-0">
                        <a class="list-group-item bg-dark text-white text-center categoryHeader ListItempostHeader">
                            Category List
                        </a>
                        <ul style="list-style: none;">
                            @foreach ($restCategory as $cat)
                            @if ($cat->has('posts')->count() > 0)
                            <li class="nav-item">
                                <a class="btn activeClass" aria-current="page"
                                    href="{{route('post.view.category', $cat->slug)}}">{{$cat->name}}</a>
                            </li>
                            @else
                            <h4>nai</h4>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- Category Item Ends Here -->

                <!-- Latest post Starts Here -->
                <div class="row mt-5">
                    <ul class="list-group latestpostList ListItemHover shadow p-0">
                        <a class="list-group-item bg-dark text-white text-center ListItempostHeader"
                            style="text-decoration: none; font-weight: 600; font-size: 17px;">
                            Latest Product Name
                        </a>
                        @foreach ($latestpost as $item)
                        <li class="list-group-item">
                            <i class="fa-solid fa-star"></i>
                            {{-- <a href="{{route('post.view.show', $item->slug)}}" --}}
                            <a href="#"
                                style="margin-left: 4px; text-decoration: none; outline: 0; color: black;" id="List_ItemDescription">
                                {{$item->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Latest post Ends Here -->
            </div>
            <!-- Liste Item Ends -->
        </div>
        <hr class="mt-5">
        <hr>
    </div>
    <!-- Card Item Ends Here -->
</section>
@endsection
