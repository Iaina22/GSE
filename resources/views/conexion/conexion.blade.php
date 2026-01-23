<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Documentt</title>
    <style>
        body {
            background-image: url('/assets/images/pepe.jpg'); 
            background-size: cover;
            font-family: Arial, sans-serif;
            display: flex;
            
            height: 100vh;
        }
        #mama {
            background: rgba(0,0,0,0.7);
            padding: 4%;
            border-radius: 15%;
            color: white;
            width: 25%;
            height:40%;
            margin-top:20%;
            margin-left:-18%;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin-top: 12px;
            border-radius: 5px;
            border: none;
        }
        button {
            margin-top: 30px;
            width: 100%;
            background-color: #0a23ff;
            color: white;
            padding: 15px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0517b6;
        }
        .error {
            color: #ff6666;
            margin-top: 5px;
        }
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
        <div style=" margin-top:5%;margin-left:3%;">
     <img src="assets/images/logoo.jpg" class="img-fluid" style=" width:30%; border-radius:10%;height: 100px;">
    <h1 class="text-primary " style="margin-left: 10%; font-size:250%;">Gestion salle des evenements</h1>
</div>
       <form action="{{ route('conexion.login') }}" method="POST" id="mama">
        @csrf
        
    <div class="col-md-4">
        <label for="validationCustom02" class="fw-bolder form-label" style="color:white;">Prenon:</label>
        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Alice" value="{{ old('prenom') }}" required>
        <div class="invalid-feedback">.</div>
    </div>
    @error('prenom') <div>{{ $message}}</div>@enderror

              <div class="col-md-8">
        <label for="mdp" class="fw-bolder form-label" style="color:white;">Mot de passe:</label>
        <input type="password" class="form-control" name="mots_de_passe" value="{{ old('mots_de_passe') }}" id="mdp" maxlength="8" placeholder="********" required>
        <div class="invalid-feedback"></div>
    </div>
    @error('mots_de_passe') <div>{{ $message}}</div>@enderror
            <button type="submit" style="width:38%; margin-left:28%" >Se connecter</button>
        </form>
  
</body>
</html>
