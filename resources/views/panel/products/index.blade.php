@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Produtos</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Produtos</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <div class="text-end">
                    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3 mt-3 text-end">Novo Produto</a>
                </div>
                <table class="table table-striped">
                    <thead class="align-middle text-center">
                        <tr>
                            <th>ID</th>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle text-center">
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if ($product->archive && $product->archive->path)
                                <img src="{{ asset('storage/' . $product->archive->path) }}" width="100">
                                @else
                                Sem imagem
                                @endif
                            </td>

                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection