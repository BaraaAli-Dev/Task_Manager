@extends('common.app')
@section('title', 'Login')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto  bg-secondary rounded p-5" style="">
                {{-- show register success message --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                {{-- Show Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h1 class="text-center text-light">Login</h1>
                <form action="{{ route('check') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="mb-2 text-light" for="email">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-2 text-light" for="password">Password</label>
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <form class="mt-3" action="{{ route('register') }}">
                    <button type="submit" class="btn btn-primary w-100">Register New Account</button>
                </form>
            </div>
        </div>
    </div>
@endsection
