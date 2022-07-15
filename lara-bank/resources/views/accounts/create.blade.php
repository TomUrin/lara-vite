@extends('layouts.app')

@section('content')

<form class="create" action="{{route('accounts-store')}}" method="post" type="submit">
<a class="list_link" href="{{route('accounts-index')}}">Click here to see accounts list</a>
    <input type="hidden" name="client" value="" readonly>
        <div class="container">
            <h2>Add new bank account</h2>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="name"></input>
                        <span class="text">Name</span>
                        <span class="line"></span>
                    </div>
                     <br>
                    <div style="color: crimson;">{{ $errors->first('name') }}</div>
                </div>
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="surname"></input>
                        <span class="text">Surname</span>
                        <span class="line"></span>
                    </div>
                     <br>
                    <div style="color: crimson;">{{ $errors->first('surname') }}</div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="personId"></input>
                        <span class="text">Personal ID</span>
                        <span class="line"></span>
                    </div>
                    <br>
                    <div style="color: crimson;">{{ $errors->first('personId') }}</div>
                </div>
            </div>
@csrf
            <div class="row100">
                <div class="col">
                    <button class="add" type="submit" name="submit" value="send">CREATE</button>
                </div>
            </div>
        </div>
</form>
@endsection