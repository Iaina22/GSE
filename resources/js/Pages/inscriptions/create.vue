<template>
  <div :style="bgStyle" class="min-vh-100 d-flex flex-column align-items-center pt-5">
    <div style="margin-left:-30%;">
      <h1 style="color:blue; font-size:300%;margin-left:-20%">GSE</h1>
      <h3 class="text fs-2 mb-4" style="color:black;">Veuillez saisir vos informations</h3>
    </div>

    <form @submit.prevent="submit" class="row g-3 p-4 rounded" 
          style="background: rgba(10,9,9,0.5); width:50%;" novalidate>
      
      <!-- Nom -->
      <div class="col-md-6">
        <label class="fw-bolder form-label text-white">Nom</label>
        <input type="text" v-model="form.nom" class="form-control" placeholder="RAKOTO">
        <div v-if="errors.nom" class="text-danger">{{ errors.nom }}</div>
      </div>

      <!-- Prenom -->
      <div class="col-md-6">
        <label class="fw-bolder form-label text-white">Prenom</label>
        <input type="text" v-model="form.prenom" class="form-control" placeholder="Alice">
        <div v-if="errors.prenom" class="text-danger">{{ errors.prenom }}</div>
      </div>

      <!-- Adresse -->
      <div class="col-md-12">
        <label class="fw-bolder form-label text-white">Adresse</label>
        <input type="text" v-model="form.adresse" class="form-control" placeholder="PARIS">
        <div v-if="errors.adresse" class="text-danger">{{ errors.adresse }}</div>
      </div>

      <!-- Sexe -->
      <div class="col-md-4">
        <label class="fw-bolder form-label text-white">Sexe</label>
        <select v-model="form.sexe" class="form-select">
          <option disabled value="">Choisir...</option>
          <option value="FEMININ">FEMININ</option>
          <option value="MASCULIN">MASCULIN</option>
        </select>
        <div v-if="errors.sexe" class="text-danger">{{ errors.sexe }}</div>
      </div>

      <!-- Age -->
      <div class="col-md-2">
        <label class="fw-bolder form-label text-white">Age</label>
        <input type="number" v-model="form.age" class="form-control" placeholder="10">
        <div v-if="errors.age" class="text-danger">{{ errors.age }}</div>
      </div>

      <!-- CIN -->
      <div class="col-md-6">
        <label class="form-label text-white">CIN</label>
        <input type="text" v-model="form.cin" class="form-control" placeholder="123456789">
      </div>

      <!-- Téléphone -->
      <div class="col-md-5">
        <label class="form-label text-white">Téléphone</label>
        <input type="text" v-model="form.telephone" class="form-control" placeholder="+261 32 45 678 98">
      </div>

      <!-- Email -->
      <div class="col-md-7">
        <label class="fw-bolder form-label text-white">Email</label>
        <input type="text" v-model="form.email" class="form-control" placeholder="@gmail.com">
        <div v-if="errors.email" class="text-danger">{{ errors.email }}</div>
      </div>

      <!-- Mot de passe -->
      <div class="col-md-6">
        <label class="fw-bolder form-label text-white">Mot de passe</label>
        <input type="password" v-model="form.mots_de_passe" class="form-control" placeholder="********">
        <div v-if="errors.mots_de_passe" class="text-danger">{{ errors.mots_de_passe }}</div>
      </div>

      <!-- Confirmation mot de passe -->
      <div class="col-md-6">
        <label class="fw-bolder form-label text-white">Confirmation mot de passe</label>
        <input type="password" v-model="form.mots_de_passe_confirmation" class="form-control" placeholder="********">
        <div v-if="errors.mots_de_passe_confirmation" class="text-danger">{{ errors.mots_de_passe_confirmation }}</div>
      </div>

      <!-- Submit button -->
      <div class="col-12 text-center mt-3">
        <button type="submit" class="btn btn-primary w-25">S'inscrire</button>
      </div>

    </form>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue'
import { useForm, router } from '@inertiajs/vue3'

// Formulaire InertiaJS
const form = useForm({
  nom: '', prenom: '', adresse: '', age: '', sexe: '',
  cin: '', telephone: '', email: '', mots_de_passe: '', mots_de_passe_confirmation: ''
})

// Validation frontend
const errors = reactive({})

function validate() {
  errors.nom = !form.nom ? 'Nom obligatoire' : ''
  errors.prenom = !form.prenom ? 'Prenom obligatoire' : ''
  errors.adresse = !form.adresse ? 'Adresse obligatoire' : ''
  errors.age = !form.age ? 'Age obligatoire' : ''
  errors.sexe = !form.sexe ? 'Sexe obligatoire' : ''
  errors.email = !form.email ? 'Email obligatoire' : ''
  errors.mots_de_passe = !form.mots_de_passe ? 'Mot de passe obligatoire' : ''
  errors.mots_de_passe_confirmation =
    form.mots_de_passe !== form.mots_de_passe_confirmation ? 'Mot de passe différent' : ''

  return Object.values(errors).every(e => !e)
}

// Submit form
function submit() {
  if (!validate()) return

  form.post('/inscriptions', {
    onSuccess: () => {
      router.visit('/conexion') 
    },
    onError: (err) => console.log(err)
  })
}

const bgStyle = ref({
  backgroundImage: "url('/assets/images/vi.jpg')",
  backgroundSize: 'cover',
  backgroundPosition: 'center',
  minHeight: '100vh'
})
</script>
