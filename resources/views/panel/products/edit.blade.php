@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edição de Produto</h5>

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Edição de Produto</li>
            </ol>
        </nav>


        <form action="{{ route('products.update', $product->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ isset($product->name) ? $product->name : '' }}">

                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Descrição</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" name="description"
                        value="{{ isset($product->description) ? $product->description : '' }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="price" class="col-sm-2 col-form-label">Preço</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="price" name="price"
                        value="{{ isset($product->price) ? $product->price : '' }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="quantity" class="col-sm-2 col-form-label">Quantidade</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="quantity" name="quantity"
                        value="{{ isset($product->quantity) ? $product->quantity : '' }}">
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>

    </div>
</div>


@endsection