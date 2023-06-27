@extends('admin.base')
@section('title' , 'Les Liaisons')
@section('content')
<div class="container">
@if (session('success'))
{{ session('success') }}
@endif
<table class="table table-responsive table-dark">
<thead>
    <tr>
        <th>Filière</th>
        <th>Matière</th>
        <th>Crédit</th>
        <th>Masse Horaire</th>
        <th class="text-end">Actions</th>
    </tr>
    <tbody>
       @foreach ($fils->mats as $mat)
        <tr>
          {{ dd($mat) }}
        </tr>
       @endforeach
    </tbody>
</thead>
</table>
</div>
@endsection
