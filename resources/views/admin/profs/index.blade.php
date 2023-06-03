@extends('admin.base')
@section('title' , 'Tous les profs')
@section('content')
<div class="container mt-4">
    <h1 class="text text-center">Nos Profs</h1>
    <table class="table table-responsive table-dark">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Filière</th>
                <th>Année</th>
                <th class="text text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profs as $prof)
                <tr>
                    <td>{{ $prof->name }}</td>
                    <td>{{ $prof->email }}</td>
                    <td>{{ $prof->fil->name}}</td>
                    <td>{{ $prof->year->name }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.prof.edit' , $prof) }}" class="btn btn-danger">Resteindre</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
 {{-- {{ $profs->links() }} --}}
</div>

@endsection
