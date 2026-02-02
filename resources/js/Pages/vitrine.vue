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
        <li class="menu-item" @click="scrollTo('reservation')">Réservation</li>
        <li class="menu-item" @click="scrollTo('contact')">Contact</li>
       <button class="btn btn-primary" @click="goToConnexion">
         Se connecter
       </button>
      </ul>
    </div>
  </nav>

  <main>
    <!-- VITRINE SECTION -->
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
          permet de faciliteé vos besoin de vos evenement. Nous pouvons organisez vos evenement de A à Z.
          Benéficez car GSE est facile, rapide, assurés.
        </h5>
        <button class="btn btn-dark btn-lg mt-4 ms-5" @click="goToInscription">
          S'inscrire
        </button>
        <img src="../../../public/assets/images/envoi.png" alt="Image Envoi"
          class="image-anim mb-4"
          style="margin-left: -11%; position: absolute; margin-top: 5%; width: 50px;">
        <h1 class="text-center" style="margin-top: 9%; color:white;">
          Gérer tous les evenement avec logiciel complet.
        </h1>
      </div>
    </section>

    <!-- SALLE SECTION -->
    <section id="salle" style="" class="section salle mt-5">
      <div class="container shadow-container" style="height:100%;padding-top:-10%;">
        <div class="salle-carousel" style="display:flex; gap:30px; align-items:center; justify-content:center;padding-top:-10%; height:100%;">
          <div class="carousel-left" style="flex:1; position:relative; margin-top:-28%;">
            <img :src="salleImages[currentSalle].src" class="carousel-image" />

            <div class="controls">
              <button @click="prevSalle">‹</button>
              <button @click="nextSalle">›</button>
            </div>
          </div>

          <div class="carousel-right" style="flex:1; display:flex; margin-top:-28%; flex-direction:column; justify-content:center;">
            <h2>{{ salleImages[currentSalle].title }}</h2>
            <p>{{ salleImages[currentSalle].description }}</p>
            <button type="button" class="btn btn-success" style="width:30%;margin-left:40%;">Réserver</button>
          </div>
        </div>
      </div>
    </section>

    <!-- OFFRE SECTION -->
    <section id="offre" style="  margin-top:-20%" class="section offre">
      <div class="container shadow-container">
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

    <!-- MATERIEL SECTION -->
    <section id="materiel" style="margin-top:-15%" class="section materiel">
      <div class="container shadow-container">
        <div class="materiel-wrapper">
          <div class="materiel-text">
            <h2 class="text-primary">Nos Matériels</h2>
            <p style="font-size:150%">
              Nous mettons à votre disposition des matériels professionnels
              pour assurer la réussite de vos événements. Alors, si vous organisez une fête et à louer une salle,
              on peut organiser vos événements de A à Z.
              Qualité, fiabilité et adaptabilité pour tout type d’événement.
            </p>
          </div>

          <div class="materiel-carousel">
            <img :src="materiels[currentMateriel].image" class="carousel-img" />
            <h5 class="mt-3">
              {{ materiels[currentMateriel].title }}
            </h5>
          </div>
        </div>
      </div>
    </section>

    <!-- RESERVATION SECTION -->
    <section id="reservation" style="margin-top:-15%"  class="section reservation">
      <div class="reservation-container shadow-container">
        <img src="../../../public/assets/images/date.jpg" width="30%" >
        <div>
          <h2 class="text-info">Réservation en ligne</h2>
          <p class="description">
            Application simple, rapide et efficace pour vos événements. Vous pouvez réserver vos salles de rêve à partir 
            de cette application. Nos traitons vos demandes dans 24H minimum. GSE rapide, assuré, facile...
          </p>
          <button class="btn btn-success btn-lg animated-btn">
            Réserver maintenant
          </button>
        </div>
      </div>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" style="margin-top:-13%" class="section contact">
      <div class="container shadow-container text-center" style="padding:5%;">
        <h2 class="text-primary mb-4">Contact</h2>
        <p> <img src="../../../public/assets/images/phone.png" width="28%" > +261 32 34 567 89</p>
        <p> <img src="../../../public/assets/images/fb.png" width="25%" > +261 34 34 567 89</p>
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

const goToInscription = () => { router.visit('/inscriptions/create') }
const goToConnexion = () => { router.visit('/conexion') }
const scrollTo = (id) => { const section = document.getElementById(id); if(section) section.scrollIntoView({ behavior:'smooth'}) }

// Carousel Vitre/Evenement
const images = [
  '/assets/images/wind.jpg','/assets/images/vodiondry.jpg','/assets/images/fivorin.jpg',
  '/assets/images/batemi.jpg','/assets/images/annif.jpg','/assets/images/photo.jpg'
]
const currentImage = ref(0)
const texts = ['MARIAGE','FIANCAILLE','REUNION','BATEME','ANNIVERSAIRE','FETE PRIVE']
const currentIndex = ref(0)
const currentText = ref(texts[currentIndex.value])

onMounted(() => {
  setInterval(()=>{ currentImage.value = (currentImage.value +1)%images.length },1500)
  setInterval(()=>{ currentIndex.value = (currentIndex.value +1)%texts.length; currentText.value=texts[currentIndex.value] },1500)
})

// Materiel
const materiels = [
  { title: 'Sonorisation', image: '/assets/images/son.jpg' },
  { title: 'Tables', image: '/assets/images/table.jpg' },
  { title: 'Chaises', image: '/assets/images/chaise.jpg' },
  { title: 'Décoration', image: '/assets/images/deco.jpg' }
]
const currentMateriel = ref(0)
const nextMateriel = () => currentMateriel.value=(currentMateriel.value+1)%materiels.length
const prevMateriel = () => currentMateriel.value=(currentMateriel.value-1+materiels.length)%materiels.length

// Salle Carousel (Session Salle)
const salleImages = ref([
  { src: '/assets/images/mariage.jpg', title:'SALLE DE MARIAGE', description:'Tables robustes et élégantes adaptées pour tous types de sessions.' },
  { src: '/assets/images/vodiondry.jpg', title:'SALLE DE FIANCAILLE', description:'Chaises confortables et stables, idéales pour les participants.' },
  { src: '/assets/images/annif.jpg', title:'SALLE POUR ANNIVAIRSSAIRE', description:'Projecteur haute définition pour vos présentations et conférences.' },
  { src: '/assets/images/batemi.jpg', title:'SALLE POUR BATEME', description:'Système audio puissant pour assurer que tout le monde entend clairement.' },
  { src: '/assets/images/fivorin.jpg', title:'SALLE POUR LA REUNION OU CONFERANCE', description:'Matériel de décoration pour rendre votre salle plus accueillante.' },
  { src: '/assets/images/feti.jpg', title:'SALLE POUR LES FETE PRIVE', description:'Éclairage ajustable pour créer l’ambiance parfaite pour chaque session.' }
])
const currentSalle = ref(0)
const nextSalle = () => currentSalle.value = (currentSalle.value+1)%salleImages.value.length
const prevSalle = () => currentSalle.value = (currentSalle.value-1+salleImages.value.length)%salleImages.value.length
</script>

<style scoped>
/* ----- Navbar ----- */
.navbar{position:fixed;top:0;width:100%;background:#f1e19aff;z-index:1000;}
.container{max-width:1200px;margin:auto;display:flex;justify-content:space-between;align-items:center;}
.menu{list-style:none;display:flex;gap:25px;margin:0;padding:0;align-items:center;}
.menu-item{cursor:pointer;color:#050c0e;}
.menu-item:hover{color:#2615c2ea;}

/* ----- Section ----- */
.section{min-height:100vh;padding:80px 20px; position:relative;scroll-margin-top:60px;}
.vitre{position:relative;overflow:hidden;height:100vh;}
.bg-video{position:absolute;top:50%;left:50%;width:auto;height:100%;min-width:100%;min-height:100%;transform:translate(-50%,-50%);object-fit:cover;z-index:-1;}
.image-anim{width:120px;animation:flotter 2s infinite ease-in-out;object-fit:cover;}
@keyframes flotter{0%{transform:translateY(0);}50%{transform:translateY(-15px);}100%{transform:translateY(0);}}
.salle{position:relative;overflow:hidden;height:100vh;padding-top:-10%;}
.carousel-image{width:100%;height:350px;object-fit:cover;border-radius:12px;}
.controls{position:absolute;bottom:15px;left:50%;transform:translateX(-50%);}
.controls button{background:#335b63ff;border:none;color:white;font-size:24px;padding:5px 15px;margin:0 5px;border-radius:50%;cursor:pointer;}
.carousel-right h2{color:#110df0ff;margin-bottom:15px;}
.carousel-right p{font-size:18px;}

/* Offres */
.offre{background:#f8fbff;padding-top:20px;padding-bottom:40px;}
.offres-grid{display:flex;gap:28px;margin-top:20px;padding:3%;}
.offre-box{background:#e6e1e1;border-radius:12px;padding:50px;box-shadow:0px 10px 15px rgba(0,0,0,0.08);transition:transform 0.3s ease,box-shadow 0.3s ease;}
.offre-box:hover{transform:translateY(-5px);box-shadow:0 10px 20px rgba(0,0,0,0.12);}
.offre-title{font-size:1.3rem;font-weight:700;margin-bottom:10px;color:#0056a1;}
.offre-desc{font-size:1rem;color:#444;line-height:2;}

/* Materiel */
.materiel-wrapper{display:flex;gap:40px;}
.materiel-text,.materiel-carousel{width:50%;}
.carousel-img{width:100%;max-height:420px;object-fit:cover;border-radius:12px;}

/* Reservation */
.reservation-container{background:#f9f9f9;width:100%;margin:auto;padding:30px;border-radius:20px;box-shadow:0 4px 15px rgba(0,0,0,0.1);text-align:center;font-family:'Arial',sans-serif;display:flex;}
.description{font-size:30px;color:#333;line-height:1.4;margin-top:15px;white-space:pre-line;}
.animated-btn{animation:pulse 1.5s infinite;transition:all 0.3s ease;}
@keyframes pulse{0%{transform:scale(1);box-shadow:0 0 0 rgba(0,0,0,0);}50%{transform:scale(1.1);box-shadow:0 8px 15px rgba(0,0,0,0.87);}100%{transform:scale(1);box-shadow:0 0 0 rgba(0,0,0,0);}}
</style>
