@extends('layouts.app')

@section('content')

  <!--pezzo aggiunto start-->
  

  <div class="container py-5">

    <div class="mt-2 mb-4">
        <a href="{{route('admin.games.index')}}" class="mb-3 return-button"><i class="fa-solid fa-arrow-left"></i> Torna indietro</a>
    </div>

    <h1 class="mb-4">Create a new game </h1>

    <div class="row">

        <div class="col-12 col-md-6 col-lg-7 py-4">

            <form action="{{ route('admin.games.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
        
                {{-- NOME DEL GIOCO --}}
        
                <div class="form-group mt-2">
                    <label for="name">Game name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
        
                {{-- PREZZO DEL GIOCO --}}
        
                <div class="form-group mt-2">
                    <label for="price">Game price </label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}"  min="0" max="999.99" step="1">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
        
                {{-- IMMAGINE DEL GIOCO --}}
        
                {{-- <div class="mb-4 d-flex flex-column mt-2">
                    <label for="dish_image">Inserisci un'immagine</label>
                    <div class="col-md-6">
                        <input id="dish_image" type="file" class="form-control @error('dish_image') is-invalid @enderror" accept=".jpg,.bmp,.png" name="dish_image">
                        @error('dish_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span style="color:gray">Opzionale</span>
                    </div>
                </div> --}}
        

                {{-- DESCRIZIONE  DEL GIOCO --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Game description</label>
                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description')}}</textarea>  
                  </div>
    
                {{-- DISCOUNT DEL GIOCO --}}
                <div class="form-group mt-2">
                    <label for="discount">Game discount </label>
                    <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="{{ old('discount') }}"  min="0" max="100" step="1">
                </div>
               


        
                <div class="d-flex justify-content-start align-content-center gap-3">
        
                    {{-- BOTTONE SUBMIT --}}
        
                    <button type="submit" class="btn button-primary">Crea</button>
        
                    {{-- VISIBILITA' GIOCO --}}
                      <div class="form-check mb-3 mt-2">
                        <input type="checkbox" class="form-check-input" value="1" id="visible" name="visible" {{ old('visible') ? 'checked' : '' }}>
                        <label class="form-check-label" for="visible">Hide game</label>
                    </div>

                   {{-- CATEGORIA SPECIALE GIOCO --}}
                     <div class="form-check mb-3 mt-2">
                    <input type="checkbox" class="form-check-input" value="1" id="special_category" name="special_category" {{ old('special_category') ? 'checked' : '' }}>
                    <label class="form-check-label" for="special_category">Put in special category</label>
                   </div>

        
                </div>
        
        
        
                
            </form>

        </div>

        <div class="col-md-6 col-lg-5 d-none d-md-block right-part py-4">

            <div class="img-quote">
                <img src="{{Vite::asset('resources/img/food_enjoy.jpeg')}}" alt="">
                <h3 class="pt-4 text-center">
                    "BIG TEXT."
                </h3>
            </div>

        </div>

    </div>

</div>


  <!--pezzo aggiunto end-->
    
@endsection