@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Clientes</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Clientes</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                
                <table class="table table-striped">
                    <thead class="align-middle text-center">
                        <tr>
                            <th>ID</th>                            
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Cidade</th>                            
                        </tr>
                    </thead>
                    <tbody class="align-middle text-center">
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>                      
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->city }}</td>                          
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection