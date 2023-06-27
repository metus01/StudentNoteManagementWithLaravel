@extends('admin.base')

@section('title' , 'Une nouvelle liaison')
@section('content')
<div class="container mt-4">
    <form action="{{ route('admin.link.store') }}" method="post">
    @csrf
    <div class="row">
        @include('layout.select',
    [
        'label' => 'Filière',
        'options' => $fils,
        'name'=> 'fil',
        'class' => 'col',
        'value' => $fils->pluck('id')
    ])
    @include('layout.select',
    [
        'label' => 'Matières',
        'options' => $mats,
        'name' => 'mat',
        'class' => 'col',
        'value' => $mats->pluck('id')
    ])
    </div>
    <div class="row">
        @include('layout.input',
        [
            'type' => 'number',
            'label' => 'Crédit',
            'name' =>  'credit',
            'class' => 'col'
        ])
         @include('layout.input',
         [
             'type' => 'number',
             'label' => 'Masse Horaire',
             'name' =>  'masse_horaire',
             'class' => 'col'
         ])
    </div>
    @include('layout.input',
         [
             'type' => 'text',
             'label' => 'Observation',
             'name' =>  'observations',
             'class' => 'col'
         ])
    <button class="btn btn-success">Lier</button>
    </form>
</div>
@endsection
