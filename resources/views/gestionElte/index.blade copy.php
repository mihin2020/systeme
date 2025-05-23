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
                        <div class="col-lg-6 text-end">
                            <a href="{{ route('gestion_elte.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Ajouter
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title">Liste des E-lte</h4>

                                        @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif

                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Numéro de série</th>
                                                    <th>Entité doté</th>
                                                    <th>Nom de modèle </th>
                                                    <th>Numero d'appel</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            @foreach($eltes as $index => $elte)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $elte->serie }}</td>
                                                <td>{{ $elte->entite->name ?? 'N/A' }}</td>
                                                <td>{{ $elte->modelElte->name ?? 'N/A' }}</td>
                                                <td>{{ $elte->numero_appel }}</td>
                                                <td class="d-flex mx-2">
                                                    <!-- Bouton Voir -->
                                                    <a href="{{ route('gestion_elte.show', $elte->id) }}" class="btn btn-info btn-sm mx-2">
                                                        Voir
                                                    </a>

                                                    <!-- Bouton Éditer -->
                                                    <a href="{{ route('gestion_elte.edit', $elte->id) }}" class="btn btn-primary btn-sm mx-2">
                                                        Éditer
                                                    </a>

                                                    <!-- Formulaire de suppression -->
                                                    <form action="{{ route('gestion_elte.destroy', $elte->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm mx-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce E-lte ?')">
                                                            Supprimer
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach


                                        </table>

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