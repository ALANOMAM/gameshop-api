@extends('layouts.app')

@section('content')

   <!--pezzo ggiunto start-->

   <div class="container py-5">

    <div class="row">

        <div class="mt-2 mb-4">
            <a href="{{route('admin.games.index')}}" class="mb-3 return-button"><i class="fa-solid fa-arrow-left"></i> Torna indietro</a>
        </div>

        <h1 class="mb-4">Edit the game </h1>

        <div class="col-12 col-md-6 col-lg-7 py-4">

            <form action="{{ route('admin.games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                {{-- NOME DEL GIOCO --}}
        
                <div class="form-group mt-2">
                    <label for="name">Game name </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $game->name) }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
    
                {{-- PREZZO DEL GIOCO --}}
        
                <div class="form-group mt-2">
                    <label for="price">Game price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $game->price) }}" min="0" max="999.99" step="1">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
    
                {{-- IMMAGINE DEL PIATTO --}}
        
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
    
                {{-- DESCRIZIONE DEL GIOCO --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Game description</label>
                    <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', $game->description) }}</textarea>
                </div>
    
               
                {{-- DISCOUNT DEL GIOCO --}}
                <div class="form-group mt-2">
                    <label for="discount">Game discount </label>
                    <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount"  value="{{ old('discount', $game->discount) }}"  min="0" max="100" step="1">
                </div>

                <div class="d-flex justify-content-start align-items-center gap-3">
    
                    {{-- BOTTONE SUBMIT --}}
    
                    <button type="submit" class="btn button-primary">Save changes</button>
    
                    {{-- VISIBILITA' GIOCO --}}
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" value="1" id="visible" name="visible" {{ old('visible', $game->visible) ? 'checked' : '' }}>
                        <label class="form-check-label" for="visible">Hide game</label>
                    </div>

                     {{-- CATEGORIA SPECIALE GIOCO --}}
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" value="1" id="special_category" name="special_category" {{ old('special_category', $game->special_category) ? 'checked' : '' }}>
                        <label class="form-check-label" for="special_category">Put in special category</label>
                    </div>
    
    
                </div>
        
            </form>

        </div>

        <div class="col-md-6 col-lg-5 d-none d-md-block right-part py-4">

            <div class="img-quote">
                <img src="{{Vite::asset('resources/img/customer_care.png')}}" alt="">
                <h3 class="pt-4 text-center">
                    TEXT!
                </h3>
            </div>

        </div>


    </div>

</div>



   <!--pezzo aggiunto end-->
    
@endsection