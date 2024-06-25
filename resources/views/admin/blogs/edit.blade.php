@extends('layouts.app')

@section('content')

   <!--pezzo ggiunto start-->

<div class="container py-5">

    <div class="row">

        <div class="mt-2 mb-4">
            <a href="{{route('admin.blogs.index')}}" class="mb-3 return-button"><i class="fa-solid fa-arrow-left"></i> Torna indietro</a>
        </div>

        <h1 class="mb-4">Edit the blog </h1>

        <div class="col-12 col-md-6 col-lg-7 py-4">

            <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
            
                {{-- IMMAGINE DEL BLOG --}}
        
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
    
                {{-- DESCRIZIONE DEL BLOG--}}
                <div class="mb-3">
                    <label for="description" class="form-label">Blog description</label>
                    <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', $blog->description) }}</textarea>
                </div>

                {{-- LINK DEL BLOG--}}
              <div class="mb-3">
                 <label for="link" class="form-label">Blog link</label>
                 <textarea class="form-control" id="link" rows="3" name="link">{{ old('link', $blog->link) }}</textarea>
              </div>
               
                

                <div class="d-flex justify-content-start align-items-center gap-3">
    
                    {{-- BOTTONE SUBMIT --}}
    
                    <button type="submit" class="btn button-primary">Save changes</button>
    
    
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