@extends('layouts.app')
@section('content')
<div class="layout-wrapper">

    <div class="page-content">

        @include('components.topbar')

        <div class="px-3">

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

                                        <h4 class="header-title">Formulaire d'édition du Tetra</h4>

                                        @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif

                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        <form action="{{ route('gestionTetra.update', $tetra->id) }}" method="POST">
                                            @csrf
                                            @method('PUT') <!-- Important pour les formulaires de mise à jour -->

                                            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                                                <!-- Colonne de gauche -->
                                                <div style="flex: 1; min-width: 300px;">
                                                    <div class="mb-3">
                                                        <label for="serie" class="form-label">N° série :</label>
                                                        <input type="text" name="serie" class="form-control" value="{{ old('serie', $tetra->serie) }}" required>
                                                        @error('serie') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="numeroAppel" class="form-label">Numéro d'appel :</label>
                                                        <input type="text" name="numero_appel" class="form-control" value="{{ old('numero_appel', $tetra->numero_appel) }}" required>
                                                        @error('numero_appel') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="modele" class="form-label">Modèle de radio :</label>
                                                        <select name="model_tetra_id" class="form-control" required>
                                                            <option value="">Sélectionner le modèle de radio</option>
                                                            @foreach ($models as $model)
                                                            <option value="{{ $model->id }}" {{ old('model_tetra_id', $tetra->model_tetra_id) == $model->id ? 'selected' : '' }}>
                                                                {{ $model->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        @error('model_tetra_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="entite" class="form-label">Entité dotée :</label>
                                                        <select name="entite_id" class="form-control" required>
                                                            <option value="">Sélectionner l'entité dotée</option>
                                                            @foreach ($entites as $entite)
                                                            <option value="{{ $entite->id }}" {{ old('entite_id', $tetra->entite_id) == $entite->id ? 'selected' : '' }}>
                                                                {{ $entite->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        @error('entite_id') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>

                                                <!-- Colonne de droite -->
                                                <div style="flex: 1; min-width: 300px;">
                                                    <div class="mb-3">
                                                        <label for="numero_group" class="form-label">Numero de group :</label>
                                                        <input type="text" name="numero_group" class="form-control" value="{{ old('numero_group', $tetra->numero_group) }}">
                                                        @error('numero_group') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="security_group" class="form-label">Security group :</label>
                                                        <input type="text" name="security_group" class="form-control" value="{{ old('security_group', $tetra->security_group) }}">
                                                        @error('security_group') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="talk_group" class="form-label">Talk group :</label>
                                                        <input type="text" name="talk_group" class="form-control" value="{{ old('talk_group', $tetra->talk_group) }}">
                                                        @error('talk_group') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="margin-top: 20px;">
                                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                                <a href="{{ route('gestion_tetra.index') }}" class="btn btn-secondary">Retour</a>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- container-fluid -->
            </div>
        </div>
    </div>
</div>
@endsection