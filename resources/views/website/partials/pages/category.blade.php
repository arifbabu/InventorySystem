@extends('website.master')
@section('category-title')
<title>{{$category->name}}</title>
@endsection
@section('content')
<section class="HomePageDescriptionSection">
    <div class="container  p-0">
        <div class="row mb-5">
            <div class="col-lg-7">
                <p class="homePageDescription">
                    {{$category->subject}}
                </p>
            </div>
        </div>
    </div>
    <!-- Card Item Starts Here -->
    <div class="container">
        <div class="row">
            {{--  posts --}}
            <div class="col-lg-8 col-md-12  col-sm-12 smallColumn">
                <div class="row">
                    @foreach ($posts as $item)
                    <div class="col-lg-6 col-md-6 col-sm-6 smallColumn ">
                        <div class="card p-0 mt-2">
                            <img class="card-img-top" style="height: 230px;" src="https://source.unsplash.com/random"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 20px">{{$item->name}}</h5>
                                <p class="card-text"> {!! Str::limit(strip_tags($item->description, 20)) !!}</p>
                                <a href="{{route('post.view.show', $item->slug)}}"
                                    {{-- class="btn btn-primary container-fluid">{{$item->name}}</a> --}}
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
                            <a href="{{route('post.view.show', $item->slug)}}"
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
                            <a href="{{route('post.view.show', $item->slug)}}"
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
