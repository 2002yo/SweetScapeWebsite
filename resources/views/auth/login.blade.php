@extends('layout')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>EShopper - Bootstrap Shop Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

        <style>
            h2 {
                font-size: 40px;
                margin-bottom: 20px;
            }
            label{
                font-size: 16px;
            }
            input.inputnew{
                font-size: 12px;
                margin-bottom: 20px;
                /* background-color: #D19C97; */
            }
            input.button{
                font-size: 12px;
                margin-bottom: 20px;
                background-color: #D19C97;
            }
            
        </style>
    </head>

    <body>
        <!-- Topbar Start -->
        <div class="container-fluid">
            <div class="row bg-secondary py-2 px-xl-5">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-dark" href="">FAQs</a>
                        <span class="text-muted px-2">|</span>
                        <a class="text-dark" href="">Help</a>
                        <span class="text-muted px-2">|</span>
                        <a class="text-dark" href="">Support</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-dark pl-2" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center py-3 px-xl-5">
                <div class="col-lg-3 d-none d-lg-block">
                    <a href="" class="text-decoration-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span
                                class="text-primary font-weight-bold border px-3 mr-1">SweetScape</span>Cakes</h1>
                    </a>
                </div>
                {{-- <ul class="nav navbar-nav navbar-right">
                    @guest
                      {{-- <li><a href="{{ url ('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> --}}
                      {{-- <li><a href="{{ url ('registration')}}"><span class="glyphicon glyphicon-user"></span> Registration</a></li> --}}
                     
                      {{-- @else
                      
                      <li><a href="{{ url ('logout')}}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    @endguest
                  </ul> -- --}}


            </div>
        </div>
        <!-- Topbar End -->
<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        
        <div class="col-lg-12">
            <div class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        
                    </div>
                    <div class="navbar-nav ml-auto py-0">

                        @if (Auth::check())
                        {{-- <form method="POST" action="{{ route('logout') }}"> --}}
                            {{-- @csrf --}}
                            
                            {{-- <button type="submit">Logout</button> --}}
                            <li><a href="{{ url ('logout') }}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                        {{-- </form> --}}
                    @else
                   
                        {{-- <a href="{{ url ('login')}}" class="nav-item nav-link"><span class="glyphicon glyphicon-log-in "></span> Login</a> --}}
                        {{-- <a href="{{ url ('login')}}" class="nav-item nav-link">Login</a> --}}
                        <a href="{{ url ('registration')}}" class="nav-item nav-link"><span class="glyphicon glyphicon-user "></span> Registration</a>
             
                        {{-- <a href="{{ url ('registration')}}" class="nav-item nav-link">Register</a> --}}

                        @endif 
                    </div>
                    
                </div>
            </nav>
           
        </div>
    </div>
</div>
<!-- Navbar End -->
        <div class="container">
            <div class="row px-xl-5 pt-5">
                <div class="col-lg-8 offset-4">
                    <h2>Login Page</h2>

                    @if (Session::has('success'))
                        <div class="alert alert-successs">{{ Session::get('success') }}</div>
                    @endif

                    <form method="post" action="{{ route('login.post') }}">
                        @csrf


                        <div class="form-group row">
                            <label class="col-lg-2">E-mail</label>
                            <div class="col-lg-4">
                                <input type="email" name="email"  class="form-control inputnew" placeholder="Enter your e-mail" />
                            </div>

                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2">Password</label>
                            <div class="col-lg-4">
                                <input type="password" name="password" class="form-control inputnew"
                                    placeholder="Enter your password" />
                            </div>

                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-2">
                            </div>
                            <div class="col-lg-4">
                                <input type="submit" name="submit" class="btn btn-primary button" value="Login" />
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Footer Start -->
        <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
            <div class="row px-xl-5 pt-5">
                <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                    <a href="" class="text-decoration-none">
                        <h1 class="mb-4 display-5 font-weight-semi-bold"><span
                                class="text-primary font-weight-bold border border-white px-3 mr-1">SweetScape</span>Cakes
                        </h1>
                    </a>
                    <p>"At Sweetscape Cakes, we're passionate about crafting delightful confections that sweeten life's
                        most cherished moments. Our artisanal cakes and a wide selection of bakery equipment ensure
                        that every bite is an unforgettable experience. With a commitment to quality, creativity,
                        and a dash of magic in every recipe,
                        we're here to make your celebrations even more special. Join our sweet journey today!".</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>No 249 - 1/1, Cebel
                        Avenue,Colombo 05. </p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@sweetscapecakes.com/p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+011 345 6789</p>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-md-4 mb-5">
                            <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-dark mb-2" href="index.html"><i
                                        class="fa fa-angle-right mr-2"></i>Home</a>
                                <a class="text-dark mb-2" href="shop.html"><i
                                        class="fa fa-angle-right mr-2"></i>Products</a>
                                <a class="text-dark mb-2" href="detail.html"><i
                                        class="fa fa-angle-right mr-2"></i>Blogs</a>
                                <a class="text-dark mb-2" href="cart.html"><i
                                        class="fa fa-angle-right mr-2"></i>About</a>
                                <a class="text-dark mb-2" href="checkout.html"><i
                                        class="fa fa-angle-right mr-2"></i>Shop</a>
                                <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-5">
                            <h5 class="font-weight-bold text-dark mb-4">Hours Of Operation</h5>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-dark mb-2" href="index.html"></i>Monday to Friday : 8.00AM - 8.00PM</a>
                                <a class="text-dark mb-2" href="index.html"></i>Saturday : 9.00AM - 7.00PM</a>
                                <a class="text-dark mb-2" href="index.html"></i>Sundays & Public Holidays : Closed</a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-5">
                            <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                            <a class="text-dark mb-2" href="index.html"></i>Join our sweet community! Subscribe to our
                                newsletter for exclusive offers,
                                new cake releases, and baking tips.</a>
                            <form action="">
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 py-4" placeholder="Your Name"
                                        required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                        required="required" />
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe
                                        Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row border-top border-light mx-xl-5 py-4">
                <div class="col-md-6 px-xl-0">
                    <p class="mb-md-0 text-center text-md-left text-dark">
                        &copy; <a class="text-dark font-weight-semi-bold" href="#">SweetScape</a>. All Rights
                        Reserved.
                        <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com"></a><br>
                        <a href="https://themewagon.com" target="_blank"></a>
                    </p>
                </div>
                <div class="col-md-6 px-xl-0 text-center text-md-right">
                    <img class="img-fluid" src="img/payments.png" alt="">
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </body>

    </html>
@endsection
