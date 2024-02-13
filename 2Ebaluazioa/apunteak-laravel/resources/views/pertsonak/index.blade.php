@extends('app')


@section('content')


Pertsonak
<form action="{{route('pertsona.store')}}" method="POST">
@csrf


@if (session('success'))
  <h6 class="alert alert-success">{{session('success')}}</h6>
@endif


@error('izena')
<h6 class="alert alert-success">{{$message}}</h6>
@enderror


  <div class="mb-3">
    <label for="izena" class="form-label">Izena:</label>
    <input type="text" class="form-control" name="izena">


    <label for="abizena" class="form-label">Abizena:</label>
    <input type="text" class="form-control" name="abizena">


    <label for="lana" class="form-label">Lana:</label>
<select name="lana_id" class="form-control">
  @foreach ($lanak as $lana)
    <option value="{{ $lana->id }}">{{ $lana->izena }}</option>
  @endforeach
</select>

  </div>
  <button type="submit" class="btn btn-primary">Gehitu</button>
</form>


<div>
    @foreach ($pertsonak as $pertsona)
    <div class="row py-1">
        <div class="col-md-9 d-flex align-items-center">
            <p class="info"><a href="{{ route('pertsona.show', ['id' => $pertsona->id]) }}">{{ $pertsona->izena }}</a><p>
        </div>
        
        <div class="col-md-3 d-flex justify-content-end">
            <form action="{{ route('pertsona.destroy', [$pertsona->id]) }}" method="POST">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger btn-sm">Ezabatu</button>
            </form>
        </div>
    </div>
    @endforeach
</div>





@endsection
