<template>
  <div style="padding-top: 60px;">
    <Navbar />

    <div class="container  pt-5">
      <h2 class="text-center text-primary mb-4">Modification de Réservation</h2>

      <form @submit.prevent="submitForm" class="reservation-form row g-3">
        <div class="col-md-12">
          <label>Nom</label>
          <input v-model="form.nom" class="form-control" required />
        </div>

        <div class="col-md-12 mt-2">
          <label>Email</label>
          <input v-model="form.email" type="email" class="form-control" required />
        </div>

        <div class="col-md-6 mt-2">
          <label>Téléphone</label>
          <input v-model="form.telephone" class="form-control" required />
        </div>

        <div class="col-md-6 mt-2">
          <label>Nombre des Personnes</label>
          <input v-model.number="form.np" type="number" min="1" class="form-control" required />
        </div>

        <div class="col-md-6 mt-2">
          <label>Événement</label>
          <select v-model="form.type_evenement" class="form-select" required>
            <option disabled value="">Choisir...</option>
            <option>MARIAGE</option>
            <option>FIANCAILLE</option>
            <option>ANNIVERSAIRE</option>
            <option>BAPTEME</option>
            <option>REUNION</option>
          </select>
        </div>

        <div class="col-md-6 mt-2">
          <label>Date</label>
          <input v-model="form.date" type="date" class="form-control" required />
        </div>

        <div class="col-md-6 mt-2">
          <label>Heure Début</label>
          <input v-model="form.heure_debut" type="time" class="form-control" required />
        </div>

        <div class="col-md-6 mt-2">
          <label>Heure Fin</label>
          <input v-model="form.heure_fin" type="time" class="form-control" required />
        </div>

        <div class="col-12 mt-4">
          <button type="submit" class="btn btn-success w-100" :disabled="updating">
            <span v-if="updating" class="spinner-border spinner-border-sm me-2" role="status"></span>
            {{ updating ? 'Mise à jour...' : 'Mettre à jour' }}
          </button>
        </div>

        <div v-if="errorMessage" class="alert alert-danger mt-3">{{ errorMessage }}</div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue'
import { useForm, router } from '@inertiajs/vue3'
import Navbar from '../../Components/Navbar.vue'
 

const props = defineProps({
  reservation: Object
})

const form = useForm({
  ...props.reservation,
  _method: 'put' 
})

const updating = ref(false)
const errorMessage = ref('')

const submitForm = () => {
  updating.value = true
  errorMessage.value = ''

  form.post(`/reservations/${props.reservation.id}`, {
    preserveScroll: true, 
    onSuccess: () => {
      updating.value = false

      router.get(`/reservations/${props.reservation.id}`, { preserveState: true })
    },
    onError: (errors) => {
      updating.value = false
      errorMessage.value = errors?.message || 'Erreur lors de la mise à jour'
    }
  })
}
</script>

<style scoped>
.reservation-form {
  max-width: 600px;
  margin: auto;
  padding: 25px;
  background: #296bada9;
  border-radius: 12px;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.fixed-top {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1030;
}
</style>
