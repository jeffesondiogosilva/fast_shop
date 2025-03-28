@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-body">
        <div class="row col-md-12">

            <div class="col-md-6">
                <h5 class="card-title">Cadastro de Produtos</h5>

                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Cadastro de Produtos</li>
                    </ol>
                </nav>

            </div>

            <div class="text-end col-md-6 mt-3">
                <a href="{{ route('products-categories.create') }}" class="btn btn-primary mb-3 mt-3 text-end">Nova Categoria</a>
            </div>
        </div>


        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Descrição</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" name="description">
                </div>
            </div>
            <div class="row mb-3">
                <label for="category_id" class="col-sm-2 col-form-label">Categoria</label>
                <div class="col-sm-10">
                    <select class="form-select" id="category_id" name="category_id">
                        <option selected>Selecione uma categoria</option>
                        @foreach($productCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="price" class="col-sm-2 col-form-label">Preço</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="price" name="price">
                </div>
            </div>
            <div class="row mb-3">
                <label for="quantity" class="col-sm-2 col-form-label">Quantidade</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="quantity" name="quantity">
                </div>
            </div>
            <div class="row mb-3">
                <label for="image" class="col-sm-2 col-form-label">Imagem</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>

    </div>
</div>


@endsection