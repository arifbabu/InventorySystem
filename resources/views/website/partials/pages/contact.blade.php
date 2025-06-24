@extends('website.master')
@section('post-title')
<title>Contact Us</title>
@endsection
@section('content')
<section class="HomePageDescriptionSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mt-5">
                <p class="ContactPageDescription"> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum impedit quae, obcaecati eveniet recusandae exercitationem? Rerum dignissimos fugit culpa id placeat, consequatur eligendi accusantium quasi magnam animi in ullam quisquam maiores totam laudantium. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut dignissimos hic in.</p>
            </div>
        </div>
    </div>
    <!-- Container Ends -->
    <div class="container  p-0">

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif

        <div class="row mb-5">
            <div class="col-lg-7">
                <div class="card p-4 ContactPageForm">
                    <form action="{{route('user.mail.store')}}" method="post" id="contactForm">
                        @csrf
                        <div class="form-group">
                          <label for="nameInputName" class="nameInputName">Enter Your Name</label>
                          <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail" class="exampleInputEmail">Email address</label>
                          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlTextarea" class="exampleFormControlTextarea">Write Your Message</label>
                            <textarea class="form-control" name="subject" id="subject" rows="3" placeholder="Tell Us within 200 Words!"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container Ends -->
    

    <!-- Card Item Starts Here -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5 CategoryWisepostView text-center">
                Category Wise Most View
            </div>
            {{--  posts --}}
            <div class="col-lg-9 col-md-12  col-sm-12 smallColumn">
                <div class="row">
                    @foreach ($posts as $item)
                    <div class="col-lg-6 col-md-6 col-sm-6 smallColumn ">
                        <div class="card p-0 mt-2">
                            <img class="card-img-top" style="height: 230px;" src="https://source.unsplash.com/random"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->name}}</h5>
                                <p class="card-text"> {!! Str::limit(strip_tags($item->description, 20)) !!}</p>
                                <a href="{{route('post.view.show', $item->slug)}}"
                                    class="btn btn-primary container-fluid">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row mt-5">
                    <div class="col-lg-3 mx-auto col-md-1 col-sm-6 smallColumn">
                        <p class="text-center">{{$posts->links()}}</p>
                    </div>
                    {{-- <div class="col-lg-3 mx-auto col-md-1 col-sm-6 smallColumn">
                        {{$posts->links()}}
                    </div> --}}
                </div>
            </div>
            <!-- List Item Starts -->
            <div class="col">
                <!-- Popular post Starte Here -->
                <div class="row marginTop768">
                    <ul class="list-group popularpostList ListItemHover shadow p-0">
                        <a class="list-group-item bg-dark text-white text-center ListItempostHeader"
                            style="text-decoration: none; font-weight: 600; font-size: 17px;">
                            Popular post
                        </a>
                        @foreach ($popularpost as $item)
                        <li class="list-group-item">
                            <i class="fa-solid fa-star"></i>
                            <a href="{{route('post.view.show', $item->slug)}}"
                                style="margin-left: 4px; text-decoration: none; outline: 0; color: black;">
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
                            Latest post
                        </a>
                        @foreach ($latestpost as $item)
                        <li class="list-group-item">
                            <i class="fa-solid fa-star"></i>
                            <a href="{{route('post.view.show', $item->slug)}}"
                                style="margin-left: 4px; text-decoration: none; outline: 0; color: black;">
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