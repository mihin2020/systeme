@extends('layouts.app')

@section('content')
<div class="layout-wrapper">

    <div class="page-content">

        @include('components.topbar')

        <div class="px-3">
            <!-- Start Content-->
            <div class="container-fluid">

               
                <div class="row mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title">Formulaire d'édition des elte</h4>

                                        @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif

                                        <form action="{{ route('gestion_elte.update', $elte->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="modal-body">
                                                <div class="row">
                                                    <!-- Colonne 1 -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Numéro de série</label>
                                                            <input type="text" name="serie" class="form-control" value="{{ $elte->serie }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Modèle de E-lte</label>
                                                            <select name="model_elte_id" class="form-control" required>
                                                                @foreach($models as $model)
                                                                <option value="{{ $model->id }}" {{ $elte->model_elte_id == $model->id ? 'selected' : '' }}>
                                                                    {{ $model->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Colonne 2 -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Entité doté</label>
                                                            <select name="entite_id" class="form-control" required>
                                                                @foreach($entites as $entite)
                                                                <option value="{{ $entite->id }}" {{ $elte->entite_id == $entite->id ? 'selected' : '' }}>
                                                                    {{ $entite->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Numéro d'appel</label>
                                                            <input type="text" name="numero_appel" class="form-control" value="{{ $elte->numero_appel }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                                <a href="{{ route('elte.index') }}" class="btn btn-secondary mx-2">
                                            Retour
                                                </a>
                                            </div>
                                        </form>


                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- end container -->

                </div>
            </div> <!-- container-fluid -->
        </div>
    </div> <!-- page-content -->
</div>
@endsection