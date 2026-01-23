<template>
  <Navbar />

  <div class="container shadow-container" style="padding-top: 80px">
    <h1 class="text-primary fw-light text-center " style="margin-top:-5%">Salle pour la fiancaille</h1>
  <button class="btn btn-info animated-btn" style="margin-top:-8%; margin-left:85%;">
    VOIR L'OFFRE
  </button>
    <div class="row justify-content-center">
      <div class="col-md-5 col-sm-12 text-center mb-4">
        <img src="../../../../public/assets/images/do.jpg" class="img-fluid rounded shadow" alt="" />
        <p class="mt-3">Pour la fiancailles,la cérémonie se distingue par l'organisation de la réception en 
        éxterieur.nous vous amélioré nos service afin de vous éviter toout difficulté dans la refcherche de salle.</p>
        <button class="btn btn-dark">RESERVER</button>
      </div>

      <div class="col-md-5 col-sm-12 text-center mb-4">
        <img src="../../../../public/assets/images/da.jpg" class="img-fluid rounded shadow" alt="" />
        <p class="mt-3">Il est posible de louer uniquement la salle.Alors,le matériel,la restorationet la decoration
        à votre service parcontre on a des offre si vous interessé </p>
        <button class="btn btn-dark">RESERVER</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import Navbar from '../../Components/Navbar.vue'
defineProps(['id'])
</script>

<style scoped>
.shadow-container {
  margin-top:5%;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 1);
  padding: 20px;
  border-radius: 12px;
  background-color: #ffffff; 
}
.animated-btn {
  animation: pulse 1.5s infinite; 
  transition: all 0.3s ease;
}

@keyframes pulse {
  0% {
    transform: scale(1);
    box-shadow: 0 0 0 rgba(0, 0, 0, 0);
  }
  50% {
    transform: scale(1.1); 
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.87);
  }
  100% {
    transform: scale(1);
    box-shadow: 0 0 0 rgba(0, 0, 0, 0);
  }
}
</style>
