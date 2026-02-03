<template>
  <Navbar />
<h1 style="text-align:center;margin-top:7%;">Résérvation reussie !</h1>
  <div>
    <div class="container mt-5">
      <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-header bg-primary text-white">
          Détails de la Réservation
        </div>

        <div class="card-body">
          <p><strong>Nom :</strong> {{ reservation.nom }}</p>
          <p><strong>Email :</strong> {{ reservation.email }}</p>
          <p><strong>Téléphone :</strong> {{ reservation.telephone }}</p>
          <p><strong>Nombre des personnes :</strong> {{ reservation.np }}</p>
          <p><strong>Événement :</strong> {{ reservation.type_evenement }}</p>
          <p><strong>Date :</strong> {{ reservation.date }}</p>
          <p>
            <strong>Heure :</strong>
            {{ reservation.heure_debut }} - {{ reservation.heure_fin }}
          </p>

          <!-- Boutons -->
          <div class="d-flex justify-content-between mt-4">
            <!-- MODIFIER -->
            <Link
              :href="`/reservations/${reservation.id}/edit`"
              class="btn btn-warning"
            >
              Modifier
            </Link>
            <button
              class="btn btn-danger"
              @click="supprimer"
            >
              Supprimer
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import Navbar from "../../Components/Navbar.vue";
import { Link, router } from "@inertiajs/vue3";

const props = defineProps({
  reservation: Object
});

const supprimer = () => {
  if (confirm("Voulez-vous vraiment supprimer cette réservation ?")) {
    router.delete(`/reservations/${props.reservation.id}`, {
      onSuccess: () => {
        router.get('/reservations');
      }
    });
  }
};
</script>
