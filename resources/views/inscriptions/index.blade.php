@extends('layouts.app')

@section('content')

<h2>Liste des inscriptions</h2>

<a href="{{ route('inscriptions.create') }}">Nouvelle inscription</a>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>

    @foreach($inscriptions as $i)
    <tr>
        <td>{{ $i->id }}</td>
        <td>{{ $i->nom }}</td>
        <td>{{ $i->prenom }}</td>
        <td>{{ $i->email }}</td>
        <td>
            <a href="{{ route('inscriptions.show', $i->id) }}">Voir</a>
            <a href="{{ route('inscriptions.edit', $i->id) }}">Editer</a>

            <form action="{{ route('inscriptions.destroy', $i->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection
