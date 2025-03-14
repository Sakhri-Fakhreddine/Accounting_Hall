
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
                                                        <h2 align="center" class="card-title">Details De Demande</h2>
                                                        <br>
                                                        <h2 align="center">La Demande n° : {{ $demande->iddemande }}</h2>
                                                        <br>
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
                                                                        <tr>
                                                                            <td>{{ $demande->iddemande}}</td>
                                                                            <td>
                                                                                @php
                                                                                    // Decode the details_comptable JSON
                                                                                    $details = json_decode($demande->details_comptable, true);
                                                                                    // Extract accountant's email (adjust the array key according to your data structure)
                                                                                    $accountantEmail = $details['email'] ?? $details['accountant_email'] ?? '';
                                                                                @endphp

                                                                                @foreach($details as $key => $value)
                                                                                    <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }} <br>
                                                                                @endforeach
                                                                                <br>
                                                                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#emailModal-{{ $demande->iddemande }}">Mail</a>
                                                                                
                                                                                <!-- Modal with unique ID -->
                                                                                <div class="modal fade" id="emailModal-{{ $demande->iddemande }}" tabindex="-1">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title" align="center">Send Email to Accountant</h5>
                                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                                            </div>
                                                                                            <form action="{{ route('send.email') }}" method="POST">
                                                                                                @csrf
                                                                                                <!-- Hidden input for accountant's email -->
                                                                                                <input type="hidden" name="recipient_email" value="{{ $accountantEmail }}">
                                                                                                <div class="modal-body">
                                                                                                    <!-- To Field -->
                                                                                                    <div class="mb-4">
                                                                                                        <label class="form-label fw-bold text-white mb-2">
                                                                                                            <i class="fas fa-envelope me-2"></i>Recipient
                                                                                                        </label>
                                                                                                        <input type="text" 
                                                                                                            class="form-control bg-secondary text-white fs-6 py-2" 
                                                                                                            value="{{ $accountantEmail }}" 
                                                                                                            disabled
                                                                                                            style="border: 1px solid #495057; border-radius: 8px; background-color: #6c757d !important; color: #fff !important;">
                                                                                                    </div>

                                                                                                    <!-- Subject Field -->
                                                                                                    <div class="mb-4">
                                                                                                        <label for="subject" class="form-label fw-bold text-white mb-2">
                                                                                                            <i class="fas fa-tag me-2"></i>Subject
                                                                                                        </label>
                                                                                                        <input type="text" 
                                                                                                            class="form-control bg-secondary text-white fs-6 py-2" 
                                                                                                            id="subject" 
                                                                                                            name="subject" 
                                                                                                            required
                                                                                                            placeholder="Enter email subject"
                                                                                                            style="border-radius: 8px; border: 2px solid #495057; background-color: #6c757d !important; color: #fff !important;">
                                                                                                    </div>

                                                                                                    <!-- Message Field -->
                                                                                                    <div class="mb-4">
                                                                                                        <label for="message" class="form-label fw-bold text-white mb-2">
                                                                                                            <i class="fas fa-comment me-2"></i>Message
                                                                                                        </label>
                                                                                                        <textarea class="form-control bg-secondary text-white fs-6" 
                                                                                                                id="message" 
                                                                                                                name="message" 
                                                                                                                rows="6" 
                                                                                                                required
                                                                                                                placeholder="Write your message here..."
                                                                                                                style="border-radius: 10px; border: 2px solid #495057; min-height: 150px; background-color: #6c757d !important; color: #fff !important;"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Close</button>
                                                                                                <button type="submit" class="btn btn-success px-4">
                                                                                                    <i class="fas fa-paper-plane me-2"></i>Send
                                                                                                </button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>{{ $demande->typeabonnement }}</td>
                                                                            <td>{{ $demande->idabonnementglobals ?? 'None' }}</td>
                                                                            <td>{{$demande->etat_demande}}</td>
                                                                            <td>{{ $demande->commentaire ?? 'None'}}</td>
                                                                            <td>
                                                                                @if ($demande->etat_demande==="en cours de traitements")
                                                                                <!-- Accept Button -->
                                                                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#acceptModal-{{ $demande->iddemande }}">Accept</a>

                                                                                <!-- Modal -->
                                                                                <div class="modal fade" id="acceptModal-{{ $demande->iddemande }}" tabindex="-1">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                    <form action="{{ route('demandes.accept', $demande) }}" method="POST">
                                                                                        @csrf
                                                                                        @method('PUT')

                                                                                        <div class="modal-header">
                                                                                        <h5 class="modal-title">Accept Demande #{{ $demande->iddemande }}</h5>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                                        </div>

                                                                                        <div class="modal-body">
                                                                                        <!-- Abonnement Fields -->
                                                                                        <div class="mb-3">
                                                                                            <label class="form-label">Type Abonnement</label>
                                                                                            <input type="text" class="form-control" 
                                                                                                value="{{ $demande->typeabonnement }}" 
                                                                                                readonly>
                                                                                        </div>

                                                                                        <div class="mb-3">
                                                                                            <label class="form-label">Montant</label>
                                                                                            <input type="number" step="0.01" 
                                                                                                class="form-control" 
                                                                                                name="montant" 
                                                                                                required>
                                                                                        </div>

                                                                                        <!-- Demande Comment -->
                                                                                        <div class="mb-3">
                                                                                            <label class="form-label">Comment</label>
                                                                                            <textarea class="form-control" 
                                                                                                    name="comment"
                                                                                                    rows="3">{{ old('comment', $demande->comment) }}</textarea>
                                                                                        </div>

                                                                                        <!-- Hidden Fields -->
                                                                                        <input type="hidden" name="demande_id" value="{{ $demande->iddemande }}">
                                                                                        </div>

                                                                                        <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                        <button type="submit" class="btn btn-primary">
                                                                                            <i class="fas fa-check-circle me-2"></i>Create Abonnement
                                                                                        </button>
                                                                                        </div>
                                                                                    </form>
                                                                                    </div>
                                                                                </div>
                                                                                </div>
                                                                                <a href="#" class="btn btn-danger">Refuse</a>
                                                                                
                                                                                @elseif($demande->etat_demande==="acceptée")
                                                                                <p>Demande a ete acceptée le 
                                                                                <br>{{$demande->updated_at}}</p>
                                                                                @else
                                                                                <p>Demande a ete refusée le 
                                                                                <br>{{$demande->updated_at}}</p>
                                                                                @endif
                                                                            </td>
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
    .modal-header {
        background: #e5e7eb;
        border-bottom: 2px solid #6c757d;
    }
    .modal-title {
        color: #2c3e50;
        font-weight: 600;
        font-size: 1.4rem;
    }
    .form-label {
        font-size: 0.95rem;
        letter-spacing: 0.5px;
    }
    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    .btn-close {
        transform: scale(1.2);
    }
    ::placeholder {
        color: #dee2e6 !important;
        opacity: 0.8;
    }
    :-ms-input-placeholder {
        color: #dee2e6 !important;
    }
    ::-ms-input-placeholder {
        color: #dee2e6 !important;
    }
</style>

    </body>
</html>


