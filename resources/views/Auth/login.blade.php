@extends('layouts.app')

@section('content')
<x-authentication>
    <div class="right-column  relative">
        <div class="inner-content h-full flex flex-col bg-white dark:bg-slate-800">
          <div class="auth-box h-full flex flex-col justify-center">
            <div class="mobile-logo text-center mb-6 lg:hidden block">
              <a href="index.html">
                <img src="assets/images/logo/logo.svg" alt="" class="mb-10 dark_logo">
                <img src="assets/images/logo/logo-white.svg" alt="" class="mb-10 white_logo">
              </a>
            </div>
            <div class="text-center 2xl:mb-10 mb-4">
              <h4 class="font-medium">Sign in</h4>
              <div class="text-slate-500 text-base">
                Sign in to your account to start using Data Siswa
              </div>
            </div>

            <form class="space-y-4" method="POST" action='{{ route('login') }}'>
              @csrf
              <div class="fromGroup">
                <label class="block capitalize form-label">email</label>
                <div class="relative ">
                  <input type="email" name="email" class="  form-control py-2" placeholder="Add placeholder">
                </div>
              </div>
              <div class="fromGroup       ">
                <label class="block capitalize form-label  ">passwrod</label>
                <div class="relative "><input type="password" name="password" class="  form-control py-2   " placeholder="Add placeholder" >
                </div>
              </div>
              <button type="submit" class="btn btn-dark block w-full text-center">Sign in</button>
            </form>

            <div class="max-w-[242px] mx-auto mt-8 w-full">

              <!-- BEGIN: Social Log in Area -->
            </div>
            <div class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 mt-12 uppercase text-sm">
              Don’t have an account?
              <a href="{{ route('register') }}" class="text-slate-900 dark:text-white font-medium hover:underline">
                Sign up
              </a>
            </div>
          </div>
        </div>
      </div>
</x-authentication>

@endsection