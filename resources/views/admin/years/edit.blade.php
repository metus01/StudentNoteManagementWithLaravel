@extends('admin.base')
@section('title' , 'Mis à jour d\'une année')
@section('content')
<div class="container">
    <h1 class="text text-center">Nouvelle Année</h1>
    <form action="{{ route('admin.year.update' , $year) }}"  class="v-stack gap-2" method="POST">
        @csrf
        @method('PUT')
        @include('layout.input' ,
        [
            "label" => 'Année Académique',
            "name" => 'name',
            "type" => 'text',
            "value" => $year->year
        ])
        @include('layout.input' ,
        [
            "label" => 'Nom',
            "name" => 'observations',
            "type" => 'text',
            "value" => $year->observations
        ])
        <button class="btn btn-success container-fluid">Modifier</button>
    </form>
</div>
@endsection
