@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Line Declaration to Declaration #{{ $declaration->id }}</h2>
    <form action="{{ route('lignedeclarations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="declaration_id" value="{{ $declaration->id }}">
        <div class="form-group">
            <label for="typedeclaration">Type</label>
            <input type="text" name="typedeclaration" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="datepiece">Date</label>
            <input type="date" name="datepiece" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="valeur1">Value 1</label>
            <input type="text" name="valeur1" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="valeur2">Value 2</label>
            <input type="text" name="valeur2" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Save Line Declaration</button>
    </form>
</div>
@endsection
