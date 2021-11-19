@extends('layouts.main')

@section('content')

<div class="row py-5">
    <div class="col-md-6 m-auto bg-light shadow-sm p-4">
        <h4 class="text-center">Register</h4>
        <form action="" method="POST">
            @csrf
            <div class="form">
                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="username" name="name" autofocus required>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-sm btn-primary w-25">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection