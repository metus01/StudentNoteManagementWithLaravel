@extends('admin.base')
@section('title' , 'Modification du lien')
@section('content')
<div class="container">
    <h1 class="text text-center">@yield('title')</h1>
    <form action="{{ route('admin.link.update' , $link) }}" method="post">
        <div class="text">
                <h5>{{  $link->getFilName() }}-{{ $link->getMatName() }}</h5>
        </div>
         @csrf
    @method('PUT')
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
        'class' => 'col',
        'label' => 'credit',
        'name' => 'credit',
        'value' => $link->credit
    ])
    @include('layout.input',
    [
        'type' => 'number',
        'class' => 'col',
        'label' => 'masse_horaire',
        'name' => 'masse_horaire',
        'value' => $link->masse_horaire
    ])
    <button class="btn btn-primary">Valider</button>
    </div>

    </form>
</div>
@endsection
