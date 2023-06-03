@extends('admin.base')
@section('title' , 'Mis à jour d\'une filière')
@section('content')
<div class="container">
    <h1 class="text text-center">Nouvelle Filière</h1>
    <form action="{{ route('admin.fil.update' , $fil) }}"  class="v-stack gap-2" method="POST">
        @csrf
        @method('PUT')
        @include('layout.input' ,
        [
            "label" => 'Nom',
            "name" => 'name',
            "type" => 'text',
            "value" => $fil->name
        ])
        <button class="btn btn-success container-fluid">Modifier</button>
    </form>
</div>
@endsection
