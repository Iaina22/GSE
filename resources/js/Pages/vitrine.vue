<template>
  <nav class="navbar">
    <div class="container">
      <h1>
        <a href="#vitre" style="text-decoration:none;color:blue;">GSE</a>
      </h1>
      <ul class="menu">
        <li class="menu-item" @click="scrollTo('salle')">Salle</li>
        <li class="menu-item" @click="scrollTo('offre')">Offre</li>
        <li class="menu-item" @click="scrollTo('materiel')">Matériel</li>
        <li class="menu-item" @click="scrollTo('reservation')">Résérvation</li>
        <li class="menu-item" @click="scrollTo('contact')">Contact</li>
       <button class="btn btn-primary" @click="goToConnexion">
  Se connecter
</button>
      </ul>
    </div>
  </nav>

  <main>
    <section id="vitre" class="section vitre mt-5">
    <video
    class="bg-video"
    autoplay
    muted
    loop
    playsinline
  >
    <source src="../../../public/assets/images/vitrine.mp4" type="video/mp4" />
   
  </video>
      <div class="card-img-overlay mt-5">
        <h1 class="text-info m-5">GSE</h1>
        <h5 class="ms-5" style="width: 40vw;color:white; font-size:150%;">
          Cet application web GESTION DE SALLE DES EVENEMENT est une application 
          permet de faciliteé vos besoin de vos evenement.Nous pouvons organisez vos evenement de A à Z.
          Benéficez car GSE est facile,rapide,assurés.
        </h5>
       <button class="btn btn-dark btn-lg mt-4 ms-5" @click="goToInscription">
  S'inscrire
</button>

       
        <img src="../../../public/assets/images/envoi.png" alt="Image Envoi"
          class="image-anim mb-4"
          style="margin-left: -11%; position: absolute; margin-top: 5%; width: 50px;">

        <h1 class="text-center" style="margin-top: 9%; color:white;">
          Gérer tous les evenement avec logiciel compler.
        </h1>
      </div>
    </section>

    <section id="salle" class="section salle mt-5">
      <div
        v-for="(image, index) in images"
        :key="index"
        class="slide"
        :style="{ backgroundImage: `url(${image})` }"
        :class="{ active: currentImage === index }"
      ></div>

      <div class="text-top-left">
        <div class="dynamic-text">
          <h3 style="font-size:180%;background: rgba(0, 0, 0, 0.4);padding:1%; width:70%;">
            Vous cherchez des salles d'événement pour :
            <span class="highlight">{{ currentText }}</span>
          </h3>
        </div>
      </div>
    </section>
    
<section id="offre" class="section offre">
  <div class="container shadow-container">
    <h2 class="section-title text-center text-primary mb-4">
      Nos Offres Professionnelles
    </h2>

    <div class="offres-grid">
      <div class="offre-box">
        <h3 class="offre-title">Offre Standard</h3>
        <p class="offre-desc">
          Accès à une salle équipée avec sonorisation de base, éclairage standard et service de nettoyage inclus.
        </p>
      </div>

      <div class="offre-box">
        <h3 class="offre-title">Offre Premium</h3>
        <p class="offre-desc">
          Salle décorée, sonorisation professionnelle, éclairage coloré et espace photo pour vos souvenirs.
        </p>
      </div>

      <div class="offre-box">
        <h3 class="offre-title">Offre Plein Air</h3>
        <p class="offre-desc">
          Jardin aménagé, chapiteau, lumière extérieure et son léger pour vos événements en plein air.
        </p>
      </div>

      <div class="offre-box">
        <h3 class="offre-title">Offre Prestige</h3>
        <p class="offre-desc">
          Salle climatisée, décoration haut de gamme, effets LED et nettoyage complet pour une expérience unique.
        </p>
      </div>
    </div>
  </div>
</section>

<section id="materiel" style="margin-top:-15%" class="section materiel">
      <div class="container shadow-container">
        <div class="materiel-wrapper">
          <div class="materiel-text">
            <h2 class="text-primary">Nos Matériels</h2>
            <p style="font-size:150%">
              Nous mettons à votre disposition des matériels professionnels
              pour assurer la réussite de vos événements.Alors, si vous organisez une féte et à louer unze salle 
              on peut organisez -vos evenement de A à Z.
      
              Qualité, fiabilité et adaptabilité pour tout type d’événement.
            </p>
          </div>


          <div class="materiel-carousel">
            <img
              :src="materiels[currentMateriel].image"
              class="carousel-img"
            />
            <h5 class="mt-3">
              {{ materiels[currentMateriel].title }}
            </h5>
          </div>
        </div>
      </div>
    </section>
        <section id="reservation" style="margin-top:-15%"  class="section reservation">
      <div class="reservation-container shadow-container" >
        <img src="../../../public/assets/images/date.jpg" width="30%" >
        <div>
          <h2 class="text-info">Réservation en ligne</h2>
          <p class="description">
            Application simple, rapide et efficace pour vos événements.vous pouvez reservez vos salle de réve a partire 
            de cette application.Nos traitez vos demande dans 24H minimun.GSE rapide,assuré,facile...
          </p>
          <button class="btn btn-success btn-lg animated-btn">
            Réserver maintenant
          </button>
        </div>
      </div>
    </section>
     <section id="contact" style="margin-top:-13%" class="section contact">
      <div class="container shadow-container text-center" style="padding:5%; ">
        <h2 class="text-primary mb-4">Contact</h2>
        <p> <img src="../../../public/assets/images/phone.png" width="28%" > +261 32 34 567 89</p>
        <p> <img src="../../../public/assets/images/fb.png" width="25%" >+261 34 34 567 89</p>
        <p> <img src="../../../public/assets/images/mail.png" width="30%" > Event Group</p>
        <p class="footer-text">
          Réalisez vos rêves avec GSE
        </p>
      </div>
    </section>
  </main>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import '../../../public/assets/js/bootstrap.bundle.min.js'
import { router } from '@inertiajs/vue3'

const goToInscription = () => {
  router.visit('/inscriptions/create')
}

const goToConnexion = () => {
  router.visit('/conexion')
}




const scrollTo = (id) => {
  const section = document.getElementById(id)
  if (section) section.scrollIntoView({ behavior: 'smooth' })
}


const images = [
  '/assets/images/wind.jpg',
  '/assets/images/vodiondry.jpg',
  '/assets/images/fivorin.jpg',
  '/assets/images/batemi.jpg',
  '/assets/images/annif.jpg',
  '/assets/images/photo.jpg',
]
const currentImage = ref(0)

const texts = ['MARIAGE','FIANCAILLE','REUNION','BATEME','ANNIVERSAIRE','FETE PRIVE']
const currentIndex = ref(0)
const currentText = ref(texts[currentIndex.value])

onMounted(() => {
  setInterval(() => {
    currentImage.value = (currentImage.value + 1) % images.length
  }, 1500)

  setInterval(() => {
    currentIndex.value = (currentIndex.value + 1) % texts.length
    currentText.value = texts[currentIndex.value]
  }, 1500)
})
const materiels = [
  { title: 'Sonorisation', image: '/assets/images/son.jpg' },
  { title: 'Tables', image: '/assets/images/table.jpg' },
  { title: 'Chaises', image: '/assets/images/chaise.jpg' },
  { title: 'Décoration', image: '/assets/images/deco.jpg' }
]

const currentMateriel = ref(0)

const nextMateriel = () =>
  currentMateriel.value =
    (currentMateriel.value + 1) % materiels.length

const prevMateriel = () =>
  currentMateriel.value =
    (currentMateriel.value - 1 + materiels.length) % materiels.length

</script>


<style scoped>
.navbar {
  position: fixed;
  top: 0;
  width: 100%;
  background: #f1e19aff;
  z-index: 1000;
}
.container {
  max-width: 1200px;
  margin: auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
 
}
.logo { font-size: 22px; font-weight: bold; color: #0805c2; }
.menu { list-style: none; display: flex; gap: 25px; margin: 0; padding: 0; align-items: center; }
.menu-item { cursor: pointer; color: #050c0e; }
.menu-item:hover { color: #2615c2ea; }


.section {
  min-height: 100vh;
  padding: 120px 20px 40px;
  scroll-margin-top: 90px;

  position: relative;
}
.section {
  min-height: 100vh;
  padding: 120px 20px;
  margin-top:-7%;
}

.carousel-img {
  height: 500px;
  object-fit: cover;
}

.salle {  
   position: relative;
  overflow: hidden;
  height: 100vh; 
  }
.slide {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  background-position: center;
  opacity: 0;
  transition: opacity 1.5s ease-in-out;
}
.slide.active { opacity: 1; z-index: 1; }

.overlay {
  position: relative;
  z-index: 2;

  padding: 40px;
  border-radius: 12px;
  text-align: center;
  color: #fff;
}

.dynamic-text h3 {
  font-size: 24px;
  font-weight: 500;
  color: #fff;
}
.highlight {
  color: #ffd700;
  transition: opacity 0.5s ease-in-out;
}

.offre {
  background: #f8fbff;
  padding-top: 60px;
  padding-bottom: 40px;
}

.section-title {
  font-size: 2rem;
  font-weight: 700;
  color: #03396c;
}

.offres-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 28px;
  margin-top: 20px;
  padding: 0 10px;
}

.offre-box {
  background: #ffffff;
  border-radius: 12px;
  padding: 24px;
  box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.offre-box:hover {
  transform: translateY(-5px);
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.12);
}

.offre-title {
  font-size: 1.3rem;
  font-weight: 700;
  margin-bottom: 10px;
  color: #0056a1;
}

.offre-desc {
  font-size: 1rem;
  color: #444;
  line-height: 1.5;
}

.reservation-container {
  background: #f9f9f9;
  width: 100%;
  margin:  auto;
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  text-align: center;
  font-family: 'Arial', sans-serif;
  position: relative;
  display:flex;
}

.icon-arrow {
  width: 24px;
  height: 24px;
  margin-bottom: 8px;
  object-fit: contain;
}



.description {
  font-size: 30px;
  color: #333;
  line-height: 1.4;
  margin-top: 15px;
  white-space: pre-line;
}

.footer-text {
  margin-top: 25px;
  color: #0047bb;
  font-size: 16px;
  font-weight: 600;
  cursor: default;
}

.vitre {
  position: relative;
  overflow: hidden;
  height: 100vh;
}

.bg-video {
  position: absolute;
  top: 50%;
  left: 50%;
  width: auto;
  height: 100%;
  min-width: 100%;
  min-height: 100%;
  transform: translate(-50%, -50%);
  object-fit: cover;
  z-index: -1;
}


@keyframes flotter {
    0%   { transform: translateY(0); }
    50%  { transform: translateY(-15px); }
    100% { transform: translateY(0); }
}

@keyframes colorChange {
    0%   { background-color:blue; color: aliceblue; }
    100% { background-color:black; color: aliceblue; }
}

.inscription-btn{
    animation: colorChange 1s infinite alternate;
}
.image-anim {
    width: 120px;
    animation: flotter 2s infinite ease-in-out;
    object-fit: cover;
}

.inscription-btn a {
    text-decoration: none;
    color: #e3f2fd;
}

.inscription-btn a:hover {
  background-color: blue;
}
.inscription-btn {
    transition: background-color 1s ease;
}
.inscription-btn a:hover {
    color: white;
} 
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
.materiel-wrapper {
  display: flex;
  gap: 40px;
}

.materiel-text,
.materiel-carousel {
  width: 50%;
}

.carousel-img {
  width: 100%;
  max-height: 420px;
  object-fit: cover;
  border-radius: 12px;
}

.controls button {
  margin-letf:20%;

  font-size: 18px;
}

</style>
