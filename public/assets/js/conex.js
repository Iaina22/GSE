document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const nomInput = document.getElementById("nom");
    const mdpInput = document.getElementById("mdp");

    const nom = nomInput.value.trim();
    const mdp = mdpInput.value;

    // Récupérer les infos stockées (par exemple après inscription)
    const nomInscription = localStorage.getItem("nomInput");
    const mdpInscription = localStorage.getItem("mdpInput");

    let valide = true;

    // Vérifier nom
    if (nom !== nomInscription) {
        nomInput.classList.add("is-invalid");
        nomInput.classList.remove("is-valid");
        valide = false;
    } else {
        nomInput.classList.remove("is-invalid");
        nomInput.classList.add("is-valid");
    }

    // Vérifier mot de passe
    if (mdp !== mdp) {
        mdpInput.classList.add("is-invalid");
        mdpInput.classList.remove("is-valid");
        valide = false;
    } else {
        mdpInput.classList.remove("is-invalid");
        mdpInput.classList.add("is-valid");
    }

    // Redirection
    if (valide) {
        window.location.href = "bienvenue.blade.php";
    }
});
