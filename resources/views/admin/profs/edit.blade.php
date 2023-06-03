@extends('template')
@section('title' , 'Modifier')
@section('content')
<div class="container">
    <h2 class="text text-center">@yield('title')</h2>
    <form action="{{ route('admin.prof.update' , $prof) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            @include('layout.input',
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Name',
                'class' => 'col',
                'value' => $prof->name
            ])
            @include('layout.input',
            [
                'name' => 'lastname',
                'type' => 'text',
                'label' => 'Lastname',
                'class' => 'col',
                'value' => $prof->lastname
            ])
        </div>
        <div class="row">
            @include('layout.input',
            [
                'name' => 'email',
                'type' => 'email',
                'label' => 'Email',
                'class' => 'col',
                'value' => $prof->email
            ])
        </div>
        @include('layout.checkbox',[
            'label' => 'Prof ???',
            'name' => 'is_prof',
            'value' => $prof->is_prof,
            'class' => 'col m-4 '
        ])
        <button class="btn btn-primary container-fluid mt-4">Modifier</button>
    </form>
</div>
@endsection
