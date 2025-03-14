<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Parametres Declarations </title>
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
                                                        <h2 align="center" class="card-title">Parametres Declarations</h2>
                                                        <div class="container">
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-6">
                                                                <div class="card mt-5">
                                                                    <div class="card-header text-center">
                                                                        <h4>Créer une Déclaration</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <form action="#" method="POST">
                                                                            @csrf <!-- Laravel CSRF protection -->

                                                                            <!-- Type de déclaration -->
                                                                            <div class="form-group mb-3">
                                                                                <label for="declaration_type">Type de déclaration:</label>
                                                                                <select name="declaration_type" id="declaration_type" class="form-control @error('declaration_type') is-invalid @enderror">
                                                                                    <option value="">Sélectionnez un type</option>
                                                                                    <option value="paies">Paies</option>
                                                                                    <option value="Achats">Achats</option>
                                                                                    <option value="Ventes">Ventes</option>
                                                                                    <option value="Salaires">Salaires</option>
                                                                                    <option value="Autres">Autres</option>
                                                                                </select>
                                                                                @error('declaration_type')
                                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>

                                                                            <!-- Comptable Associé -->
                                                                            <div class="form-group mb-3">
                                                                                <label for="id_accountant">Comptable Associé:</label>
                                                                                <select name="id_accountant" id="id_accountant" class="form-control @error('id_accountant') is-invalid @enderror">
                                                                                    <option value="" selected>Aucun</option>
                                                                                    <!-- Add dynamic options here if needed -->
                                                                                </select>
                                                                                @error('id_accountant')
                                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>

                                                                            <!-- Submit Button -->
                                                                            <div class="form-group text-center">
                                                                                <button type="submit" class="btn btn-success">Soumettre</button>
                                                                            </div>
                                                                        </form>
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
