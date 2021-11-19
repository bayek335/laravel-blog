@extends('layouts.main')

@section('content')

<div class="row py-5">
    @if(session()->exists('fail'))
    <div>
        <div class="col-6 m-auto mb-4 alert alert-danger">
            {{ session('fail') }}
        </div>
    </div>
    @endif
    <div class="col-md-6 m-auto bg-light shadow-sm p-4">
        <h4 class="text-center">Log in</h4>
        <form action="" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control " id="password" name="password" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-sm btn-primary w-25">
                    Log in
                </button>
            </div>
    </div>
    </form>
</div>
</div>

@endsection