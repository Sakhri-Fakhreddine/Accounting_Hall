<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Demandes En Cours De Traitement  </title>
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
                                                        <h2 align="center" class="card-title">Demandes En Cours De Traitement </h2>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <thead align="center">
                                                                    <tr >
                                                                        <th>ID</th>
                                                                        <th>Comptable Associé</th>
                                                                        <th>Type d'Abonnement choisis</th>   
                                                                        <th>Abonnement Associé</th>
                                                                        <th>Etat De Demande</th>
                                                                        <th>Commentaires</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody align="center">
                                                                    @foreach($pendingdemandes as $demande)
                                                                        <tr>
                                                                            <td>{{ $demande->iddemande}}</td>
                                                                            <td>{{ json_decode($demande->details_comptable)->Nomprenom }}</td>
                                                                            <td>{{ $demande->typeabonnement }}</td>
                                                                            <td>{{ $demande->idabonnementglobals ?? 'None' }}</td>
                                                                            <td>{{$demande->etat_demande}}</td>
                                                                            <td>{{ $demande->commentaire ?? 'None'}}</td>
                                                                            <td>
                                                                            <a href="{{ route('detailsdemande', $demande->iddemande) }}" class="nav-link btn btn-success create-new-button">View Demande info </a>
                                                                            </td>
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
