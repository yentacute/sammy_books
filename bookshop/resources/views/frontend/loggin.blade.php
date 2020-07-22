@extends('layouts.main')
@section('content')
        @if(session('message'))
        <span class="alert alert-success" role="alert">
            <strong>{{ session('message') }}</strong>
        </span>
        @endif
        @if(session('error'))
        <span class="alert alert-danger" role="alert">
        <strong>{{ session('error') }}</strong>
        </span>
        @endif
        <div class="login-form">
        <form action="{{route('user.post')}}" method="post">
                     @csrf
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember_token	"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <a href="#" class="btn btn-link">
                                    Forgot Your Password?
                                </a>
                            </div><br>
                            <p class="text-center"><a href="{{route('user.create')}}">Create an Account</a></p>
                        </form>
                    </div>

        @endsection
