@extends('layouts.app')
@section('content')
<div class="layout-wrapper">

    <div class="main-menu">
        <!-- Brand Logo -->
        <div class="logo-box">
            <!-- Brand Logo Dark -->
            @include('components.logo')
        </div>
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

                                        <h4 class="header-title">Formulaire d'enregistrement des Dmrs</h4>

                                        @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form action="{{ route('gestionDmr.store') }}" method="POST">
                                                            @csrf

                                                            <div class="row">
                                                                <!-- Colonne de gauche -->
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="">Numéro série</label>
                                                                        <input type="text" name="serie" class="form-control" placeholder="Nom du modèle de dmr" required>
                                                                        @error('serie') <span class="text-danger">{{ $message }}</span> @enderror
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="">Numéro IP</label>
                                                                        <input type="text" name="no_ip" class="form-control" placeholder="Numéro Ip" required>
                                                                        @error('no_ip') <span class="text-danger">{{ $message }}</span> @enderror
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="">Type de Dmr</label>
                                                                        <select name="type_dmr_id" class="form-control" required>
                                                                            <option value="">Sélectionner le type de Dmr</option>
                                                                            @foreach ($types as $type)
                                                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('type_dmr_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="">Modèle de Dmr</label>
                                                                        <select name="model_dmr_id" class="form-control" required>
                                                                            <option value="">Sélectionner le modèle de tetra</option>
                                                                            @foreach ($models as $model)
                                                                            <option value="{{ $model->id }}">{{ $model->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('model_dmr_id') <span class="text-danger">{{ $message }}</span> @enderror
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

                                                                    <div class="mb-3">
                                                                        <label for="">Bande de fréquence</label>
                                                                        <input type="text" name="bande_frequence" class="form-control" placeholder="Bande de fréquence" required>
                                                                        @error('bande_frequence') <span class="text-danger">{{ $message }}</span> @enderror
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