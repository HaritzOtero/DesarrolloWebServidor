@extends('app')
@section('content')
<form action="{{ route('pertsona.update', [$pertsona->id]) }}" method="POST">
    @method('PATCH')
    @csrf

    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif

    @error('izena')
        <h6 class="alert alert-danger">{{ $message }}</h6>
    @enderror

    @error('abizena')
        <h6 class="alert alert-danger">{{ $message }}</h6>
    @enderror

    <div class="mb-3">
        <label for="izena" class="form-label">Pertsonaren izena</label>
        <input type="text" class="form-control" name="izena" value="{{ $pertsona->izena }}">
        
        <label for="abizena" class="form-label">Pertsonaren abizena</label>
        <input type="text" class="form-control" name="abizena" value="{{ $pertsona->abizena }}">
    </div>

    <button type="submit" class="btn btn-primary">Pertsona eguneratu</button>
</form>


<div >
    @if ($pertsona->atazak->count() > 0)
        @foreach ($pertsona->atazak as $ataza )
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a href="{{ route('atazak-edit', ['id' => $ataza->id]) }}">{{ $ataza->izena }}</a>
                </div>


                <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{ route('atazak-destroy', [$ataza->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">Ezabatu</button>
                    </form>
                </div>
            </div>
        @endforeach    
    @else
        Ez dago kategoria honetarako atasarik.
    @endif
   
    </div>
    </div>
</div>
@endsection
