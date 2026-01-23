<template>
  <div class="container">
    <h1>{{ reservation ? 'Modifier Reservation' : 'Ajouter Reservation' }}</h1>

    <form @submit.prevent="submit" class="reservation-form">
      <div class="mb-3">
        <label>Nom</label>
        <input v-model="form.nom" class="form-control" required />
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input v-model="form.email" type="email" class="form-control" required />
      </div>
      <div class="mb-3">
        <label>CIN</label>
        <input v-model="form.cin" class="form-control" required />
      </div>
      <div class="mb-3">
        <label>Telephone</label>
        <input v-model="form.telephone" class="form-control" required />
      </div>
      <div class="mb-3">
        <label>Date</label>
        <input v-model="form.date" type="date" class="form-control" required />
      </div>
      <div class="mb-3">
        <label>Heure Début</label>
        <input v-model="form.heure_debut" type="time" class="form-control" required />
      </div>
      <div class="mb-3">
        <label>Heure Fin</label>
        <input v-model="form.heure_fin" type="time" class="form-control" required />
      </div>
      <div class="mb-3">
        <label>Type Evènement</label>
        <input v-model="form.type_evenement" class="form-control" required />
      </div>

      <button type="submit" class="btn btn-primary">{{ reservation ? 'Modifier' : 'Ajouter' }}</button>
      <Link :href="route('reservations.index')" class="btn btn-secondary ms-2">Annuler</Link>
    </form>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/inertia-vue3';

export default {
  props: {
    reservation: Object,
    inscription: Object
  },
  components: { Link },
  data() {
    return {
      form: {
        nom: this.reservation?.nom || this.inscription?.nom || '',
        email: this.reservation?.email || this.inscription?.email || '',
        cin: this.reservation?.cin || this.inscription?.cin || '',
        telephone: this.reservation?.telephone || this.inscription?.telephone || '',
        date: this.reservation?.date || '',
        heure_debut: this.reservation?.heure_debut || '',
        heure_fin: this.reservation?.heure_fin || '',
        type_evenement: this.reservation?.type_evenement || ''
      }
    }
  },
  methods: {
    submit() {
      if (this.reservation) {
        Inertia.put(route('reservations.update', this.reservation.id), this.form);
      } else {
        Inertia.post(route('reservations.store'), this.form);
      }
    }
  }
}
</script>

<style scoped>
.reservation-form {
  max-width: 500px;
  margin: 20px auto;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 8px;
  background-color: #f9f9f9;
}
.reservation-form .mb-3 label {
  font-weight: 600;
}
</style>
