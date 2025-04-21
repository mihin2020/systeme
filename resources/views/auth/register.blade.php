@extends('layouts.app')

@section('content')
<div class="layout-wrapper">

    <div class="page-content">

        @include('components.topbar')

        <div class="px-3">
            <!-- Start Content-->
        
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="d-flex align-items-center min-vh-100">
                <div class="w-100 d-block card shadow-lg rounded my-5 overflow-hidden">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="p-5">
                               @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form action="{{ route('auth.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="firstname">Nom</label>
                                        <input class="form-control" type="text" id="firstname" required placeholder="Saisissez votre nom" name="firstname" value="{{ old('firstname') }}">
                                        @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="lastname">Prénom</label>
                                        <input class="form-control" type="text" id="lastname"  placeholder="Saisissez votre prénom" name="lastname" value="{{ old('lastname') }}">
                                        @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
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

                                    <div class="form-group mb-3">
                                        <label class="form-label" for="password">Confirmer le Mot de passe</label>
                                        <input class="form-control" type="password" required="" id="password" placeholder="Confirmer votre mot de passe" name="password_confirmation">
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
    </div>
    </div>
@endsection

