@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Add or deduct funds</div>
                <div class="card-body">
                <div class="d-grid gap-2">
                    <a class="btn btn-outline-success mb-2" href="{{route('accounts-index')}}">Back to the accounts list</a>
                </div>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">IBAN</th>
            <th scope="col">NAME</th>
            <th scope="col">SURNAME</th>
            <th scope="col">PERSONAL ID</th>
            <th scope="col">FUNDS<span><i class="bi bi-currency-euro"></i></span></th>
            <th scope="col">ADD FUNDS</th>
            <th scope="col">DEDUCT FUNDS</th>
        </tr>
    </thead>
    <form method="post" action="{{route('accounts-update', $account)}}">
        <tbody>
            <tr>
                <td scope="row"> {{$account->accNr}} </td>
                <td scope="row"> {{$account->name}} </td>
                <td scope="row"> {{$account->surname}} </td>
                <td scope="row"> {{$account->personId}} </td>
                <td scope="row"> {{$account->sum}} </td>
                <td scope="row">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm"><i class="bi bi-currency-euro"></i></span>
                        <input name="addFunds" type="text" class="form-control">
                        <button class="btn btn-outline-success btn-sm"  type="submit">ADD</button>
                    </div>
                </td>
                <td scope="row">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm"><i class="bi bi-currency-euro"></i></span>
                        <input name="deductFunds" type="text" class="form-control">
                        <button class="btn btn-outline-danger btn-sm"  type="submit">DEDUCT</button>
                    </div>
                </td>
            </tr>
        </tbody>
@csrf
@method('put')
    </form>
</table>
@endsection