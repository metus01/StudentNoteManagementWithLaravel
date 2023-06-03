@extends('admin.base')
@section('title' , 'Création d\'une année')
@section('content')
<div class="container">
    <h1 class="text text-center">Nouvelle Année</h1>
    <form action="{{ route('admin.year.store') }}"  class="v-stack gap-2" method="POST">
        @csrf
        @include('layout.input' ,
        [
            "label" => 'Année Académique',
            "name" => 'name',
            "type" => 'text',
        ])
        @include('layout.input',
        [
            'type' => 'text',
            'label' => 'Observations',
            'name' => 'observations'
        ])
        <button class="btn btn-success container-fluid">Enrégistrer</button>
    </form>
</div>
@endsection
