@extends('app')
@section('content')
<form action="{{ route('atazak-update', [$ataza->id]) }}" method="POST">
    @method('PATCH')
    @csrf

    @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>
    @endif

    @error('izena')
        <h6 class="alert alert-danger">{{$message}}</h6>
    @enderror

  <div class="mb-3">
    <label for="izena" class="form-label">Atazaren izena</label>
    <input type="text" class="form-control" name = "izena" value="{{$ataza -> izena}}">
    <label for="izena" class="form-label">Atazaren data</label>
    <input type="date" class="form-control" name = "data" value="{{$ataza -> data}}">
    <label for="pertsona_id" class="form-label">Atazaren pertsona</label>
            <select name="pertsona_id" class="form-select">
                @foreach ($pertsonak as $pertsona)
                    <option value="{{$pertsona->id}}">{{$pertsona->izena}}</option>
                @endforeach
            </select>
  </div>
  <button type="submit" class="btn btn-primary">Ataza eguneratu</button>
</form>

@endsection
