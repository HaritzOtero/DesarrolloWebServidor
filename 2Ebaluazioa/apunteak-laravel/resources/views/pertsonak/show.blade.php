@extends('app')


@section('content')


<div>
    <form action="{{ route('pertsona.update', $pertsona->id) }}" method="POST">
    @method('PATCH')
    @csrf


    @if (session('success'))
      <h6 class="alert alert-success">{{session('success')}}</h6>
    @endif


    @error('izena')
    <h6 class="alert alert-success">{{$message}}</h6>
    @enderror
    <div class="mb-3">
      <label for="izena" class="form-label">Izena:</label>
      <input type="text" class="form-control" name="izena" value="{{$pertsona->izena}}">


      <label for="abizena" class="form-label">Abizena:</label>
    <input type="text" class="form-control" name="abizena" value="{{$pertsona->abizena}}"> <!-- Cambiar Abizena a abizena -->



    <label for="lana" class="form-label">Lana:</label>
<select name="lana_id" class="form-control">
    @foreach ($lanak as $lana)
        <option value="{{ $lana->id }}" @if ($lana->id == $pertsona->lana_id) selected @endif>{{ $lana->izena }}</option>
    @endforeach
</select>
    
      
    </div>
    <button type="submit" class="btn btn-primary">Eguneratu</button>
  </form>
</div>
@endsection
