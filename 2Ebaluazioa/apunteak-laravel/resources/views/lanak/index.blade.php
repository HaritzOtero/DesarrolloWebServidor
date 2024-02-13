@extends('app')

@section('content')

<form action="/lanak" method="POST">
  @csrf

  @if (session('success'))
    <h6 class="alert alert-success">{{ session('success') }}</h6>
  @endif

  @error('izena')
    <h6 class="alert alert-danger">{{ $message }}</h6>
  @enderror

  <div class="mb-3">
    <label for="izena">Lanaren izena: </label>
    <input type="text" class="form-control" name="izena">
    <label for="pertsonaKop">Pertsona kopuru maximoa: </label>
    <input type="text" class="form-control" name="pertsonaKop">
  </div>
  <button type="submit" class="btn btn-primary">Sortu lana</button>
</form>

<div>
  @foreach ($lanak as $lana)
    <div class="row py-1">
      <div class="col-md-3 d-flex align-items-center">
        <a href="{{ route('lanak.update', ['id' => $lana->id]) }}">{{ $lana->izena }}</a>
        <a href="{{ route('lanak.update', ['id' => $lana->id]) }}">{{ $lana->pertsonaKop }}</a>
      </div>

      <div class="col-md-3 d-flex justify-content-end">
        <form action="{{ route('lanak.destroy', ['id' => $lana->id]) }}" method="POST">
          @method('DELETE')
          @csrf
          <button class="btn btn-danger btn-sm">Ezabatu</button>
        </form>
      </div>
    </div>
  @endforeach
</div>
@endsection
