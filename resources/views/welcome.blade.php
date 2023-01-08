@extends('layouts.app')

@section('content')
    <section>
        <div class="container col-lg-10  px-4 py-5">
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-4 fw-bold lh-1 mb-3">Website pencatatan keuangan harian</h1>
                    <p class="col-lg-10">Daftarkan akun anda, untuk laporan keuangan yang lebuh rapi dan mudah digunakan membantu anda mengontrol keuangan.</p>
                        <button class="btn btn-primary">Hallo</button>
                </div>
                <div class="card col-md-10 mx-auto col-lg-5">
                    <form class="p-4 p-md-5" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
                        <hr class="my-4">
                        <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
