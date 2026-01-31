<template>
  <Navbar />

  <div class="container mt-5">
    <h2 class="text-center text-primary">Fiche de Réservation</h2>

    <div class="steps mb-4">
      <span v-for="n in 4" :key="n" :class="['step', { active: step >= n }]">
        {{ n }}
      </span>
    </div>

    <form @submit.prevent="submit" class="reservation-form row g-3">

      <!-- STEP 1 : USER INFO -->
      <template v-if="step === 1">
        <div class="alert alert-info">
          Nom : <strong>{{ $page.props.auth.user.name }}</strong><br>
          Email : <strong>{{ $page.props.auth.user.email }}</strong>
        </div>
      </template>

      <!-- STEP 2 -->
      <template v-if="step === 2">
        <div class="col-md-6">
          <label>Téléphone</label>
          <input v-model="form.telephone" class="form-control" />
        </div>

        <div class="col-md-6">
          <label>Nombre des Personnes</label>
          <input v-model="form.np" class="form-control" />
        </div>
      </template>

      <!-- STEP 3 -->
      <template v-if="step === 3">
        <div class="col-md-6">
          <label>Événement</label>
          <select v-model="form.type_evenement" class="form-select">
            <option disabled value="">Choisir...</option>
            <option>MARIAGE</option>
            <option>FIANCAILLE</option>
            <option>ANNIVERSAIRE</option>
            <option>BAPTEME</option>
          </select>
        </div>

        <div class="col-md-6">
          <label>Date</label>
          <input v-model="form.date" type="date" class="form-control" />
        </div>
      </template>

      <!-- STEP 4 -->
      <template v-if="step === 4">
        <div class="col-md-6">
          <label>Heure Début</label>
          <input v-model="form.heure_debut" type="time" class="form-control" />
        </div>

        <div class="col-md-6">
          <label>Heure Fin</label>
          <input v-model="form.heure_fin" type="time" class="form-control" />
        </div>
      </template>

      <!-- BUTTONS -->
      <div class="col-12 d-flex justify-content-between mt-4">
        <button v-if="step > 1" type="button" class="btn btn-secondary" @click="step--">
          Précédent
        </button>

        <button v-if="step < 4" type="button" class="btn btn-primary ms-auto" @click="step++">
          Suivant
        </button>

        <button v-if="step === 4" class="btn btn-success ms-auto">
          Réserver
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import Navbar from '../../Components/Navbar.vue'

const step = ref(1)

const form = useForm({
  np: '',
  telephone: '',
  type_evenement: '',
  date: '',
  heure_debut: '',
  heure_fin: ''
})

function submit() {
  form.post(route('reservations.store'), {
    onSuccess: () => {
      alert('Réservation envoyée avec succès')
      form.reset()
      step.value = 1
    }
  })
}
</script>

<style scoped>
.reservation-form {
  max-width: 600px;
  margin: auto;
  background: #f3f3f3;
  padding: 20px;
  border-radius: 12px;
}
.steps {
  display: flex;
  justify-content: center;
  gap: 10px;
}
.step {
  width: 35px;
  height: 35px;
  border-radius: 50%;
  background: #ccc;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
}
.step.active {
  background: #0d6efd;
  color: white;
}
</style>
