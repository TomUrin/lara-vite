@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Account</div>

                <div class="card-body">
                <div class="d-grid gap-2">
                    <a class="btn btn-outline-success mb-2" href="{{route('accounts-index')}}">Back to the accounts list</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">IBAN</th>
                                <th scope="col">NAME</th>
                                <th scope="col">SURNAME<</th>
                                <th scope="col">PERSONAL ID</th>
                                <th scope="col">FUNDS <i class="bi bi-currency-euro"></i> </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td scope="row"> {{$account->accNr}} </td>
                                <td scope="row"> {{$account->name}} </td>
                                <td scope="row"> {{$account->surname}} </td>
                                <td scope="row"> {{$account->personId}} </td>
                                <td scope="row"> {{$account->sum}} </td>
                            </tr>
                        </tbody>
                        @csrf
                        @method('show')
                        </form>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection