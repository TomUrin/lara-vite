@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@if(session('fundsError'))
    <div class="alert alert-danger" role="alert">
        {{ session('fundsError') }}
    </div>
@endif

@if(session('fundsSuccess'))
    <div class="alert alert-success" role="alert">
        {{ session('fundsSuccess') }}
    </div>
@endif

@if(session('deduct'))
    <div class="alert alert-success" role="alert">
        {{ session('deduct') }}
    </div>
@endif

@if(session('deleted'))
    <div class="alert alert-success" role="alert">
        {{ session('deleted') }}
    </div>
@endif