@extends('admin.base')
@section('title' , 'Toutes les filières')
@section('content')
<div class="container mt-4 ">
    <h1 class="text text-center">Filières</h1>
        <a href="{{ route('admin.fil.create') }}" class="btn btn-success mb-4">Créer une nouvelle filière</a>
    <table class="table table-responsive table-dark">
        <thead>
            <tr>
                <th>Nom</th>
                <th class="text text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fils as $fil)
                <tr>
                    <td>{{ $fil->name }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.fil.edit', $fil) }}" class="btn btn-primary">Editer</a>
                            <form action="{{ route('admin.fil.destroy', $fil) }}" method="post">
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
    {{ $fils->links() }}
</div>
@endsection

