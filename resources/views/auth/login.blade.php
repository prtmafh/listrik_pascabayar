@extends('auth.layoutauth')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('login') }}">Listrik Pascabayar</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="{{ route('login.form') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" />
                    <div class="input-group-text"><span class="bi bi-person-fill"></span></div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                    <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                </div>
                <!-- /.col -->
                <div class="col-4 mx-auto">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                </div>
                <!-- /.col -->
            </form>
            <!-- /.social-auth-links -->
            {{-- <p class="mb-1"><a href="forgot-password.html">I forgot my password</a></p>
            <p class="mb-0">
                <a href="register.html" class="text-center"> Register a new membership </a>
            </p> --}}
        </div>
        <!-- /.login-card-body -->
    </div>
</div>