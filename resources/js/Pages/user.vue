<template>
  <Navbar />

  <h2 class="text-primary text-center fw-lighter mt-4">
    Bienvenue
  </h2>

  <div v-if="inscription">
    <div class="actions">
      <Link :href="`/inscriptions/${inscription.id}/edit`" class="btn btn-dark">
  Modifier
</Link>


      <button
        class="btn btn-danger"
        @click="deleteInscription(inscription.id)"
      >
        Supprimer
      </button>
    </div>

    <div class="profile-card">
      <h1 style="color:blue; margin-top:-5%; margin-left:30%;">BIENVENUE !</h1>
      <ul class="list-group">
        <li class="list-group-item"><strong>Nom :</strong> {{ inscription.nom }}</li>
        <li class="list-group-item"><strong>Prénom :</strong> {{ inscription.prenom }}</li>
        <li class="list-group-item"><strong>Adresse :</strong> {{ inscription.adresse }}</li>
        <li class="list-group-item"><strong>Sexe :</strong> {{ inscription.sexe }}</li>
        <li class="list-group-item"><strong>Age :</strong> {{ inscription.age }}</li>
        <li class="list-group-item"><strong>Email :</strong> {{ inscription.email }}</li>
        <li class="list-group-item"><strong>CIN :</strong> {{ inscription.cin }}</li>
        <li class="list-group-item"><strong>Téléphone :</strong> {{ inscription.telephone }}</li>
      </ul>
    </div>
  </div>

  <div v-else class="text-center mt-5 text-danger">
    Aucun utilisateur trouvé
  </div>
</template>

<script setup>
import Navbar from "../Components/Navbar.vue";
import { Link, router } from "@inertiajs/vue3";
defineProps({
  inscription: {
    type: Object,
    required: false
  }
});


const deleteInscription = (id) => {
  if (!id) return;
  if (confirm("voulez-vous supprimer vos compte?")) {
    router.delete(`/inscriptions/${id}`);
  }
};
</script>

<style scoped>
.actions {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
  margin: 20px;
}

.profile-card {
  width: 50%;
  margin: 40px auto;
  text-align: start;
  background: rgba(245, 245, 245, 0.8);
  padding: 20px;
  border-radius: 10px;
}

.profile-card h1 {
  text-align: center;
  margin-bottom: 20px;
}

.list-group-item {
  font-size: 16px;
}
</style>
