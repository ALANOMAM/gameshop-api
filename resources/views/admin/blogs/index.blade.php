@extends('layouts.app')

@section('content')

 {{--@dd($blogs)--}}

<!--pezzo aggiunto start-->
<div class="container py-5">

    <div class="mt-2 mb-4">
        <a href="{{url('admin') }}" class="mb-3 return-button"><i class="fa-solid fa-arrow-left"></i> Torna indietro</a>
    </div>

    <h1 class="mb-4">Blog List</h1>

    <div class="dish-cont d-flex justify-content-between align-items-start gap-3">

        <div class="dishes col-12 col-sm-12 col-md-8 col-lg-8 col-xl-9">

            <table class="table table-responsive table-borderless">
            
                {{-- Inizio t-body tabella blogs --}}
                <tbody>
                    @foreach ($blogs as $blog)
                    <tr class="shadow">

                        {{-- Immagine Blog --}}
                        <th class="img-dish-row align-middle h-100" scope="row">

                            <div class="d-flex gap-2 align-items-center">

                                <div class="image rounded-4">
                                    @if ($blog->image)
                                    @if (Str::startsWith($blog->image, ['http://', 'https://']))
                                    <img src="{{ $blog->image }}" alt="{{ $blog->name }}" width="100">
                                    @else
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->name }}" width="100">
                                    @endif
                                    @else
                                    <img src="{{ Vite::asset('resources/img/Default_different_food_0.jpg') }}" alt="Placeholder" width="100">
                                    @endif
                                </div>

                            </div>

                        </th>

                        {{-- descrizione blog --}}
                        <th class="title-dish-row align-middle" scope="row">
                            <div class="fw-bold">
                                {{ $blog->description }}
                            </div>
                        </th>

                        {{-- link blog --}}
                        <th class="price-dish-row align-middle" scope="row">
                            <div class="fw-normal">
                                {{ $blog->link }}
                            </div>
                        </th>

                        
                        @php
                            $modalId = "modalDeleteDish" . $blog->id;
                        @endphp

                        {{-- Pulsanti --}}
                        <th class="modify-dish-row align-middle" scope="row">

                            <div class="d-flex align-items-center justify-content-center p-2 gap-2">
                                <span class="d-flex justify-content-between align-items-center">
                                    <a class="text-decoration-none" href="{{route('admin.blogs.edit', $blog->id)}}">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <i class="fa-solid fa-pen-to-square fs-1"></i>
                                        </div>
                                    </a>
                                </span>
                                <div>
                                    <button type="button" class="delete border-0" data-bs-toggle="modal" data-bs-target="#{{ $modalId }}"><i class="fa-solid fa-trash fs-2"></i></button>

                                    <div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $blog->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <div class="modal-content">
                                    
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel{{ $blog->id }}">Delete Blog</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                    
                                                <div class="modal-body">
                                                    Are you sure you wan to  eliminate "{{ $blog->name }}" ?
                                                </div>
                                    
                                                {{-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                    <form action="{{route('admin.dishes.destroy', $blog) }}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button class="btn btn-orange">Elimina</button>
                                                    </form>
                                                </div>--}}
                                    
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </th>

                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>


        <div class="add-dish bg-light mb-3 d-flex justify-content-end rounded-4 shadow col-9 col-sm-8 col-md-4 col-lg-4 col-xl-3">
            <span class="d-flex justify-content-between align-items-center gap-2 py-3">
                <h4>Add Blog</h4>
                <a class="text-decoration-none" href="{{route('admin.blogs.create')}}">
                    (click)
                    <div class="button-add me-2 d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-plus fs-1"></i>
                    </div>
                </a>
            </span>
        </div>

    </div>

</div>

<!--pezzo aggiunto end-->

    
@endsection