@extends('admin.base')
@section('title' , 'Création d\'une filière')
@section('content')
<div class="container">
    <h1 class="text text-center">Nouvelle Filière</h1>
    <form action="{{ route('admin.fil.store') }}"  class="v-stack gap-2" method="POST">
        @csrf
        @include('layout.input' ,
        [
            "label" => 'Nom',
            "name" => 'name',
            "type" => 'text',
        ])
        <button class="btn btn-success container-fluid">Enrégistrer</button>
    </form>
</div>
@endsection
