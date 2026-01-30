<template>
  <Navbar />

  <div class="container mt-5">
    <h3 class="text-center text-primary mb-4">
      Modifier la Réservation
    </h3>

    <form @submit.prevent="submit" class="reservation-form row g-3">

      <div class="col-md-6">
        <label>Nom</label>
        <input v-model="form.nom" class="form-control" />
        <div v-if="form.errors.nom" class="text-danger">
          {{ form.errors.nom }}
        </div>
      </div>

      <div class="col-md-6">
        <label>Email</label>
        <input v-model="form.email" type="email" class="form-control" />
        <div v-if="form.errors.email" class="text-danger">
          {{ form.errors.email }}
        </div>
      </div>

      <div class="col-md-6">
        <label>NP</label>
        <input v-model="form.np" class="form-control" />
        <div v-if="form.errors.np" class="text-danger">
          {{ form.errors.np }}
        </div>
      </div>

      <div class="col-md-6">
        <label>Téléphone</label>
        <input v-model="form.telephone" class="form-control" />
        <div v-if="form.errors.telephone" class="text-danger">
          {{ form.errors.telephone }}
        </div>
      </div>

      <div class="col-md-6">
        <label>Événement</label>
        <select v-model="form.type_evenement" class="form-select">
          <option disabled value="">Choisir...</option>
          <option>MARIAGE</option>
          <option>FIANCAILLE</option>
          <option>ANNIVERSAIRE</option>
          <option>BAPTEME</option>
          <option>REUNION</option>
        </select>
        <div v-if="form.errors.type_evenement" class="text-danger">
          {{ form.errors.type_evenement }}
        </div>
      </div>

      <div class="col-md-6">
        <label>Date</label>
        <input v-model="form.date" type="date" class="form-control" />
        <div v-if="form.errors.date" class="text-danger">
          {{ form.errors.date }}
        </div>
      </div>

      <div class="col-md-6">
        <label>Heure Début</label>
        <input v-model="form.heure_debut" type="time" class="form-control" />
        <div v-if="form.errors.heure_debut" class="text-danger">
          {{ form.errors.heure_debut }}
        </div>
      </div>

      <div class="col-md-6">
        <label>Heure Fin</label>
        <input v-model="form.heure_fin" type="time" class="form-control" />
        <div v-if="form.errors.heure_fin" class="text-danger">
          {{ form.errors.heure_fin }}
        </div>
      </div>

      <div class="col-12 text-center mt-4">
        <button class="btn btn-success w-50" :disabled="form.processing">
          Mettre à jour
        </button>
      </div>

    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import Navbar from "../../Components/Navbar.vue";

const props = defineProps({
  reservation: Object
})

const form = useForm({
  nom: props.reservation.nom,
  email: props.reservation.email,
  np: props.reservation.np,
  telephone: props.reservation.telephone,
  date: props.reservation.date,
  heure_debut: props.reservation.heure_debut,
  heure_fin: props.reservation.heure_fin,
  type_evenement: props.reservation.type_evenement,
})

function submit() {
  form.put(`/reservations/${props.reservation.id}`)
}
</script>

<style scoped>
.reservation-form {
  max-width: 650px;
  margin: auto;
  background: #f4f4f4;
  padding: 25px;
  border-radius: 12px;
}
label {
  font-weight: 600;
}
</style>
