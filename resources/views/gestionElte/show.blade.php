@extends('layouts.app')
@section('content')
<div class="layout-wrapper">

    <div class="page-content">

        @include('components.topbar')

        <div class="px-3">

            <!-- Start Content-->
            <div class="container-fluid">

            <div class="row justify-content-center mt-5">
    <div class="col-lg-8 col-xl-6"> <!-- Contrôle la largeur du contenu -->
        <div class="card">
            <div class="card-body">

                <h4 class="header-title text-center mb-4">Détails du E-lte</h4>
                <h5 class="text-center mb-4">Informations du elte</h5>

                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th class="w-25">Numéro de série</th>
                                <td>{{ $elte->serie }}</td>
                            </tr>
                            <tr>
                                <th>Modèle</th>
                                <td>{{ $elte->modelElte->name ?? 'Non défini' }}</td>
                            </tr>
                            <tr>
                                <th>Entité</th>
                                <td>{{ $elte->entite->name ?? 'Non défini' }}</td>
                            </tr>
                            <tr>
                                <th>Numéro d'appel</th>
                                <td>{{ $elte->numero_appel }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('elte.index') }}" class="btn btn-secondary px-4">Retour à la liste</a>
                </div>

            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row --><!-- end row -->

            </div> <!-- container-fluid -->

        </div> <!-- px-3 -->

    </div> <!-- page-content -->

</div> <!-- layout-wrapper -->
@endsection
