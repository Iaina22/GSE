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
        <div class="col-md-12">
          <label>Nom</label>
          <input v-model="form.nom" class="form-control" />
        </div>

        <div class="col-md-12 mt-2">
          <label>Email</label>
          <input v-model="form.email" type="email" class="form-control" />
        </div>

        <div v-if="errorStep1" class="alert alert-danger mt-3">
          Nom ou email non valide
        </div>
      </template>

      <!-- STEP 2 : CONTACT INFO -->
      <template v-if="step === 2">
        <div class="col-md-6">
          <label>Téléphone</label>
          <input v-model="form.telephone" class="form-control" required />
        </div>

        <div class="col-md-6">
          <label>Nombre des Personnes</label>
          <input v-model.number="form.np" type="number" min="1" class="form-control" required />
        </div>
      </template>

      <!-- STEP 3 : ÉVÉNEMENT -->
      <template v-if="step === 3">
        <div class="col-md-6">
          <label>Événement</label>
          <select v-model="form.type_evenement" class="form-select" required>
            <option disabled value="">Choisir...</option>
            <option>MARIAGE</option>
            <option>FIANCAILLE</option>
            <option>ANNIVERSAIRE</option>
            <option>BAPTEME</option>
          </select>
        </div>

        <div class="col-md-6">
          <label>Date</label>
          <input v-model="form.date" type="date" class="form-control" required />
        </div>
      </template>

      <!-- STEP 4 : HORAIRE -->
      <template v-if="step === 4">
        <div class="col-md-6">
          <label>Heure Début</label>
          <input v-model="form.heure_debut" type="time" class="form-control" required />
        </div>

        <div class="col-md-6">
          <label>Heure Fin</label>
          <input v-model="form.heure_fin" type="time" class="form-control" required />
        </div>
      </template>

      <!-- BUTTONS -->
      <div class="col-12 d-flex justify-content-between mt-4">
        <button v-if="step > 1" type="button" class="btn btn-secondary" @click="step--">
          Précédent
        </button>

        <button
          v-if="step < 4"
          type="button"
          class="btn btn-primary ms-auto"
          :disabled="!canNext"
          @click="next"
        >
          Suivant
        </button>

        <button v-if="step === 4" type="submit" class="btn btn-success ms-auto">
          Réserver
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useForm } from '@inertiajs/vue3'
import Navbar from '../../Components/Navbar.vue'

const step = ref(1)
const errorStep1 = ref(false)

const form = useForm({
  nom: '',
  email: '',
  np: '',
  telephone: '',
  type_evenement: '',
  date: '',
  heure_debut: '',
  heure_fin: ''
})

const canNext = computed(() => {
  if (step.value === 1) {
    const nomOk = form.nom.trim() !== ''
    const emailOk = form.email.trim() !== ''
    errorStep1.value = !(nomOk && emailOk)
    return nomOk && emailOk
  }

  if (step.value === 2) return form.telephone && form.np
  if (step.value === 3) return form.type_evenement && form.date
  if (step.value === 4) return form.heure_debut && form.heure_fin

  return false
})

function next() {
  if (canNext.value) {
    errorStep1.value = false
    step.value++
  }
}

function submit() {
  // Hamarina Step 1 fotsiny
  errorStep1.value = !(form.nom.trim() && form.email.trim())
  if (errorStep1.value) {
    step.value = 1
    return
  }

  // Mampiasa URL mivantana Laravel POST
  form.post('/reservations', {
    onSuccess: () => {
      alert('Réservation envoyée avec succès')
      form.reset()
      step.value = 1
      errorStep1.value = false
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
