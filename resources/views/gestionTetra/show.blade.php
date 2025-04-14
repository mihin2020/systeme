@extends('layouts.app')
@section('content')
<div class="layout-wrapper">
    <div class="page-content">
        @include('components.topbar')
        <div class="px-3">
            <!-- Start Content-->
            <div class="container">

                <div class="row justify-content-center mt-5">
                    <div class="col-lg-8 col-md-10 col-12"> <!-- J'ai réduit la largeur max du contenu -->
                        <div class="card">
                            <div class="card-body">

                                <h4 class="header-title text-center">Détails des Tetras</h4>

                                <h5 class="mb-3 text-center">Informations du Tetra</h5>

                                <div class="table-responsive"> <!-- Pour assurer la responsivité sur petits écrans -->
                                    <table class="table table-bordered">
                                        <tr>
                                            <th class="w-25">Numéro de série</th> <!-- Largeur fixe pour les en-têtes -->
                                            <td>{{ $tetra->serie }}</td>
                                        </tr>
                                        <tr>
                                            <th>Modèle de radio</th>
                                            <td>{{ $tetra->modelTetra->name ?? 'Non défini' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Entité dotée</th>
                                            <td>{{ $tetra->entite->name ?? 'Non défini' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Numéro d'appel</th>
                                            <td>{{ $tetra->numero_appel }}</td>
                                        </tr>
                                        <tr>
                                            <th>Security Group</th>
                                            <td>{{ $tetra->security_group }}</td>
                                        </tr>
                                        <tr>
                                            <th>Numéro de group</th>
                                            <td>{{ $tetra->numero_group }}</td>
                                        </tr>
                                        <tr>
                                            <th>Talk Group</th>
                                            <td>{{ $tetra->talk_group }}</td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="text-center mt-3"> <!-- Centrer le bouton -->
                                    <a href="{{ route('gestion_tetra.index') }}" class="btn btn-secondary">Retour à la liste</a>
                                </div>
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