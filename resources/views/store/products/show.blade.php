@extends('store.layout.app')

@section('content')
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-8 mt-5">
            <div class="row gx-4 gx-lg-8 row-cols-6 row-cols-md-9 row-cols-xl-6 justify-content-center">
               <div>
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{ asset('storage/' . $product->archive->path) }}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $product->name }}</h5>
                            <!-- Product price-->
                            R${{ $product->price }}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-outline-dark mt-auto" href="{{ route('produtos.show', $product->id) }}">
                                View options
                            </a>
                        </div>

                    </div>
                </div>                
               </div>
                
            </div>
        </div>
    </section>

    @endsection