@extends('template')
@section('title' , 'Register')
@section('content')
<div class="container">
    <h2 class="text text-center">@yield('title')</h2>
    <form action="{{ route('auth.doRegister') }}" method="post">
        @csrf
        <div class="row">
            @include('layout.input',
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Name',
                'class' => 'col'
            ])
            @include('layout.input',
            [
                'name' => 'lastname',
                'type' => 'text',
                'label' => 'Lastname',
                'class' => 'col'
            ])
        </div>
        <div class="row">
            @include('layout.input',
            [
                'name' => 'email',
                'type' => 'email',
                'label' => 'Email',
                'class' => 'col'
            ])
            @include('layout.input',
            [
                'name' => 'password',
                'type' => 'password',
                'label' => 'Password',
                'class' => 'col'
            ])
        </div>

        <div class="container row d-flex">
            @include('layout.select', [
                'name' => 'fil',
                'label' => 'Filière',
                'value' => $fils->pluck('id'),
                'options' => $fils,
                'class' => 'col'
            ])
             @include('layout.select', [
                'name' => 'year',
                'label' => 'Année Académique',
                'value' => $years->pluck('id'),
                'options' => $years,
                'class' => 'col'
            ])
        </div>
        @include('layout.checkbox',[
            'label' => 'Prof ???',
            'name' => 'is_prof',
            'value' => false,
            'class' => 'col m-4 '
        ])
        <button class="btn btn-primary container-fluid mt-4">Register</button>
    </form>
</div>
@endsection
