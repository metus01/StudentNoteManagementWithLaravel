@extends('admin.base')
@section('title' , 'Toutes les matières')
@section('content')
<div class="container mt-4 ">
    <h1 class="text text-center">Les Matières</h1>
        <a href="{{ route('admin.mat.create') }}" class="btn btn-success mb-4">Créer une nouvelle matière</a>
    <table class="table table-responsive table-dark">
        <thead>
            <tr>
                <th>Nom</th>
                <th class="text text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mats as $mat)
                <tr>
                    <td>{{ $mat->name }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.mat.edit', $mat) }}" class="btn btn-primary">Editer</a>
                            <form action="{{ route('admin.mat.destroy', $mat) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $mats->links() }}
</div>
@endsection

