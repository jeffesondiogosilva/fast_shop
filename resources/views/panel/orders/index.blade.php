@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Pedidos</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Pedidos</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">

            <div class="text-end">
                    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3 mt-3 text-end">Novo Pedido</a>
                </div>
               
                <table class="table table-striped">
                    <thead class="align-middle text-center">
                        <tr>
                            <th>ID</th>                                                        
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle text-center">
                        @if(isset($orders) && count($orders) > 0)
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                            
                                <td>
                                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="post" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2" class="text-dark">Nenhum pedido encontrado</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection