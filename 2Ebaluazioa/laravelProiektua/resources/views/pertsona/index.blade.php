@extends('app')
@section('content')
<form action="/pertsona" method="POST">
    @csrf

    @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>
    @endif

    @error('izena')
        <h6 class="alert alert-danger">{{$message}}</h6>
    @enderror

    @error('abizena')
        <h6 class="alert alert-danger">{{$message}}</h6>
    @enderror

  <div class="mb-3">
    <label for="izena" class="form-label">Pertsonaren izena</label>
    <input type="text" class="form-control" name = "izena">
    <label for="izena" class="form-label">Pertsonaren abizena</label>
    <input type="text" class="form-control" name = "abizena">
  </div>
  <button type="submit" class="btn btn-primary">Sortu pertsona</button>
</form>

<br><br><br>

<div>
    @foreach ($pertsonak as $pertsona)
        <div class="row py-1">
            <div class="col-md-9 d-flex align-items-center">
            <a href="{{ route('pertsona.show', $pertsona) }}">{{ $pertsona->izena }}: </a>
            <a href="{{ route('pertsona.show', $pertsona) }}">{{ $pertsona->abizena }}</a>

            </div>

            <div class="col-md-93 d-flex justify-content-end">
                <form action ="{{ route('pertsona.destroy', [$pertsona->id]) }}" method = "POST"> 
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm">Ezabatu</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection