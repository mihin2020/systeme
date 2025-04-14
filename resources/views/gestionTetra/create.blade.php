@extends('layouts.app')
@section('content')
<div class="layout-wrapper">

    <div class="main-menu">
        <!-- Brand Logo -->
        @include('components.logo')
        @include('components.sidebar')

        <div class="clearfix"></div>
    </div>

    <div class="page-content">

        @include('components.topbar')

        <div class="px-3">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="py-3 py-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4 class="page-title mb-0">Dashboard</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title">Liste des Tetras</h4>

                                        @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form action="{{ route('gestionTetra.store') }}" method="POST">
                                                            @csrf

                                                            <div class="row">
                                                                <!-- Colonne de gauche -->
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="">Numéro série</label>
                                                                        <input type="text" name="serie" class="form-control" placeholder="Nom du modèle de dmr" required>
                                                                        @error('serie') <span class="text-danger">{{ $message }}</span> @enderror
                                                                    </div>

                                                                    <!-- <div class="mb-3">
                                                                        <label for="">Type de radio</label>
                                                                        <select name="type_tetra_id" class="form-control" required>
                                                                            <option value="">Sélectionner le type de tetra</option>
                                                                            @foreach ($types as $type)
                                                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('type_tetra_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                                    </div> -->

                                                                    <div class="mb-3">
                                                                        <label for="">Modèle de Tetra</label>
                                                                        <select name="model_tetra_id" class="form-control" required>
                                                                            <option value="">Sélectionner le modèle de tetra</option>
                                                                            @foreach ($models as $model)
                                                                            <option value="{{ $model->id }}">{{ $model->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('model_tetra_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                                    </div>


                                                                    <div class="mb-3">
                                                                        <label for="">Entité dotée</label>
                                                                        <select name="entite_id" class="form-control" required>
                                                                            <option value="">Sélectionner l'entité dotée</option>
                                                                            @foreach ($entites as $entite)
                                                                            <option value="{{ $entite->id }}">{{ $entite->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('entite_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                                    </div>
                                                                </div>

                                                                <!-- Colonne de droite -->
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="">Numéro d'appel</label>
                                                                        <input type="text" name="numero_appel" class="form-control" placeholder="Numéro d'appel" required>
                                                                        @error('numero_appel') <span class="text-danger">{{ $message }}</span> @enderror
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="">Security group</label>
                                                                        <input type="text" name="security_group" class="form-control" placeholder="Groupe de sécurité" required>
                                                                        @error('security_group') <span class="text-danger">{{ $message }}</span> @enderror
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="">Numéro de groupe</label>
                                                                        <input type="text" name="numero_group" class="form-control" placeholder="Numéro de groupe" required>
                                                                        @error('numero_group') <span class="text-danger">{{ $message }}</span> @enderror
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="">Talk group</label>
                                                                        <input type="text" name="talk_group" class="form-control" placeholder="Talk group" required>
                                                                        @error('talk_group') <span class="text-danger">{{ $message }}</span> @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div>
                </div>

            </div>

        </div>

        <!-- end row -->
    </div> <!-- container -->
</div> <!-- content -->
<!-- Footer Start -->
@include('components.footer')
</div>
</div>
@endsection