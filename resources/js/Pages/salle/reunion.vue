<template>
  <Navbar />

  <div class="container shadow-container" style="padding-top: 80px">
    <h1 class="text-primary fw-light text-center " style="margin-top:-5%">Salle pour la Réunion</h1>
  <button class="btn btn-info animated-btn" style="margin-top:-8%; margin-left:85%;">
    VOIR L'OFFRE
  </button>

  <div class="card mb-3" style="max-width: 700%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../../../../public/assets/images/reuni.jpg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Salle de reunion</h5>
        <p class="card-text">La salle de reunion sont aussi des capaciter sellon vos besoins
        on a des salle de reunion allant de 20 à 40 pérsonne mais la salle sont meublé dont table
        chaise,tableaux,marquere,micro et spiqeur si necessaire ,des trouce comple..</p>
        <p class="card-text"><small class="text-body-secondary">N'oubler pas qu'il y toujour les offre</small></p>
      </div>
    </div>
  </div>
</div>
  <button class="btn btn-success" style="margin-left:50%">RESERVER</button>
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
