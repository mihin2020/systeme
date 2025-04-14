@extends('layouts.app')
@section('content')
<div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="d-flex align-items-center min-vh-100">
                <div class="w-100 d-block card shadow-lg rounded my-5 overflow-hidden">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center mx-auto auth-logo mb-4">
                                    <a href="#" class="logo-dark">
                                        <span><img src="{{ asset('assets/images/police.jpg') }}" alt="" height="100"></span>
                                    </a>
                                  
                                </div>

                            
                                <form action="{{ route('auth.login') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="emailaddress">Adresse Email</label>
                                        <input class="form-control" type="email" id="emailaddress" required="" placeholder="Saisissez votre adresse email" name="email" value="{{ old('email') }}">
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label" for="password">Mot de passe</label>
                                        <input class="form-control" type="password" required="" id="password" placeholder="Saisissez votre mot de passe" name="password">
                                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary w-100" type="submit">Se connecter</button>
                                    </div>
                                </form>

                            
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

