<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Parametres Par Defauts </title>
    <!-- style  -->
    @include('admin.css')
</head>
<body>
    <div class="container-scroller">
        <!-- side bar -->
        @include('admin.sidebar')
        <div class="container-fluid page-body-wrapper">
            <!-- navbar -->
            @include('admin.navbar')
            <!-- body -->
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card-body py-0 px-0 px-sm-3">
                            <div class="row align-items-center">
                                <div class="main-panel">
                                    <div class="content-wrapper">
                                        <div class="row">
                                            <div class="col-lg-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h2 align="center" class="card-title">Parametres Par Defauts</h2>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <h2 align="center" class="card-title"> Parametres de Declarations</h2>
                                                                <thead align="center">
                                                                    <tr >
                                                                        <th>ID</th>
                                                                        <th>Type de declaration</th>
                                                                        <th>Comptable Associé</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody align="center">
                                                                    @foreach($parametresdeclarations as $parametre)
                                                                        <tr>
                                                                            <td>{{ $parametre->id_parametres_declarations}}</td>
                                                                            <td>{{ $parametre->declaration_type }}</td>
                                                                            <td>{{ $parametre->id_accountant ?? 'None' }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    <tr><a href="{{ route('parametres_declaration') }}" class="nav-link btn btn-success create-new-button">Ajouter nouvelles parametres par defaut </a></tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                            <h2 align="center" class="card-title"> Parametres de Linge De Declaration</h2>
                                                                <thead align="center">
                                                                    <tr >
                                                                        <th>ID</th>
                                                                        <th>Libellée</th>
                                                                        <th>Compte Comptable Associé</th>
                                                                        <th>Type ligne declaration</th>
                                                                        <th>Declaration Associé</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody align="center">
                                                                    @foreach($lignes_parametres_declarations as $parametre)
                                                                        <tr>
                                                                            <td>{{ $parametre->id_lignes_parametres_declarations}}</td>
                                                                            <td>{{ $parametre->libellée }}</td>
                                                                            <td>{{ $parametre->compte_comptable ?? 'None' }}</td>
                                                                            <td>{{ $parametre->debit_credit}}</td>
                                                                            <td>{{ $parametre->idparametresdeclarations}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    <tr>
                                                                        <a href="{{ route('parametres_lignes_declarations') }}" class="nav-link btn btn-success create-new-button">Ajouter Nouvelle parametres lignes </a>
                                                                    </tr>
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
                        </div>
                    </div>
                </div>
                <!-- footer -->
                @include('admin.footer')
            </div>
        </div>
        <!-- script -->
        @include('admin.js')
    </body>
</html>
