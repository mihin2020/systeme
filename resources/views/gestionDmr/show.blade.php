@extends('layouts.app')
@section('content')
<div class="layout-wrapper">
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
                    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
                        <div class="col-12 col-md-8 col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="header-title text-center">Détails du DMR</h4>

                                    <h5 class="mb-3 text-center">Informations du DMR</h5>

                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Numéro de série</th>
                                            <td>{{ $dmr->serie }}</td>
                                        </tr>
                                        <tr>
                                            <th>Type de radio</th>
                                            <td>{{ $dmr->typeDmr->name ?? 'Non défini' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Modèle de radio</th>
                                            <td>{{ $dmr->modelDmr->name ?? 'Non défini' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Entité dotée</th>
                                            <td>{{ $dmr->entite->name ?? 'Non défini' }}</td>
                                        </tr>
                                    </table>

                                    <div class="text-center">
                                        <a href="{{ route('gestion_dmr.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
                                    </div>

                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                    </div> <!-- end container -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->

        </div> <!-- px-3 -->

    </div> <!-- page-content -->

</div> <!-- layout-wrapper -->
@endsection
