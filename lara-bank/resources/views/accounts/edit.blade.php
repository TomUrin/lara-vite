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
            <th scope="col">FUNDS</th>
            <th scope="col">ADD FUNDS</th>
            <th scope="col">DEDUCT FUNDS</th>
        </tr>
    </thead>
    <form method="post" action="{{route('accounts-update', $account)}}">
        <tbody>
            <tr>
                <td> {{$account->accNr}} </td>
                <td> {{$account->name}} </td>
                <td> {{$account->surname}} </td>
                <td> {{$account->personId}} </td>
                <td> {{$account->sum}} </td>
                <td><input class="input" type="text" name="addFunds" /><button class="btn_add"  type="submit">ADD</button></td>
                <td><input class="input" type="text" name="deductFunds" /><button class="btn_del"  type="submit">DEDUCT</button></td>
            </tr>
        </tbody>
@csrf
@method('put')
    </form>
</table>
@endsection