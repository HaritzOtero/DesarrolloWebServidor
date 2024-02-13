@extends('app')

@section('content')

<div class="container w-25 border p-4 mt-4">
    <form action="{{ route('lanak.update', ['id' => $lana->id]) }}" method="POST">
        @method('PATCH')
        @csrf
      
        @if (session('success'))
          <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
      
        @error('izena')
        <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror
      
        <div class="mb-3">
            <label for="izena" class="form-label">Lanaren izena: </label>
            <input type="text" class="form-control" name="izena" value="{{ $lana->izena }}">
            <label for="pertsonaKop" class="form-label">Pertsona kopuru maximoa: </label>
            <input type="number" class="form-control" name="pertsonaKop" value="{{ $lana->pertsonaKop }}">
        </div>
        <button type="submit" class="btn btn-primary">Lana eguneratu</button>
    </form>
</div>

@endsection
