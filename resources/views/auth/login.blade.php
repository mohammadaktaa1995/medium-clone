@extends('layouts.app')

@section('content')
    <div class="container py-5 m-auto text-center">
     <div class="col-sm-12 col-lg-4 mx-auto">
         <div class="row">
             <div class="col-12 shadow text-center text-md-left">
                 <div class="mt-4 bg-white mb-4">

                     <form action="{{route('login')}}" method="POST" class="">
                         @csrf
                         <p class="widget-title">
                             <b>Login</b>
                         </p>
                         <div class="form-group">
                             <input type="email" autofocus name="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    autocomplete="email"
                                    placeholder="Email Address" required="">
                             @error('email')
                             <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                         </div>
                         <div class="form-group">
                             <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Password" required="">
                         </div>
                         <div class="form-group">
                             <div class="custom-control custom-checkbox">
                                 <input type="checkbox" name="remember" class="custom-control-input"
                                        id="remember" {{ old('remember') ? 'checked' : '' }}>
                                 <label class="custom-control-label cursor-pointer"
                                        for="remember">Remember Me</label>
                             </div>
                         </div>
                         <div class="form-group">
                             <button type="submit" class="btn btn-outline-info btn-block">Login</button>
                         </div>
                         <div class="form-group">
                             <small><a href="/register">Not a member? Sign up</a></small>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
    </div>
@endsection
