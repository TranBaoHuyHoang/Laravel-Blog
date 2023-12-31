@extends('Backend.auth.layout.master')
@section('page_title', 'Register')
@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{route('register')}}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" name="name" placeholder="Username" />
                                <label for="name">User Name</label>
                                @if($errors->has('name'))
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                <label for="inputEmail">Email address</label>
                                @if($errors->has('email'))
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Create a password" />
                                        <label for="inputPassword">Password</label>
                                        @if($errors->has('password'))
                                        <div class="text-danger">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputPasswordConfirm" name="password_confirmation" type="password" placeholder="Confirm password" />
                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Create Account</button></div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="{{route('login')}}">Have an account? Go to login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
