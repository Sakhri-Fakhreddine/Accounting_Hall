<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Show declarations - Accounting Hall</title>

    <!-- Bootstrap core CSS -->
<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Additional CSS Files -->
<link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/templatemo-sixteen.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">

</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

     <!-- Header -->
     <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="/"><h2>Accounting <em>Hall</em></h2></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('login'))
                                @auth
                                <li class="nav-item">
                                  <a href="create_client" class="nav-link btn btn-success create-new-button">Add New Client</a>
                                  <a align="center" href="{{ url()->previous() }}" class="nav-link btn btn-danger create-new-button1">Back</a>
                                </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="show_client">My Clients</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                      <x-app-layout></x-app-layout>
                                    </li>
                                @else
                                    <li>
                                        <a class="nav-link" href="{{ route('login') }}">
                                            Log in
                                        </a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li>
                                            <a class="nav-link" href="{{ route('register') }}">
                                                Register
                                            </a>
                                        </li>
                                    @endif
                                @endauth
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
     <!-- Page Content -->
     <!-- Banner Starts Here -->
    <div class="banner header-text">
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Declaration Details</h2>
            </div>
          </div>
          <div class="col-md-6" >
            <div class="product-item">
            <h3 align="center"><strong> Declaration N° : </strong> </h3>
              <div class="down-content">
              <h3><strong>Type: </strong></h3>
              <h3><strong>Date:</strong> </h3>
              <h3><strong>Details:</strong></h3>
              <h3><strong>Number of declaration lines :</strong></h3>
                
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-item">
            <h3 align="center">{{ $declaration->id }}</h3>
              <div class="down-content">
              <h3>{{ $declaration->declaration_type }}</h3>
              <h3>{{ $declaration->declaration_date }}</h3>
              <h3>{{ $declaration->details }}</h3>
              <h3>{{ $declarationlines->count()}}</h3>
                
              </div>
            </div>
          </div>

        <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Declaration lines </h2>
            </div>
          </div>
          <div class="col-md-12">
          <div class="table-responsive">
          <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Document</th>
                <th>Date</th>
                <th>Value 1</th>
                <th>Value 2</th>
            </tr>
        </thead>
        <tbody>
            @foreach($declarationlines as $ligne)
            <tr>
                <td>{{ $ligne->idlignedeclarations }}</td>
                <td>{{ $ligne->typedeclaration }}</td>
                <td>{{ $ligne->documents ?? 'No Document Added' }}</td>
                <td>{{ $ligne->datepiece }}</td>
                <td>{{ $ligne->valeur1 ?? 'No Vlue'}}</td>
                <td>{{ $ligne->valeur2 ?? 'No Vlue' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
            </div>
          </div>
        </div>
      </div>
    </div>
          
        </div>
      </div>
    </div>
    


                <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <p>Copyright &copy; 2024 Accounting Hall.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

   <!-- Bootstrap core JavaScript -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Additional Scripts -->
<script src="{{ asset('assets/js/custom.js') }}"></script>

    <style>
    .create-new-button {
        position: fixed;    /* Fixes the position of the button */
        bottom: 30px;      /* 20px from the bottom */
        right: 20px;       /* 20px from the right */
        z-index: 1000;     /* Ensure it's above other content */
        padding: 10px 20px;  /* Customize padding for the button */
        font-size: 16px;     /* Adjust font size if necessary */
        transition: transform 0.3s ease; /* Smooth transition for the zoom effect */
    }

    .create-new-button:hover {
        transform: scale(1.1); /* Zoom effect on hover */
    }
    .create-new-button1 {
        position: fixed;    /* Fixes the position of the button */
        bottom: 30px;      /* 20px from the bottom */
        left: 20px;       /* 20px from the right */
        z-index: 1000;     /* Ensure it's above other content */
        padding: 10px 20px;  /* Customize padding for the button */
        font-size: 16px;     /* Adjust font size if necessary */
        transition: transform 0.3s ease; /* Smooth transition for the zoom effect */
    }

    .create-new-button1:hover {
        transform: scale(1.1); /* Zoom effect on hover */
    }
</style>
</body>

</html>