<!-- Header Part Starts -->
<header class="sticky fixed headerClass">
    <div class="container p-0 ">
        <div class="row ">
            <div class="col-lg-12 ">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="container-fluid">
                        <a class="navbar-brand" style="color: white;" href="{{route('post.view.homepage')}}">
                            {{-- <img src="{{asset('frontend')}}/logo/main.png" alt="LOGO"> --}}
                            <p>InventorySystem</p>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            <ul class="navbar-nav ">
                                <li class="nav-item">
                                    <a class="nav-link  text-black activeClass" aria-current="page"
                                        href="{{route('post.view.homepage')}}">Home</a>
                                </li>
                                @foreach ($navItem as $cat)
                                @if ($cat->has('posts')->count() > 0)
                                <li class="nav-item">
                                    <a class="nav-link text-black activeClass" aria-current="page"
                                        href="{{route('post.view.category', $cat->slug)}}">{{$cat->name}}</a>
                                </li>
                                @else
                                <h4>nai</h4>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header Part Ends -->
