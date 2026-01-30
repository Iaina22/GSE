<template>
  <Navbar />
<div  class="shadow p-3 mb-5 bg-body-tertiary rounded" style="margin-left:3%;margin-right:3%;">
  <h1 class="fw-bold text-info title">
    Voir toutes les matérielles disponibles
  </h1>

  <div class="container-carousel">
    <div class="carousel-left">
      <img :src="images[currentIndex].src" class="carousel-image" />

      <div class="controls">
        <button @click="prev">‹</button>
        <button @click="next">›</button>
      </div>
    </div>

    <div class="carousel-right">
      <h2>{{ images[currentIndex].title }}</h2>
      <p>{{ images[currentIndex].description }}</p>
      <button type="button" class="btn btn-success" style="width:30%;margin-left:40%;">réserver</button>
    </div>
  </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import Navbar from '../Components/Navbar.vue'

const images = ref([
  {
    src: '/assets/images/roa.jpg',
    title: 'Matériel de ciusine ',
    description: 'Assiettes,Cuillères,fourchettes,bassine,plats,conçus avec des matérieaux durable et offrant une exellente qualité '
  },
  {
    src: '/assets/images/table.jpg',
    title: 'Table',
    description: 'table de haute qualité.'
  },
  {
    src: '/assets/images/seza.jpg',
    title: 'chaise',
    description: 'chaise idéal pour les evennement.'
  },
  {
    src: '/assets/images/sono.jpg',
    title: 'Sonnorisation ',
    description: 'Des matérielle de sonnorisation le forte energie .'
  },
  {
    src: '/assets/images/efatra.jpg',
    title: 'Quelque matérieaux',
    description: 'Ds matériele difficile a prouvé.'
  },
  {
    src: '/assets/images/vitre.jpg',
    title: 'Matérielle de decoration',
    description: 'En louer les materielle de decoration du prix trop bas si vour reserver une salle .'
  }
])

const currentIndex = ref(0)

const next = () => {
  currentIndex.value = (currentIndex.value + 1) % images.value.length
}

const prev = () => {
  currentIndex.value =
    (currentIndex.value - 1 + images.value.length) % images.value.length
}
</script>

<style scoped>
.title {
  padding-top: 80px;
  margin-left: 10%;
}

.container-carousel {
  display: flex;
  width: 80%;
  margin: 20px auto;
  gap: 30px;
}

.carousel-left {
  flex: 1;
  position: relative;
}

.carousel-image {
  width: 100%;
  height: 350px;
  object-fit: cover;
  border-radius: 10px;
}

.controls {
  position: absolute;
  bottom: 15px;
  left: 50%;
  transform: translateX(-50%);
}

.controls button {
  background: #335b63ff;
  border: none;
  color: white;
  font-size: 24px;
  padding: 5px 15px;
  margin: 0 5px;
  border-radius: 50%;
  cursor: pointer;
}

.carousel-right {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.carousel-right h2 {
  color: #110df0ff;
  margin-bottom: 15px;
}

.carousel-right p {
  font-size: 18px;
}
</style>
