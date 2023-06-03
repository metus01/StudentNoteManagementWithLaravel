@extends('template')
@section('title', 'Login')
@section('content')
    <div class="container">
        <h2 class="text text-center">@yield('title')</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('auth.doLogin') }}" method="post">
            @csrf
            @include('layout.input', [
                'name' => 'email',
                'type' => 'email',
                'label' => 'Email',
            ])
            @include('layout.input', [
                'name' => 'password',
                'type' => 'password',
                'label' => 'Password',
            ])
            <button class="btn btn-primary container-fluid">Login</button>
        </form>
    </div>
@endsection
