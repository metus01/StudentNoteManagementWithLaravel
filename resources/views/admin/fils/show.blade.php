@extends('admin.base')
@section('title' , $fil->name)
@section('content')
<div class="container">
    @if (session('success'))
    {{ session('success') }}
    @endif
    <h1 class="text text-center " style="font-size: 2rem">{{  $fil->name }}</h1>
    <table class="table table-responsive table-dark">
        <thead>
            <tr>
                <th>Matière</th>
                <th>Crédit</th>
                <th>Masse Horaire</th>
                <th class="text text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($links as $link)
                <tr>
                    <td>{{ $link->getMatName() }}</td>
                    <td>{{ $link->credit }}</td>
                    <td>{{ $link->masse_horaire }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.link.edit', $link) }}" class="btn btn-secondary">Editer</a>
                            <form action="{{ route('admin.link.destroy', $link) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
