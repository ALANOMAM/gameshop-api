@extends('layouts.app')

@section('content')

       <!--pezzo ggiunto start-->

   <div class="container py-5">

    <div class="row">

        <div class="mt-2 mb-4">
            <a href="{{route('admin.sponsors.index')}}" class="mb-3 return-button"><i class="fa-solid fa-arrow-left"></i> Torna indietro</a>
        </div>
 
        <h1 class="mb-4">Edit the sponsor </h1>

        <div class="col-12 col-md-6 col-lg-7 py-4">

            <form action="{{ route('admin.sponsors.update', $sponsor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                {{-- NOME DELLO SPONSOR --}}
        
                <div class="form-group mt-2">
                    <label for="name">Sponsor  name </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $sponsor->name) }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
    
                {{-- SOLDI DELLO SPONSOR--}}
        
                <div class="form-group mt-2">
                    <label for="fund">Sponsor fund </label>
                    <input type="number" class="form-control @error('fund') is-invalid @enderror" id="fund" name="fund" value="{{ old('fund', $sponsor->fund) }}" min="0" max="999.99" step="1">
                    @error('fund')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
    
                 {{-- IMMAGINE DELLO SPONSOR --}}
        
               {{--<div class="mb-4 row d-flex flex-column mt-2">
                    <label for="dish_image">Inserisci un'immagine</label>
                    <div class="col-md-6">
                        <input id="dish_image" type="file" class="form-control @error('dish_image') is-invalid @enderror" name="dish_image" accept=".jpg,.bmp,.png">
                        @error('dish_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>--}}
              
                
    
              
                <div class="d-flex justify-content-start align-items-center gap-3">
    
                    {{-- BOTTONE SUBMIT --}}
    
                    <button type="submit" class="btn button-primary">Salva</button>
    
                </div>
        
            </form>

        </div>

    </div>

</div>

   <!--pezzo aggiunto end-->
    
@endsection