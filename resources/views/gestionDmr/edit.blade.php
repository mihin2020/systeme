@extends('layouts.app')

@section('content')
<div class="layout-wrapper">

    <div class="page-content">

        @include('components.topbar')

        <div class="px-3">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
                                    <div class="col-12 col-md-8 col-lg-6">
                                        <form action="{{ route('gestion_dmr.update', $dmr->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="text-center mb-4">Modifier le DMR</h4>

                                                    <div class="row">
                                                        <!-- Colonne 1 -->
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="">Numéro de série</label>
                                                                <input type="text" name="serie" class="form-control" value="{{ $dmr->serie }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="">Type de radio</label>
                                                                <select name="type_dmr_id" class="form-control" required>
                                                                    @foreach($types as $type)
                                                                    <option value="{{ $type->id }}" {{ $dmr->type_dmr_id == $type->id ? 'selected' : '' }}>
                                                                        {{ $type->name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="">Modèle de radio</label>
                                                                <select name="model_dmr_id" class="form-control" required>
                                                                    @foreach($models as $model)
                                                                    <option value="{{ $model->id }}" {{ $dmr->model_dmr_id == $model->id ? 'selected' : '' }}>
                                                                        {{ $model->name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="">Entité dotée</label>
                                                                <select name="entite_id" class="form-control" required>
                                                                    @foreach($entites as $entite)
                                                                    <option value="{{ $entite->id }}" {{ $dmr->entite_id == $entite->id ? 'selected' : '' }}>
                                                                        {{ $entite->name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
                                                        <a href="{{ route('gestion_dmr.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
                                                    </div>

                                                </div> <!-- end card-body -->
                                            </div> <!-- end card -->
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- end container -->

                </div>
            </div> <!-- container-fluid -->
        </div>
    </div> <!-- page-content -->
</div>
@endsection