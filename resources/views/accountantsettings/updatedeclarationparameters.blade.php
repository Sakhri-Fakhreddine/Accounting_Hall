<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title>Update Declaration - Accounting Hall</title>
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="/assets/css/owl.css">
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
            background: linear-gradient(90deg, rgb(0, 0, 0), rgb(129, 129, 129));
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
        .line-row {
            margin-bottom: 15px;
            padding: 15px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .btn-danger {
            border-radius: 25px;
            padding: 8px 20px;
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
        <div class="container">
            <h2 class="text-center mb-4">Update Declaration #{{ $declaration->id_parametres_declarations }}</h2>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Declaration Settings</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('save.update.declaration', $declaration->id_parametres_declarations) }}" method="POST">
                        @csrf
                        @method('POST')

                        <h5>Parametres de Declaration</h5>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item">
                                <strong>ID:</strong> {{ $declaration->id_parametres_declarations }}
                            </li>
                            <li class="list-group-item">
                                <strong>Type:</strong>
                                <input type="text" class="form-control" name="declaration_type" value="{{ $declaration->declaration_type }}" readonly>
                            </li>
                            <li class="list-group-item">
                                <strong>Comptable:</strong> {{ $declaration->id_accountant ?? 'None' }}
                            </li>
                        </ul>

                        <h5 class="mt-4">Declaration Lines</h5>
                        <div id="lines-container">
                            @forelse($declaration->lignes as $ligne)
                            <div class="line-row row" data-id="{{ $ligne->id_lignes_parametres_declarations }}">
                                <input type="hidden" name="lines[{{ $loop->index }}][id]" value="{{ $ligne->id_lignes_parametres_declarations }}">
                                <div class="col-md-3">
                                    <input type="text" name="lines[{{ $loop->index }}][libellée]" class="form-control" value="{{ $ligne->libellée }}" placeholder="Libellée">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="lines[{{ $loop->index }}][compte_comptable]" class="form-control" value="{{ $ligne->compte_comptable }}" placeholder="Compte Comptable">
                                </div>
                                <div class="col-md-3">
                                    <select name="lines[{{ $loop->index }}][debit_credit]" class="form-control">
                                        <option value="debit" {{ $ligne->debit_credit == 'debit' ? 'selected' : '' }}>Debit</option>
                                        <option value="credit" {{ $ligne->debit_credit == 'credit' ? 'selected' : '' }}>Credit</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-danger remove-line">Delete</button>
                                </div>
                            </div>
                            @empty
                            <p>No lines currently exist.</p>
                            @endforelse
                        </div>

                        <div class="text-center mt-3">
                            
                            <button type="button" id="add-line" class="btn btn-info btn-rounded btn-fw ">Add New Line</button>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-update text-white">Save Changes</button>
                        </div>
                    </form>
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

    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/custom.js"></script>
    <script>
        let lineCount = {{ count($declaration->lignes) }};

        $('#add-line').click(function() {
            const newLine = `
                <div class="line-row row" data-id="new-${lineCount}">
                    <input type="hidden" name="lines[${lineCount}][id]" value="">
                    <div class="col-md-3">
                        <input type="text" name="lines[${lineCount}][libellée]" class="form-control" placeholder="Libellée">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="lines[${lineCount}][compte_comptable]" class="form-control" placeholder="Compte Comptable">
                    </div>
                    <div class="col-md-3">
                        <select name="lines[${lineCount}][debit_credit]" class="form-control">
                            <option value="debit">Debit</option>
                            <option value="credit">Credit</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-danger remove-line">Delete</button>
                    </div>
                </div>`;
            $('#lines-container').append(newLine);
            lineCount++;
        });

        $(document).on('click', '.remove-line', function() {
            $(this).closest('.line-row').remove();
        });
    </script>
</body>
</html>