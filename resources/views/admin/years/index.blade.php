@extends('admin.base')
@section('title' , 'Toutes les années')
@section('content')
<div class="container mt-4 ">
        <a href="{{ route('admin.year.create') }}" class="btn btn-success mb-4">Créer une nouvelle année</a>
    <table class="table table-responsive table-dark">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Observations</th>
                <th class="text text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($years as $year)
                <tr>
                    <td>{{ $year->name}}</td>
                    <td>{{ $year->observations}}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.year.edit', $year) }}" class="btn btn-primary">Editer</a>
                            <form action="{{ route('admin.year.destroy', $year) }}" method="post">
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
    {{ $years->links() }}
</div>
@endsection

