@extends('layouts.app')
@section('content')
<div class="layout-wrapper">



    <div class="page-content">

        @include('components.topbar')

        <div class="px-3">

            <!-- Start Content-->
            <div class="container-fluid">


                <div class="row">

                @livewire('configuration')
                </div>
                
                <!-- end row -->
            </div> <!-- container -->
        </div> <!-- content -->
        <!-- Footer Start -->
        @include('components.footer')
    </div>
</div>
@endsection