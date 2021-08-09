@extends('layouts.login')
@section('title')
    Forgot Password
@endsection
@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Rumah Sakit Umum Daerah Gunung Jati Cirebon!</h1>

                                    </div>
                                    @include('layouts.alert')
                                    <form action="{{ url('password/forgot_password') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <div class="form-group text-center">
                                            <div class="avatar avatar-xl mb-1">
                                                <img src="{{ asset('/img/profile_user/' . $user->image) }}" alt="..."
                                                    class="avatar-img rounded-circle">
                                            </div><br>
                                            <label>{{ $user->name }}</label><br>
                                            <label>{{ $user->email }}</label><br>

                                            <label>Akses : {{ $user->user_role->role }}</label><br>
                                            <label class="mt-3 mb-3"><b>Masukkan Kode Akses, Silahkan cek email
                                                    anda:</b></label>
                                            <div class="form-group form-floating-label text-left">
                                                <input id="inputFloatingLabel" type="number" name="kode"
                                                    class="form-control input-border-bottom" required="">
                                                <label for="inputFloatingLabel" class="placeholder">Contoh :
                                                    6876465435</label>
                                            </div>
                                            <div class="text-right mt-1">
                                                <button type="submit" class="btn btn-primary btn-round">Cek Kode</button>
                                    </form>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ url('login') }}">Login Account!</a>

                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">Create an Account!</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>


@endsection
