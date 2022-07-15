@extends('layouts.app')
@section('title')
Bank-lara
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Accounts list</div>

                <div class="card-body">
                <div class="d-grid gap-2">
                    <a class="btn btn-outline-success mb-2" href="{{route('accounts-create')}}">Click here to add new account</a>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a class="btn btn-outline-secondary mb-2" href="{{route('accounts-index')}}">Reset sorting</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">IBAN</th>
                                <th scope="col">NAME<a class="sort" href="{{route('accounts-index', ['sort' => 'nameDown'])}}"><i class="bi bi-sort-alpha-down ms-2"></i></a>
                                    <a class="sort" href="{{route('accounts-index', ['sort' => 'nameUp'])}}"><i class="bi bi-sort-alpha-up"></i></a>
                                </th>
                                <th scope="col">SURNAME<a class="sort" href="{{route('accounts-index', ['sort' => 'surnameDown'])}}"><i class="bi bi-sort-alpha-down ms-2"></i></a>
                                    <a class="sort" href="{{route('accounts-index', ['sort' => 'surnameUp'])}}"><i class="bi bi-sort-alpha-up"></i></a>
                                </th>
                                <th scope="col">PERSONAL ID</th>
                                <th scope="col">FUNDS <i class="bi bi-currency-euro"><a class="sort" href="{{route('accounts-index', ['sort' => 'sumDown'])}}"><i class="bi bi-sort-down ms-2"></i></a>
                                    <a class="sort" href="{{route('accounts-index', ['sort' => 'sumUp'])}}"><i class="bi bi-sort-up"></i></a>
                                </th>
                                
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        @foreach($accounts as $account)
                        <tbody>
                            <tr>
                                <td scope="row"> {{$account->accNr}} </td>
                                <td scope="row"> {{$account->name}} </td>
                                <td scope="row"> {{$account->surname}} </td>
                                <td scope="row"> {{$account->personId}} </td>
                                <td scope="row"> {{$account->sum}} </td>
                                <td scope="row" class="actions">
                                <a class="btn btn-outline-info btn-sm me-2 " href="{{route('accounts-show', $account->id)}}">SHOW</a>
                                <a class="btn btn-outline-warning btn-sm me-2 " href="{{route('accounts-edit', $account)}}">EDIT</a>
                                    <form method="POST" action="{{route('accounts-delete', $account)}}">
                                        <button class="btn btn-outline-danger btn-sm" type="submit">DELETE</button>
                                </td>
                            </tr>
                        </tbody>
                        @csrf
                        @method('delete')
                        </form>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
