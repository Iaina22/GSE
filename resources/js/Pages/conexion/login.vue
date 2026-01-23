<template>
  <div class="login-container">
   <h1 style="margin-left:20%;padding-top:5%;color:black;font-size:300%;font-bold:10%;">GSE</h1>
   <h3 style="margin-left:25%;padding-top:1%;color:white;font-size:200%;font-bold:10%;">Gestion des salle des evenements</h3>
    <form @submit.prevent="login" class="login-box">
      <div class="mb-3">
        <label>Prénom</label>
        <input
          type="text"
          v-model="form.prenom"
          class="form-control"
          placeholder="Alice"
        />
        <div v-if="form.errors.prenom" class="error">
          {{ form.errors.prenom }}
        </div>
      </div>
      <div class="mb-3">
        <label>Mot de passe</label>
        <input
          type="password"
          v-model="form.mots_de_passe"
          class="form-control"
          placeholder="********"
        />
        <div v-if="form.errors.mots_de_passe" class="error">
          {{ form.errors.mots_de_passe }}
        </div>
      </div>

      <button type="submit" :disabled="form.processing">
        Se connecter
      </button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  prenom: '',
  mots_de_passe: ''
})

const login = () => {
  console.log('CLICKED')

  form.post('/login', {
    onSuccess: () => {
      console.log('LOGIN SUCCESS')
    },
    onError: (errors) => {
      console.log('LOGIN ERROR', errors)
    }
  })
}
</script>

<style scoped>
.login-container {
  background-image: url('/assets/images/pepe.jpg');
  background-size: cover;
  height: 100vh;
  
  justify-content: center;
  align-items: center;
}

.login-box {
  background: rgba(0, 0, 0, 0.7);
  padding: 50px;
  width: 350px;
  border-radius: 10px;
  color: white;
  margin-left:35%;
}


button {
  width: 100%;
  background: blue;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 5px;
}

.error {
  color: red;
  font-size: 14px;
}
</style>
