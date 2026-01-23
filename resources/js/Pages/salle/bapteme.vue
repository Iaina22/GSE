<template>
  <Navbar />

  <div class="container shadow-container" style="padding-top: 80px">
    <h1 class="text-primary fw-light text-center " style="margin-top:-5%">Salle pour le Bapteme ou Anniverssaire</h1>
  <button class="btn btn-info animated-btn" style="margin-top:-8%; margin-left:85%;">
    VOIR L'OFFRE
  </button>
  <div style="display:flex; ">
  <div class="card" style="width:40%; margin-left:5%;">
  <img src="../../../../public/assets/images/ba.jpeg" class="card-img-top"   style="height:65%;"alt="...">
  <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
     <button class="btn btn-success">RESERVER</button>
  </div>
</div>
 <div class="card" style="width:40%; margin-left:5%;">
  <img src="../../../../public/assets/images/annif.jpg" class="card-img-top" style="height:65%;" alt="...">
  <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
   <button class="btn btn-success">RESERVER</button>
  </div>
  
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
  animation: pulse 1.5s infinite; /* animation mandeha foana, 1.5 segondra isaky ny cycle */
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
