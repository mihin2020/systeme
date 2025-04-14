@extends('layouts.app')
@section('content')
<div class="layout-wrapper">



    <div class="page-content">

        @include('components.topbar')

        <div class="px-3">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row mt-4">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="col-12">
                        <div class="card">
                            
                            <div class="card-body">

                                <h4 class="header-title">Liste des Utilisateurs</h4>


                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Nom</th>
                                            <th>Prénom(s)</th>
                                            <th>Rôle</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->firstname }}</td>
                                            <td>{{ $user->lastname }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                @if ($user->statut == true)
                                                <span class="badge bg-success">Actif</span>
                                                @else
                                                <span class="badge bg-danger">Inactif</span>
                                                @endif
                                            </td>

                                            <td class="d-flex mx-2">
                                                @if ($user->statut == true)
                                                <a href="{{ route('configuration.desactiver', $user->id) }}" class="btn btn-warning btn-sm mx-2">
                                                    Désactiver
                                                </a>
                                                @else
                                                <a href="{{ route('configuration.activer', $user->id) }}" class="btn btn-success btn-sm mx-2">
                                                    Activer
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                            </div> <!-- end card body-->
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