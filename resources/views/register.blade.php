@extends('common.app')
@section('title', 'Register')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto  bg-secondary rounded p-5" style="">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h1 class="text-center text-light">Register</h1>
            <form action="{{ route('check_register') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label class="mb-2 text-light" for="email">Name</label>
                    <input type="name" name="name" value="{{ old('name') }}" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2 text-light" for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2 text-light" for="password">Password</label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
            <form action="{{ route('show') }}">
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>
