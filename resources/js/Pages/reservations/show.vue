<template>
  <Navbar />

  <div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
      <div class="card-header bg-primary text-white">
        Détails de la Réservation
      </div>

      <div class="card-body">
        <p><strong>Nom :</strong> {{ reservation.nom }}</p>
        <p><strong>Email :</strong> {{ reservation.email }}</p>
        <p><strong>Téléphone :</strong> {{ reservation.telephone }}</p>
        <p><strong>NP :</strong> {{ reservation.np }}</p>
        <p><strong>Événement :</strong> {{ reservation.type_evenement }}</p>
        <p><strong>Date :</strong> {{ reservation.date }}</p>
        <p>
          <strong>Heure :</strong>
          {{ reservation.heure_debut }} - {{ reservation.heure_fin }}
        </p>

        <a href="/reservations" class="btn btn-secondary w-100 mt-3">
          Retour
        </a>
      </div>
    </div>
  </div>
</template>

<script setup>
import Navbar from "../../Components/Navbar.vue";

defineProps({
  reservation: Object
})
</script>
