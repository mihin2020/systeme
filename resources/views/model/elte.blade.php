@extends('layouts.app')
@section('content')
<div class="layout-wrapper">

    <div class="main-menu">
        <!-- Brand Logo -->
        <div class="logo-box">
            <!-- Brand Logo Dark -->
            <a href="index.html" class="logo-dark">
                <img src="assets/images/logo-dark.png" alt="dark logo" class="logo-lg" height="32">
                <img src="assets/images/logo-dark-sm.png" alt="small logo" class="logo-sm" height="32">
            </a>
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
                            <div class="col-8">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title">Liste des modèles de E-lte</h4>

                                        @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif

                                        <table class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Nom de modèle E-lte</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($models as $index => $model)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $model->name }}</td>
                                                    <td>
                                                        <!-- Bouton pour ouvrir le modal -->
                                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $model->id }}">
                                                            Éditer
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="editModal{{ $model->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $model->id }}" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="{{ route('model-elte.update', $model->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="editModalLabel{{ $model->id }}">Modifier le modèle E-lte</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <label for="name{{ $model->id }}" class="form-label">Nom du E-lte</label>
                                                                                <input type="text" class="form-control" id="name{{ $model->id }}" name="name" value="{{ $model->name }}" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Formulaire de suppression -->
                                                        <form action="{{ route('model-elte.destroy', $model->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce modèle ?')">
                                                                Supprimer
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div>
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-body">
                                    <form action="{{ route('model-elte.store') }}" method="POST">
                                            @csrf
                                            <label for="">Modèle E-lte</label>
                                            <input type="text" name="name" class="form-control" placeholder="Nom du modèle E-lte" required>
                                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror

                                            <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>
                                        </form>

                                    </div>
                                </div>
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