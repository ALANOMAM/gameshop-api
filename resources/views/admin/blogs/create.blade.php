@extends('layouts.app')

@section('content')

    <!--pezzo aggiunto start-->
  
    <div class="container py-5">

        <div class="mt-2 mb-4">
            <a href="{{route('admin.blogs.index')}}" class="mb-3 return-button"><i class="fa-solid fa-arrow-left"></i> Torna indietro</a>
        </div>
    
        <h1 class="mb-4">Add a new blog </h1>
    
        <div class="row">
    
            <div class="col-12 col-md-6 col-lg-7 py-4">
    
                <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
            
            
                    {{-- IMMAGINE DEL BLOG --}}
            
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
            
    
                    {{-- DESCRIZIONE  DEL BLOG --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Blog description</label>
                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description')}}</textarea>  
                      </div>

                      {{-- LINK AL BLOG  --}}
                    <div class="mb-3">
                        <label for="link" class="form-label">Blog link</label>
                        <textarea type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link">{{old('link')}}</textarea>  
                      </div>
        
                   
    
    
            
                    <div class="d-flex justify-content-start align-content-center gap-3">
            
                        {{-- BOTTONE SUBMIT --}}
            
                        <button type="submit" class="btn button-primary">Create</button>
             
            
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