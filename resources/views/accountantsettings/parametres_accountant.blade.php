<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title>Parametres De Declarations - Accounting Hall</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <!-- Additional Inline Styles -->
    <style>
        .content-wrapper {
            background: #f8f9fa;
            min-height: 100vh;
            padding: 40px 0;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #fff;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }
        .card-header {
            background: linear-gradient(90deg,rgb(0, 0, 0),rgb(129, 129, 129));
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 15px 20px;
        }
        .card-title {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }
        .card-body {
            padding: 25px;
        }
        .list-group-item {
            border: none;
            padding: 10px 0;
            font-size: 1.1rem;
        }
        .table {
            margin-top: 15px;
            border-radius: 10px;
            overflow: hidden;
        }
        .table thead th {
            background: #e9ecef;
            color: #495057;
            font-weight: 600;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background: #f8f9fa;
        }
        .btn-update {
            background: #28a745;
            border: none;
            padding: 8px 20px;
            font-size: 1rem;
            border-radius: 25px;
            transition: background 0.3s ease;
        }
        .btn-update:hover {
            background: #218838;
        }
        .btn-success {
            border-radius: 25px;
            padding: 10px 25px;
            font-weight: 500;
            transition: transform 0.3s ease;
        }
        .btn-success:hover {
            transform: scale(1.05);
        }
        .create-new-button {
            position: fixed;
            bottom: 30px;
            right: 20px;
            z-index: 1000;
            padding: 10px 20px;
            font-size: 16px;
            transition: transform 0.3s ease;
        }
        .create-new-button:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

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
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('login'))
                                @auth
                                    <li class="nav-item">
                                        <a href="create_client" class="nav-link btn btn-success create-new-button">Add New Client</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="show_client">My Clients</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <x-app-layout></x-app-layout>
                                    </li>
                                @else
                                    <li><a class="nav-link" href="{{ route('login') }}">Log in</a></li>
                                    @if (Route::has('register'))
                                        <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                                    @endif
                                @endauth
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="banner header-text"></div>

    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                        <div class="main-panel">
                            <div class="content-wrapper">
                                <h2 align="center" class="mb-4">Parametres De Declarations</h2>
                                <div class="row">
                                    @forelse($parametresdeclarations as $parametre)
                                    <div class="col-lg-6 col-md-6 col-sm-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 align="center" class="card-title">Declaration   {{ $parametre->id_parametres_declarations }}</h4>
                                            </div>
                                            <div class="card-body">
                                                <h5>Parametres de Declaration</h5>
                                                <ul class="list-group list-group-flush mb-3">
                                                    <li class="list-group-item">
                                                        <strong>ID:</strong> {{ $parametre->id_parametres_declarations }}
                                                    </li>
                                                    <li class="list-group-item">
                                                        <strong>Type:</strong> {{ $parametre->declaration_type }}
                                                    </li>
                                                    <li class="list-group-item">
                                                        <strong>Comptable:</strong> {{ $parametre->id_accountant ?? 'None' }}
                                                    </li>
                                                </ul>
                                                <h5>Lignes de Declaration</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead align="center">
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Libellée</th>
                                                                <th>Compte</th>
                                                                <th>Type</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody align="center">
                                                            @forelse($parametre->lignes as $ligne)
                                                            <tr>
                                                                <td>{{ $ligne->id_lignes_parametres_declarations }}</td>
                                                                <td>{{ $ligne->libellée }}</td>
                                                                <td>{{ $ligne->compte_comptable ?? 'None' }}</td>
                                                                <td>{{ $ligne->debit_credit }}</td>
                                                            </tr>
                                                            @empty
                                                            <tr>
                                                                <td colspan="4" class="text-center">No lines found for this declaration.</td>
                                                            </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="text-center mt-3">
                                                <a href="{{ route('update.declaration', $parametre->id_parametres_declarations) }}" class="btn btn-update text-white">Update</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="text-center">No parameters found.</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
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
                            <p>Copyright © 2024 Accounting Hall.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>