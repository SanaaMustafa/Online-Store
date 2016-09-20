<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ShopME</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

   <!-- Bootstrap Core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Custom Fonts -->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="/vendor/">
    <link href="/css/agency.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/agency.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    

</head>
<style type="text/css">
.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
    color: #FF9800;
    background-color: #fed136;
}
.dropdown-menu{
    background-color: #FFC107;
}
.row{
    padding-top:75px;
}
h2{
    text-transform: capitalize;
    color: #FFC107;
}
h3{
    text-transform: capitalize;
}
.text-p {
    color: green;
}
.text-r{
    color:red;
}
header {
    background-image: url('../img/admin.png');
    margin-top: 100px;
    height: 315px;
    background-size: cover;
    width:1300;
  
}

</style>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top" style="background-color:black;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="{{url('/ShopME')}}">SHopME</a>
            </div>

            <ul class="nav navbar-nav">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                
                                <li><a href="{{url('/cart')}}">Cart</a></li>
                            
                            
                            </ul>
                        </li>
                    @endif
                </ul>

          
        </div>
        <!-- /.container-fluid -->
    </nav>




 <!-- Services Section -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Shopping Cart</h2>
                    <h3 class="section-subheading text-muted">Manage your Cart</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <!-- View of Add Product with Error at Uploading image-->
                    <h4 class="service-heading">your Products</h4>
                   
                <div class="text-muted">
                   
                @foreach($items as $item)
                    
                        
                            <div class="media">
                                <a class="thumbnail pull-left" href="{{ route('ShopME.show', $item->product->id) }}"> <img class="media-object" src="/img/{{$item->product->image}}" style="width: 100px; height: 72px;"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="{{ route('ShopME.show', $item->product->id) }}">{{$item->product->title}}</a></h4>
                                </div>
                            </div>
                        
                       
                       <strong>${{$item->product->price}}</strong><br>
                            <a href="/removeItem/{{$item->id}}"> <button type="button" class="btn btn-danger">
                                    <span class="fa fa-remove"></span> Remove
                                </button>
                            </a>
                            

                                            
                @endforeach
                <h3><strong>Total : ${{$total}}</strong></h3>
                  <br>
                            <button type="button" class="btn btn-success">
                            Buy Now <span class="fa fa-play"></span>
                        </button>
                </div>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-p"></i>
                        <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                    </span>
                    <!-- View of Add Product with Error at Uploading image-->
                    <h4 class="service-heading">your Information</h4>
                   
                <div class="text-muted">
                   
               <h3> {{Auth::user()->name}}<h3>
                <p>
                    Email: {{Auth::user()->email}}<br>
                    Phone:{{Auth::user()->phone}}<br>
                     Address:{{Auth::user()->Address}}<br>
                      Country:{{Auth::user()->country}}<br>
                </p>
                    
                        
                          
                                            
                
                </div>
                </div>
            </div>
            </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

  
    

    <!-- jQuery -->
    <script src="/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="/js/jqBootstrapValidation.js"></script>
    <script src="/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="/js/agency.min.js"></script>

</body>

</html>
