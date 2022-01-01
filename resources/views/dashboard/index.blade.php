@extends("dashboard.layouts.DashboardLayout")

@section('container')
    <h1 class="h2">Welcome {{ auth()->user()->name }}</h1>

@endsection
