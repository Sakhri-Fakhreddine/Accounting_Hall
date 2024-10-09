<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Edit Declaration - Consulting Hall</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <!-- <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html"><h2>Consulting <em>Hall</em></h2></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.html">Our Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('login'))
                            @auth
                            <li class="nav-item">
                                <a href="/">Profile</a>
                            </li>
                            @else
                            <li> <a class="nav-link" href="{{ route('login') }}">Log in</a> </li>

                            @if (Route::has('register'))
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a> </li>
                            @endif
                            @endauth
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header> -->

    <div class="container">
        <h2>Edit Declaration</h2>
        <form action="{{ route('declarations.update', $declaration->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="declaration_type">Declaration Type</label>
                <input type="text" name="declaration_type" class="form-control" value="{{ $declaration->declaration_type }}" required>
            </div>

            <div class="form-group">
                <label for="declaration_date">Declaration Date</label>
                <input type="date" name="declaration_date" class="form-control" value="{{ $declaration->declaration_date }}" required>
            </div>

            <div class="form-group">
                <label for="details">Details</label>
                <input type="text" name="details" class="form-control" value="{{ $declaration->details }}" required>
            </div>

            <!-- Container for line declarations -->
            <div id="line-declarations"></div>

            <!-- Add button to trigger adding new line declarations -->
            <button type="button" id="add-line" class="btn btn-secondary">Add Line Declaration</button>

            

            <button type="submit" class="btn btn-success">Update Declaration</button>
        </form>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <p>Copyright &copy; 2020 Consulting Hall.</p>
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
                        <input type="text" class="form-control" name="ligne_declarations[${lineIndex}][typedeclaration]" required>
                    </div>
                    <div class="form-group">
                        <label for="documents">Documents</label>
                        <input type="file" class="form-control" name="ligne_declarations[${lineIndex}][documents]">
                    </div>
                    <div class="form-group">
                        <label for="datepiece">Date Piece</label>
                        <input type="date" class="form-control" name="ligne_declarations[${lineIndex}][datepiece]" required>
                    </div>
                    <div class="form-group">
                        <label for="libelle">Libelle</label>
                        <input type="text" class="form-control" name="ligne_declarations[${lineIndex}][libelle]" required>
                    </div>
                    <button type="button" class="btn btn-danger remove-line">Remove</button>
                </div>`;
            
            // Append the new line declaration to the container
            document.getElementById('line-declarations').insertAdjacentHTML('beforeend', newLine);
            lineIndex++;
        });

        // Event listener to remove a line declaration
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-line')) {
                e.target.closest('.line-declaration').remove();
            }
        });
    </script>
</body>

</html>
