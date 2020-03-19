@extends('layouts.app')

@section('content')
      <div class="row" style="margin-top: 20px;">
        <div class="col-12 mx-auto tm-login-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12 text-center">
                <img style="width: 100px; margin-bottom: 10px;" src="{{asset('img/logo.png')}}">
                <h2 class="tm-block-title mb-4">SMK Tunas Harapan Pati Bot Telegram Controller</h2>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <form action="{{route('login')}}" method="post" class="tm-login-form">
                    @csrf
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input
                      name="username"
                      type="text"
                      class="form-control validate"
                      id="username"
                      value=""
                      required
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input
                      name="password"
                      type="password"
                      class="form-control validate"
                      id="password"
                      value=""
                      required
                    />
                  </div>
                  <div class="form-group mt-4">
                    <button
                      type="submit"
                      class="btn btn-primary btn-block text-uppercase"
                    >
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
