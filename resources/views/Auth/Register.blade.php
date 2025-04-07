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

            <!-- BEGIN: Registration Form -->
            <form class="space-y-4" action='{{ route('register') }}' method="POST">
              @csrf
              <div class="fromGroup">
                <label class="block capitalize form-label">Name</label>
                <div class="relative ">
                  <input type="text" name="name" class="  form-control py-2" placeholder="Enter your name">
                </div>
              </div>
              <div class="fromGroup">
                <label class="block capitalize form-label">email</label>
                <div class="relative ">
                  <input type="email" name="email" class="  form-control py-2" placeholder="Enter your email">
                </div>
              </div>
              <div class="fromGroup       ">
                <label class="block capitalize form-label  ">passwrod</label>
                <div class="relative "><input type="password" name="password" class="  form-control py-2   " placeholder="Enter your password">
                </div>
              </div>
              <div class="fromGroup       ">
                <label class="block capitalize form-label  ">role</label>
                <div class="relative ">
                  <select name="role" id="role" class="form-control py2">
                    <option selected hidden >Select role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                  </select>
                </div>
              </div>
              <button class="btn btn-dark block w-full text-center">Create an account</button>
            </form>
            <!-- END: Registration Form -->
            <div class="max-w-[242px] mx-auto mt-8 w-full">

            
            </div>
            <div class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 mt-8 uppercase text-sm">
              <span>ALREADY REGISTERED?
                            </span>
              <a href="signin-one.html" class="text-slate-900 dark:text-white font-medium hover:underline">
                Sign In
              </a>
            </div>
          </div>
        </div>
      </div>
</x-authentication>

@endsection