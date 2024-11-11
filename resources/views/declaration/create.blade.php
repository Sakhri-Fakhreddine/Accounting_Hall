<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Add Declaration - Consulting Hall</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <!-- Custom CSS for Boxed Layout -->
    <style>
        .boxed-container {
            max-width: 900px;
            margin: 0 auto; /* Center content */
            padding: 30px;
            background-color: #f8f9fa; /* Light background */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            margin-top: 30px; /* Spacing below header */
        }
    </style>
</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <!-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> -->
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
                                <a href="{{ route('create_declaration') }}" class="nav-link btn btn-success create-new-button">Add New Declaration</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="{{ route('show_declaration') }}">My Declarations</a>
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
    <!-- Page Content -->


    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Add New Declaration </h2>
            </div>
          </div>

          <div class="container">
            <div class="row">
                <div class="col-md-12">
                           <!-- Declaration Form -->
        <form action="{{ route('create_declaration.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="declaration_type">Declaration Type</label>
                <input type="text" class="form-control" id="declaration_type" name="declaration_type" placeholder="Enter declaration type" required>
            </div>
            <div class="form-group">
                <label for="declaration_date">Declaration Date</label>
                <input type="date" class="form-control" id="declaration_date" name="declaration_date" required>
            </div>
            <div class="form-group">
                <label for="details">Details (Optional)</label>
                <textarea class="form-control" id="details" name="details" placeholder="Enter additional details"></textarea>
            </div>
            <br>
            <h1 align="center"><strong>Line Declarations</strong></h1>
            <div id="line-declarations">
                <div class="line-declaration">
                    <h4><strong>Line Declaration : </strong></h4>
                    <br>
                    <div class="form-group">
                        <label for="typedeclaration">Type Declaration </label>
                        <input type="text" class="form-control" name="lignededeclarations[0][typedeclaration]" required>
                    </div>
                    <div class="form-group">
                        <label for="documents">Documents</label>
                        <input type="file" class="form-control" name="lignededeclarations[0][documents]">
                    </div>
                    <div class="form-group">
                        <label for="datepiece">Date Piece</label>
                        <input type="date" class="form-control" name="lignededeclarations[0][datepiece]" required>
                    </div>
                    <div class="form-group">
                        <label for="libelle">Libelle</label>
                        <input type="text" class="form-control" name="lignededeclarations[0][libelle]" required>
                    </div>
                    <div>
                    <button type="button" class="btn btn-danger remove-line">Remove Declaration line </button>
                    </div>
                    
                </div>
            </div>
            <div>
            <button type="button" id="add-line" class="btn btn-secondary">Add Another Line Declaration</button>
            <button type="submit" class="btn btn-primary">Add Declaration</button>
            </div>
            
        </form>
            </div>
        </div>

          
        </div>
      </div>
    </div>








    <!-- Footer -->
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>

    <script>
       let lineIndex = 1; // Starting index for line declarations

document.getElementById('add-line').addEventListener('click', function() {
    const newLine = `
        <div class="line-declaration">
            <h4>Line Declaration</h4>
            <div class="form-group">
                <label for="typedeclaration">Type Declaration</label>
                <input type="text" class="form-control" name="lignededeclarations[${lineIndex}][typedeclaration]" required>
            </div>
            <div class="form-group">
                <label for="documents">Documents</label>
                <input type="file" class="form-control" name="lignededeclarations[${lineIndex}][documents]">
            </div>
            <div class="form-group">
                <label for="datepiece">Date Piece</label>
                <input type="date" class="form-control" name="lignededeclarations[${lineIndex}][datepiece]" required>
            </div>
            <div class="form-group">
                <label for="libelle">Libelle</label>
                <input type="text" class="form-control" name="lignededeclarations[${lineIndex}][libelle]" required>
            </div>
            <button type="button" class="btn btn-danger remove-line">Remove</button>
        </div>`;
    document.getElementById('line-declarations').insertAdjacentHTML('beforeend', newLine);
    lineIndex++;
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-line')) {
        e.target.closest('.line-declaration').remove();
    }
});

    </script>
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
</style>
</body>

</html>
