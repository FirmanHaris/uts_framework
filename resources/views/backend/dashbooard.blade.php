@extends('template.apps')
@section('content')
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <h1 class="page-title fw-semibold fs-18 mb-0">Selamat Datang {{ auth()->user()->name }}</h1>
        <div class="ms-md-1 ms-0">
        </div>
    </div>
@endsection
