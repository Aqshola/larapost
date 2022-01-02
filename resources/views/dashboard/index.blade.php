@extends("dashboard.layouts.DashboardLayout")

@section('container')
    <div class="pt-3 pb-2 mb-3 border-bottom">

        <h1 class="h2">Welcome {{ auth()->user()->name }}</h1>
    </div>

@endsection
