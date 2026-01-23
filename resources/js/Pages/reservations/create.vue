<template>
  <Navbar />

  <div class="container" style="margin-top:5%;">
    <h1 style="margin-left:30%; color:blue;">Fiche de Résèrvation</h1>

    <form @submit.prevent="submit" class="reservation-form row g-3 p-1 rounded">

      <div class="col-md-12 mb-3">
        <label>Nom</label>
        <input v-model="form.nom" class="form-control" />
        <div v-if="form.errors.nom" class="text-danger">
          {{ form.errors.nom }}
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <label>Email</label>
        <input v-model="form.email" type="email" class="form-control" />
        <div v-if="form.errors.email" class="text-danger">
          {{ form.errors.email }}
        </div>
      </div>

      <!-- CIN -->
      <div class="col-md-6 mb-3">
        <label>CIN</label>
        <input v-model="form.cin" class="form-control" />
        <div v-if="form.errors.cin" class="text-danger">
          {{ form.errors.cin }}
        </div>
      </div>

      <!-- Téléphone -->
      <div class="col-md-12 mb-3">
        <label>Téléphone</label>
        <input v-model="form.telephone" class="form-control" />
        <div v-if="form.errors.telephone" class="text-danger">
          {{ form.errors.telephone }}
        </div>
      </div>

      <div class="col-md-12 mb-3">
        <label>Événement</label>
        <select v-model="form.type_evenement" class="form-select">
          <option disabled value="">Choisir...</option>
          <option value="MARIAGE">MARIAGE</option>
          <option value="FIANCAILLE">FIANCAILLE</option>
          <option value="ANNIVERSAIRE">ANNIVERSAIRE</option>
          <option value="BAPTEME">BAPTEME</option>
          <option value="REUNION">REUNION</option>
          <option value="FETE PRIVEE">FETE PRIVEE</option>
        </select>
        <div v-if="form.errors.type_evenement" class="text-danger">
          {{ form.errors.type_evenement }}
        </div>
      </div>

    
      <div class="col-md-4 mb-3">
        <label>Date</label>
        <input v-model="form.date" type="date" class="form-control" />
        <div v-if="form.errors.date" class="text-danger">
          {{ form.errors.date }}
        </div>
      </div>

     
      <div class="col-md-4 mb-3">
        <label>Heure Début</label>
        <input v-model="form.heure_debut" type="time" class="form-control" />
        <div v-if="form.errors.heure_debut" class="text-danger">
          {{ form.errors.heure_debut }}
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <label>Heure Fin</label>
        <input v-model="form.heure_fin" type="time" class="form-control" />
        <div v-if="form.errors.heure_fin" class="text-danger">
          {{ form.errors.heure_fin }}
        </div>
      </div>

      <div class="col-md-12">
        <button class="btn btn-primary w-50" style="margin-left:20%;" :disabled="form.processing">
            Résérver
        </button>
      </div>

    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import Navbar from "../../Components/Navbar.vue";

const props = defineProps({
  reservation: Object,
  inscription: Object
})


const form = useForm({
  nom: props.reservation?.nom || props.inscription?.nom || '',
  email: props.reservation?.email || props.inscription?.email || '',
  cin: props.reservation?.cin || props.inscription?.cin || '',
  telephone: props.reservation?.telephone || props.inscription?.telephone || '',
  date: props.reservation?.date || '',
  heure_debut: props.reservation?.heure_debut || '',
  heure_fin: props.reservation?.heure_fin || '',
  type_evenement: props.reservation?.type_evenement || ''
})


function submit() {
  if (props.reservation) {
    form.put(`/reservations/${props.reservation.id}`, {
      onSuccess: () => {
        alert('Réservation mise à jour avec succès !');
      },
      onError: () => {
        alert('Erreur lors de la mise à jour.');
      }
    })
  } else {
    form.post('/reservations', {
      onSuccess: () => {
        alert('Réservation envoyée avec succès !');
        form.reset(); 
      },
      onError: () => {
        alert('Erreur lors de l\'envoi de la réservation.');
      }
    })
  }
}
</script>

<style scoped>
.reservation-form {
  max-width: 500px;
  margin: 20px auto;
  background: rgba(211, 177, 115, 0.99);
  border-radius: 15px;
  padding: 20px;
}
label {
  font-weight: 600;
}
</style>
