@extends('app')
@section('content')
<form action="/atazak" method="POST">
    @csrf

    @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>
    @endif

    @error('izena')
        <h6 class="alert alert-danger">{{$message}}</h6>
    @enderror

    @error('data')
        <h6 class="alert alert-danger">{{$message}}</h6>
    @enderror

  <div class="mb-3">
    <label for="izena" class="form-label">Atazaren izena</label>
    <input type="text" class="form-control" name = "izena">
    <input type="date" class="form-control" name = "data">

    <label for="pertsona_id" class="form-label">Atazaren pertsona</label>
            <select name="pertsona_id" class="form-select">
                @foreach ($pertsonak as $pertsona)
                    <option value="{{$pertsona->id}}">{{$pertsona->izena}}</option>
                @endforeach
            </select>

  </div>
  <button type="submit" class="btn btn-primary">Sortu ataza</button>
</form>

<br><br><br>

<div>
    @foreach ($atazak as $ataza)
        <div class="row py-1">
            <div class="col-md-9 d-flex align-items-center">
                <a href="{{ route('atazak-edit', ['id' => $ataza->id]) }}">
                    {{ $ataza->izena }}:
                </a>
                <a href="{{ route('atazak-edit', ['id' => $ataza->id]) }}">
                    {{ $ataza->data }}:
                </a>
                <a href="{{ route('atazak-edit', ['id' => $ataza->id]) }}">
                    
                    {{ $ataza->pertsona->izena }}

                </a>
            </div>

            <div class="col-md-3 d-flex justify-content-end">
                <form action="{{ route('atazak-destroy', ['id' => $ataza->id]) }}" method="POST"> 
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm">Ezabatu</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection