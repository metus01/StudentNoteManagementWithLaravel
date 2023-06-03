@extends('admin.base')
@section('title' , 'Mis à jour d\'une matière')
@section('content')
<div class="container">
    <h1 class="text text-center">Modification</h1>
    <form action="{{ route('admin.mat.update' , $mat) }}"  class="v-stack gap-2" method="POST">
        @csrf
        @method('PUT')
        @include('layout.input' ,
        [
            "label" => 'Nom',
            "name" => 'name',
            "type" => 'text',
            "value" => $mat->name
        ])
        <button class="btn btn-success container-fluid">Modifier</button>
    </form>
</div>
@endsection
