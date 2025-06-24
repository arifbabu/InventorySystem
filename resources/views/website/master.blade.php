<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('post-title')
    @yield('category-title')
    @yield('Conatct Us')
    @include('website.partials.csslink')
    <title>Home Page</title>
</head>

<body>
    @include('website.partials.navBar')

    {{-- Main Content Starts Here --}}
    @yield('content')
    {{-- Main Content Ends Here --}}

   


    <footer>
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12 p-0">
                    <div class="footerNav">
                        <ul class="text-center">
                            <li><a href="#">Home</a></li>
                            <li><a href="{{route('contactPage.contact')}}">Contact US</a></li>
                            <li><a href="#">About US</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12 p-0 mt-1 mb-5">
                    <p class="text-center copyright">Copyright © 2025 InventorySystem. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>




    @include('website.partials.jslink')
</body>

</html>