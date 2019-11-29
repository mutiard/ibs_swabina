<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('jobseeker/template/head')
</head>

<body>
    <!-- header -->
    @include('jobseeker/template/header')
    <!-- //header -->
    <div class="inner-banner-w3ls">
    </div>
    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb d-flex justify-content-center bg-theme">
            <li class="breadcrumb-item">
                <a href="{{url('/')}}" class="text-white">Home</a>
            </li>
            <!-- <li class="breadcrumb-item active text-white font-weight-bold" aria-current="page">Job List</li> -->
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- jobs -->
    @yield('job')
    
    <!-- //jobs -->
    <!-- Footer -->
    @include('jobseeker/template/footer')
    <!-- /Footer -->
    <!-- <div class="cpy-right text-center py-4">
        <p class="text-dark">© 2018 Recruit. All rights reserved | Design by
            <a href="http://w3layouts.com" class="text-theme"> W3layouts.</a>
        </p>
    </div> -->
    @include('jobseeker/template/login')
    @include('jobseeker/template/script')
</body>

</html>
