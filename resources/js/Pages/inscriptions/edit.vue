<template>
  <div style="background-image:url('../../assets/images/pepe.jpg'); background-attachment: scroll; background-size: cover; padding: 2%;">
    <Navbar />

    
    <h1 class="text fs-2" style="margin-left: 15%; color: white;">GESTION DE SCOLARITER</h1>
    <h3 class="text fs-4" style="color:white; margin-top: 3%; margin-left: 20%;">Veuillez saisir vos modifications</h3>

    <form @submit.prevent="submitForm" class="row g-3 needs-validation"
          style="background: rgba(10, 9, 9, 0.5); border-radius:10%; margin-left: 25%; margin-right: 25%; padding: 2%;">
      
      <div class="col-md-8">
        <label class="fw-bolder form-label" style="color:white;">Nom:</label>
        <input type="text" class="form-control" v-model="form.nom" required />
      </div>

      <div class="col-md-4">
        <label class="fw-bolder form-label" style="color:white;">Prénom:</label>
        <input type="text" class="form-control" v-model="form.prenom" required />
      </div>

      <div class="col-md-9">
        <label class="fw-bolder form-label" style="color:white;">Adresse:</label>
        <input type="text" class="form-control" v-model="form.adresse" required />
      </div>

      <div class="col-md-3">
        <label class="fw-bolder form-label" style="color:white;">Sexe:</label>
        <select class="form-select" v-model="form.sexe" required>
          <option value="HOMME">HOMME</option>
          <option value="FEMININ">FEMININ</option>
        </select>
      </div>

      <div class="col-md-2">
        <label class="fw-bolder form-label" style="color:white;">Age:</label>
        <input type="number" class="form-control" v-model="form.age" required />
      </div>

      <div class="col-md-6">
        <label class="form-label" style="color:white;">CIN:</label>
        <input type="text" class="form-control" v-model="form.cin" required />
      </div>

      <div class="col-md-4">
        <label class="form-label" style="color:white;">Téléphone:</label>
        <input type="text" class="form-control" v-model="form.telephone" />
      </div>

      <div class="col-md-12">
        <label class="fw-bolder form-label" style="color:white;">Email:</label>
        <input type="text" class="form-control" v-model="form.email" required />
      </div>

      <div class="col-12 d-flex justify-content-between mt-3">
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
    </form>
  </div>
</template>

<script setup>
import Navbar from "../../Components/Navbar.vue";
import { useForm, router } from "@inertiajs/vue3";

const props = defineProps({
  inscription: Object
});

const form = useForm({
  nom: props.inscription.nom,
  prenom: props.inscription.prenom,
  adresse: props.inscription.adresse,
  sexe: props.inscription.sexe,
  age: props.inscription.age,
  cin: props.inscription.cin,
  telephone: props.inscription.telephone,
  email: props.inscription.email,
});

const submitForm = () => {
  form.put(`/inscriptions/${props.inscription.id}`, {
    onSuccess: () => {
      router.get(`/inscriptions/${props.inscription.id}`);
    }
  });
};
</script>

