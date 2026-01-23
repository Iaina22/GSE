<template>
  <Navbar />

  <h1 class="fw-bold text-info title" style="margin-top:5%; text-align:center;">
    L'offre "salle en plain air"
  </h1>

  <div class="container">
    <div class="left">
      <p>
        L'offre préstige ou VIP est une offre pour des grande féte ,soirée comme mariage.
      </p>

      <ul>
        <li>jardin propre et climatiséé(théme choisie)</li>
        <li>Tables et chaises décoration exterieur</li>
        <li>Sonorisation compleé</li>
        <li> Sécurité et parcking</li>
        <li>Eclairage exterieur(guirlend ,lampions) </li>
        <li>Service de gateaux et bonboniert</li>
        <li>Service de nettoyage après l’évènement</li>
        <li>Durée : de 8h à 18h </li>
      </ul>

      <h3 class="text-info">Prix : 8 000 000 Ar </h3>
      <h3 class="text-info">+DJ : + 500 000 Ar </h3>

      <button class="reserve-btn" @click="reserver">
        Réserver
      </button>
    </div>

   
    <div class="right">
      <img :src="images[currentImage]" alt="Salle événementielle" />
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import Navbar from "../../Components/Navbar.vue";

defineProps(["id"]);

const images = [
  "../assets/images/mi.jpeg",
  "../assets/images/son.jpg",
  "../assets/images/gat.jpg",
  "../assets/images/do.jpg",
  "../assets/images/ima.jpeg",
];

const currentImage = ref(0);

onMounted(() => {
  setInterval(() => {
    currentImage.value =
      (currentImage.value + 1) % images.length;
  }, 1500);
});

const reserver = () => {
  alert("Réservation en cours...");
};
</script>

<style scoped>
.container {
  display: flex;
  gap: 30px;
  padding: 30px;
}

.left {
  width: 50%;
}

.left ul {
  margin-top: 10px;
  padding-left: 20px;
}

.reserve-btn {
  margin-top: 15px;
  padding: 10px 25px;
  background-color: #0df064ff;
  border: none;
  color: white;
  border-radius: 5px;
  cursor: pointer;
}
.right {
  width: 50%;
}

.right img {
  width: 100%;
  height: 300px;
  object-fit: cover;
  border-radius: 10px;
}
</style>
