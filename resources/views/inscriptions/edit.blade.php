

<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/CSS/bootstrap.min.css">
</head>
<body style="background-image:url('../../assets/images/pepe.jpg'); background-attachment: scroll; background-size: cover; ">
    
    <img src="../../assets/images/logoo.jpg" class="img-fluid "  style="height: 100px;margin-left: 3%; ">
          <h1 class="text fs-2" style="margin-left: 15%; color: white; " >GESTION DE SCOLARITER</h1>
        <h3 class="text fs-4 " style="  color:white;margin-top: 3%; margin-left: 20%;">velliez saissiser vos modification</h3>  
            
        <form action="{{ route('inscriptions.update', $inscription->id) }}"  method="POST" class="row g-3 needs-validation" style="background-attachment: scroll; 
        background: rgba(10, 9, 9, 0.5);border-radius:10%;
         margin-left: 25%; margin-right: 25%; padding-left: 2%;padding-right:2%;" novalidate>
    @csrf
     @method('PUT')

    <div class="col-md-8">
        <label for="validationCustom01" class="fw-bolder form-label" style="color:white;">Non:</label>
        <input type="text" class="form-control" name="nom" id="nom" placeholder="RAKOTO" value="{{ $inscription->nom }}" required>
       
    </div>
   

    <div class="col-md-4">
        <label for="validationCustom02" class="fw-bolder form-label" style="color:white;">Prenon:</label>
        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Alice" value="{{ $inscription->prenom }}" required>
        <div class="invalid-feedback">veillez entrez votre prénom.</div>
    </div>
    <div class="col-md-9">
        <label for="validationCustomUsername" class="fw-bolder form-label" style="color:white;">Adresse:</label>
        <div class="input-group has-validation">
            <input type="text" class="form-control" name="adresse" value="{{ $inscription->adresse }}" placeholder="PARIS" id="adresse" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">champ obligatoire!</div>
        </div>
    </div>
   

     <div class="col-md-3">
        <label for="validationCustom04" class="fw-bolder form-label" style="color:white;">Sexe:</label>
        <select class="form-select" id="validationCustom04" name="sexe" required>
            <option value="HOMME" {{ $inscription->sexe == 'HOMME' ? 'selected' : '' }}>HOMME</option>
        <option value="FEMININ" {{ $inscription->sexe == 'FEMININ' ? 'selected' : '' }}>FEMININ</option>
        </select>
    </div>
    


    <div class="col-md-2">
        <label for="validationCustom03" class="fw-bolder form-label" style="color:white;">Age:</label>
        <input type="number" class="form-control" name="age" value="{{ $inscription->age }}" placeholder="10ans" id="validationCustom03" required>
    
    </div>   
            <div class="col-md-6">
                <label class="form-label" style="color:white;">CIN :</label>
                <input type="text" name="cin" class="form-control @error('cin') is-invalid @enderror"
                       value="{{ $inscription->cin }}" placeholder="123 456 789 098">
                @error('cin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

     <div class="col-md-4">
                <label class="form-label" style="color:white;">Téléphone :</label>
                <input type="text" name="telephone" class="form-control @error('telephone') is-invalid @enderror"
                       value="{{ $inscription->telephone }}" laceholder="+261 32 45 678 98">
            </div>
    <div class="col-md-12">
        <label for="validationCustom05" class="fw-bolder form-label" style="color:white;">Email</label>
        <input type="text" class="form-control" name="email" value="{{ $inscription->email}}" placeholder="@gmail.com" id="validationCustom05" required>
    </div>
     <div class="col-md-8">
        <label for="mdp" class="fw-bolder form-label" style="color:white;">Mot de passe:</label>
        <input type="password" class="form-control" name="mots_de_passe" value="{{ $inscription->mots_de_passe}" id="mdp" maxlength="8" placeholder="********" required>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary" style="width: 20%; margin-left: 45%; margin-top: 5%; margin-bottom: 5%;" id="en">
            Modifier
        </button>
    </div>
</form>

     
        <script src="../assets/js/jquery-3.7.1.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
      <script  src="../assets/js/inscri.js"></script>
</body>

</html>

