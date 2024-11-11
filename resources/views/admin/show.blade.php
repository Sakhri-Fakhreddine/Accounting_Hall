
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
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
                                                        <h2 align="center" class="card-title">Accountant details</h2>
                                                        <br>
                                                        <div class="table-responsive">
                                                        <h2 align="center">{{ $accountant->Nomprenom }}</h2>
                                                        
                                                        <br>
                                                            <table class="table table-striped">
                                                                <!-- <thead>
                                                                    <tr>
                                                                        <th align="center">{{ $accountant->Nomprenom }}</th>
                                                                    </tr>
                                                                </thead> -->
                                                                <tbody>
                                                                <tr>
                                                        <th>Commercial Name</th>
                                                        <td>{{ $accountant->nom_commercial }}</td>
                                                        </tr>
                                                        <tr>
                                                        <th>Full Name</th>
                                                        <td>{{ $accountant->Nomprenom }}</td>
                                                        </tr>
                                                        <tr>
                                                        <th>Commercial Registry</th>
                                                        <td>{{ $accountant->registre_de_commerce }}</td>
                                                        </tr>
                                                        <tr>
                                                        <th>TVA Code</th>
                                                        <td>{{ $accountant->code_tva }}</td>
                                                        </tr>
                                                        <tr>
                                                        <th>Phone</th>
                                                        <td>{{ $accountant->phone }}</td>
                                                        </tr>
                                                        <tr>
                                                        <th>Email</th>
                                                        <td>{{ $accountant->email }}</td>
                                                        </tr>
                                                        <tr>
                                                        <th>Role</th>
                                                        <td>Comptable n°{{ $accountant->idAccountant }}</td>
                                                        </tr>
                                                       
                                                                </tbody>
                                                            </table>
                                                            <a align="center" href="{{ url()->previous() }}" class="nav-link btn btn-success create-new-button1">Back</a>
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
        <style>
    .create-new-button1 {
        position: fixed;    /* Fixes the position of the button */
        bottom: 30px;      /* 20px from the bottom */
        right: 20px;       /* 20px from the right */
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


