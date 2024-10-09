@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Line Declaration #{{ $ligne->id }}</h2>
    <form action="{{ route('lignedeclarations.update', $ligne->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="typedeclaration">Type</label>
            <input type="text" name="typedeclaration" class="form-control" value="{{ $ligne->typedeclaration }}" required>
        </div>
        <div class="form-group">
            <label for="datepiece">Date</label>
            <input type="date" name="datepiece" class="form-control" value="{{ $ligne->datepiece }}" required>
        </div>
        <div class="form-group">
            <label for="valeur1">Value 1</label>
            <input type="text" name="valeur1" class="form-control" value="{{ $ligne->valeur1 }}" required>
        </div>
        <div class="form-group">
            <label for="valeur2">Value 2</label>
            <input type="text" name="valeur2" class="form-control" value="{{ $ligne->valeur2 }}">
        </div>
        <button type="submit" class="btn btn-success">Update Line Declaration</button>
    </form>
</div>
@endsection
