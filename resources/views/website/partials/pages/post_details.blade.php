@extends('website.master')
@section('post-title')
<title>{{$post->name}}</title>
@endsection
@section('content')
<!-- post Details Section Starts -->
<section id="postDetails" style="margin-top: 65px;">
    <!-- <div class="container bg-success"> -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1>{{$post->name}}</h1>
                <div class="row p-4">
                    <div class="col-lg-12 bg-light" id="user_info">
                        <a>
                            <p><i class="fa-solid fa-user"></i> {{$post->user->name}} </p>
                            <!-- <p>Arif Billah</p> -->
                        </a>
                        <a class="mx-3">
                            <p> <i class="fa-regular fa-calendar-days"></i> {{$post->created_at->format('F j, Y')}} </p>
                        </a>
                        <a>
                            <p> <i class="fas fa-briefcase"></i> {{$post->category->name}} </p>
                        </a>
                    </div> <br> <br>
                    <img class="w-100 postImage"  src="{{ asset($post->image) }}" alt="Image not found!!">
                    <p>
                        {!! $post->description !!}
                    </p>

                </div>
            </div>
            <!-- Left Side post Details Ends -->
            <div class="col-lg-4 mainColLg4">
                <!-- Popular post Starts Here -->
                <div class="row PopularpostForpostDetailsPage shadow">
                    <ul class="list-group ListItemHover p-0">
                        <a class="list-group-item bg-dark text-white text-center listGroupHeader ListItempostHeader">
                            Popular post
                        </a>
                        @foreach ($popularpost as $item)
                        <li class="list-group-item">
                            <i class="fa-solid fa-star"></i>
                            <a href="{{route('post.view.show', $item->slug)}}" id="List_ItemDescription">
                                {{$item->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Popular post Ends Here -->

                <!-- Category Starts Here -->
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
                <!-- Category Ends Here -->

                <!-- Latest post Starts Here -->
                <div class="row latestpostBottomForDetails mt-5  shadow">
                    <ul class="list-group ListItemHover p-0">
                        <a class="list-group-item bg-dark text-white text-center listGroupHeader ListItempostHeader">
                            Latest post
                        </a>
                        @foreach ($latestpost as $item)
                        <li class="list-group-item">
                            <i class="fa-solid fa-star"></i>
                            <a href="{{route('post.view.show', $item->slug)}}" id="List_ItemDescription">
                                {{$item->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Latest post Ends Here -->
            </div>
        </div>

        <hr class="mt-5">
        <div class="row ">
            <div class="col-lg-8 mb-2">
                <!-- Related post Starts Here -->
                <div class="row RelatedpostForDetails mt-5 shadow">
                    <ul class="list-group p-0 ListItemHover">
                        <a class="list-group-item bg-dark text-white listGroupHeader ListItempostHeader"
                            style="justify-content: center;">
                            Related post
                        </a>
                        @foreach ($related as $item)
                        <li class="list-group-item">
                            <i class="fa-solid fa-star"></i>
                            <a href="{{route('post.view.show', $item->slug)}}" id="List_ItemDescription">
                                {{$item->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <hr class="mt-5">
        <hr>
    </div>

</section>
<!-- post Details Section Ends -->
@endsection
