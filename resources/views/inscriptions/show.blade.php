@extends('layouts.navbar')

@section('content')
<h2 class="text-primary active text-center fw-lighter">Bienvenue</h2>
<div style="margin-left:80%">
<div class="container">
<div class="mt-3 d-flex align-items-center gap-2">
<a href="{{ route('inscriptions.index') }}" class="btn btn-secondary">Retour</a>

<div class="dropdown">
<button class="btn btn-info dropdown-toggle" type="button" id="dropdownParam" data-bs-toggle="dropdown" aria-expanded="false">
<i class="bi bi-gear-fill"></i> Paramètres
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownParam">

<li>
    <a class="dropdown-item" href="{{ route('inscriptions.edit', $inscription->id) }}">
        <i class="bi bi-pencil-fill"></i> Modifier
    </a>
</li>
<li>
    <form action="{{ route('inscriptions.destroy', $inscription->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet enregistrement ?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="dropdown-item text-danger">
            <i class="bi bi-trash-fill"></i> Supprimer
        </button>
    </form>
</li>

<li><hr class="dropdown-divider"></li>


</ul>
</div>
</div>
</div>
</div>
<div class=" border-primary" style=" margin-left:25%;width:50%;">
    <img src="../../assets/images/use.jpg" style="margin-top:-10%; width:25%;margin-left:35%;" >
<ul class="list-group ">
<li class="list-group-item"><strong>Nom :</strong> {{ $inscription->nom }}</li>
<li class="list-group-item"><strong>Prénom :</strong> {{ $inscription->prenom }}</li>
<li class="list-group-item"><strong>Adresse :</strong> {{ $inscription->adresse }}</li>
<li class="list-group-item"><strong>Sexe :</strong> {{ $inscription->sexe }}</li>
<li class="list-group-item"><strong>Age :</strong> {{ $inscription->age }}</li>
<li class="list-group-item"><strong>Email :</strong> {{ $inscription->email }}</li>
<li class="list-group-item"><strong>CIN :</strong> {{ $inscription->cin }}</li>
<li class="list-group-item"><strong>Téléphone :</strong> {{ $inscription->telephone }}</li>
</ul>
<button type="button" class="btn mt-3 btn-primary" style="margin-left:35%">NEXT</button>
</div>


@endsection
