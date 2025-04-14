@extends('layouts.app')
@section('content')
<div class="layout-wrapper">


    <div class="page-content">

        <!-- ========== Topbar Start ========== -->
        @include('components.topbar')
        <!-- ========== Topbar End ========== -->

        <div class="px-3">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="py-3 py-lg-4 text-center">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <h2 class="page-title mb-0">SYSTEME</h2>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <!-- Bloc TETRA -->
                    <a href="{{ route('gestion_tetra.index') }}" class="col-xl-4 text-decoration-none">
                        <div class="card border-success border-2 rounded-4 mb-4 hover-effect">
                            <div class="card-body text-center bg-gradient-success bg-opacity-10">
                                <h4 class="card-title text-success">TETRA</h4>
                                <div class="display-4 fw-bold text-success">{{ $nombreTetras }}</div>
                            </div>
                        </div>
                    </a>

                    <!-- Bloc DMR -->
                    <a href="{{ route('gestion_dmr.index') }}" class="col-xl-4 text-decoration-none">
                        <div class="card border-warning border-2 rounded-4 mb-4 hover-effect">
                            <div class="card-body text-center bg-gradient-warning bg-opacity-10">
                                <h4 class="card-title text-warning">DMR</h4>
                                <div class="display-4 fw-bold text-warning">{{ $dmrCount }}</div>
                            </div>
                        </div>
                    </a>

                    <!-- Bloc E-lte -->
                    <a href="{{ route('elte.index') }}" class="col-xl-4 text-decoration-none">
                        <div class="card border-info border-2 rounded-4 mb-4 hover-effect">
                            <div class="card-body text-center bg-gradient-info bg-opacity-10">
                                <h4 class="card-title text-info">E-lte</h4>
                                <div class="display-4 fw-bold text-info">{{ $nombreElte }}</div>
                            </div>
                        </div>
                    </a>
                </div>


                <!-- end row -->
            </div> <!-- container -->
        </div> <!-- content -->
        <!-- Footer Start -->
        @include('components.footer')
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
@endsection


<style>
    .hover-effect:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .bg-gradient-success {
        background: linear-gradient(135deg, rgba(25, 135, 84, 0.1) 0%, rgba(25, 135, 84, 0.05) 100%);
    }

    .bg-gradient-warning {
        background: linear-gradient(135deg, rgba(255, 193, 7, 0.1) 0%, rgba(255, 193, 7, 0.05) 100%);
    }

    .bg-gradient-info {
        background: linear-gradient(135deg, rgba(13, 202, 240, 0.1) 0%, rgba(13, 202, 240, 0.05) 100%);
    }
</style>