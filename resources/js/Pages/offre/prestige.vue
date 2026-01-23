<template>
  <Navbar />

  <h1 class="fw-bold text-info title">
    L'offre prestige ou  VIP
  </h1>

  <div class="container">
  
    <div class="image-box">
      <img :src="images[currentImage]" alt="Salle événementielle" />
    </div>

    <div class="text-box">
      <p>
        L'offre prestige est d'organisée l'évenement de A à Z.
      </p>

      <ul>
        <li>Salle décoré selon vos théme et climatiser</li>
        <li>Tables et chaise confortable </li>
        <li>Sonorisation proffessionel</li>
        <li>Sérvice traiteur </li>
        <li>Espace de photo et essistance sur place </li>
         <li>Sérvice bonbonier et gateaux</li>
        <li>Service de nettoyage après l’évènement</li>
         <li>Voiture de location et bague pour les mariage et fiancaille  </li>
        <li> durée: 8h à 22h </li> 
      </ul>

      <h3 class="price">Prix :20 000 000 Ar</h3>

      <button class="reserve-btn" @click="reserver">
        Réserver
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import Navbar from "../../Components/Navbar.vue";

const images = [
  "../assets/images/vip.jpg",
  "../assets/images/so.jpg",
  "../assets/images/to.jpg",
  "../assets/images/sa.jpg",
  "../assets/images/bo.jpg",
  "../assets/images/wending.jpg",
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
.title {
  margin-top: 5%;
  text-align: center;
}
.container {
  display: flex;
  gap: 30px;
  padding: 30px;
  align-items: center;
}
.image-box {
  width: 50%;
}

.image-box img {
  width: 100%;
  height: 320px;
  object-fit: cover;
  border-radius: 10px;
}
.text-box {
  width: 50%;
}

.text-box ul {
  margin-top: 10px;
  padding-left: 20px;
}

.price {
  margin-top: 15px;
  color: #198754;
  font-weight: bold;
}

.reserve-btn {
  margin-top: 15px;
  padding: 10px 25px;
  background-color: #0dcaf0;
  border: none;
  color: white;
  border-radius: 5px;
  cursor: pointer;
}
</style>
