@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Categoria de Produtos</h5>

        <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Cadastro de Categoria de Produtos</li>
        </ol>
      </nav>

        
        <form action="{{ route('products-categories.store') }}" method="post">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>            
            
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Salvar</button>                
            </div>
        </form>

    </div>
</div>


@endsection