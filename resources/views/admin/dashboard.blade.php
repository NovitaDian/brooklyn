@extends('admin.layout')

@section('content')

<div class="container-fluid py-4">

    <h3 class="mb-4 fw-bold">Dashboard Admin</h3>

    {{-- STAT CARDS --}}
    <div class="row g-4">

        <div class="col-md-3">
            <div class="dash-card">
                <span>Total Unit Terjual</span>
                <h2>{{ $totalUnit }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dash-card success">
                <span>Dijual</span>
                <h2>{{ $dijual }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dash-card warning">
                <span>Booked</span>
                <h2>{{ $booked }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dash-card primary">
                <span>Build</span>
                <h2>{{ $build }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dash-card danger">
                <span>Dihuni</span>
                <h2>{{ $dihuni }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dash-card dark">
                <span>Total Tipe Unit</span>
                <h2>{{ $totalType }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dash-card info">
                <span>Total FAQ</span>
                <h2>{{ $totalFaq }}</h2>
            </div>
        </div>

    </div>

    {{-- QUICK MENU --}}
    <div class="mt-5">
        <h5 class="mb-3">Menu Cepat</h5>
        <div class="row g-3">

            <div class="col-md-3">
                <a href="{{ route('admin.units.index') }}" class="quick-menu">
                    <i class="fa fa-home"></i>
                    Kelola Unit
                </a>
            </div>


            <div class="col-md-3">
                <a href="{{ route('faq.index') }}" class="quick-menu">
                    <i class="fa fa-question-circle"></i>
                    FAQ
                </a>
            </div>

            <div class="col-md-3">
                <a href="{{ route('siteplan.index') }}" class="quick-menu">
                    <i class="fa fa-map"></i>
                    Siteplan
                </a>
            </div>

        </div>
    </div>

</div>

@endsection
