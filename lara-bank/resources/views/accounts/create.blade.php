@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Add new bank account</div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a class="btn btn-outline-success mb-5" href="{{route('accounts-index')}}">Click here to see accounts list</a>
                    </div>
                    <form class="create" action="{{route('accounts-store')}}" method="post" type="submit">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" id="exampleInputEmail1">
                            <div style="color: crimson;">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Surname</label>
                            <input name="surname" type="text" class="form-control" id="exampleInputPassword1">
                            <div style="color: crimson;">{{ $errors->first('surname') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Personal ID</label>
                            <input name="personId" type="text" class="form-control" id="exampleInputPassword1">
                            <div style="color: crimson;">{{ $errors->first('personId') }}</div>
                        </div>
                        <div class="mx-auto">
                            <button type="submit" name="submit" value="send" class="btn btn-outline-success mt-5 btn-lg">Create</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
