<template>
  <nav class="navbar" >
    <div class="logo">
      <Link href="/">GSE</Link>
    </div>

    <ul class="menu">

      
      <li class="menu-item" @mouseenter="open='salle'" @mouseleave="open=''">
        <span>Salle</span>
        <ul class="dropdown" v-if="open==='salle'">
          <li>
            <Link href="/salle/mariage">Mariage</Link>
            <small class="text-muted">Salle pour cérémonie de mariage</small>
          </li>
          <li>
            <Link href="/salle/fiancaille">fiancaille</Link>
            <small class="text-muted">Salle pour  fiancaille</small>
          </li>
          <li>
            <Link href="/salle/reunion">Réunion</Link>
            <small class="text-muted">Salle pour réunions professionnelles</small>
          </li>
          <li>
            <Link href="/salle/bapteme">Baptême ou Anniversaire</Link>
            <small class="text-muted">Salle pour baptême ou célébration religieuse</small>
          </li>
        
          <li>
            <Link href="/salle/fete">Fête privée</Link>
            <small class="text-muted">Salle pour fêtes privées ou événements spéciaux</small>
          </li>
        </ul>
      </li>

      <li class="menu-item" @mouseenter="open='offre'" @mouseleave="open=''">
        <span>Offre</span>
        <ul class="dropdown" v-if="open==='offre'">
          <li>
            <Link href="/offre/standard">Offre standard</Link>
            <small class="text-muted">Offre spéciale mariage</small>
          </li>
          <li>
            <Link href="/offre/premium"> Offre premium</Link>
            <small class="text-muted">Offre pour événement familial</small>
          </li>
          <li>
            <Link href="/offre/air"> offre en plain air</Link>
            <small class="text-muted">Offre pour réunion ou conférence</small>
          </li>
          <li>
            <Link href="/offre/prestige">Offre prestige</Link>
            <small class="text-muted">Offre pour fête privée ou anniversaires</small>
          </li>
        </ul>
      </li>

    
      <li class="menu-item">
        <Link href="/materiel">Matériel utilisé</Link>
      </li>
      <li class="menu-item">
        <Link href="/reservations/create">Réservation</Link>
      </li>
    
   <li class="menu-item">
  <Link href="/user/{id}">
    <img src="../../../public/assets/images/user.jpg" alt="" class="user-image" />
  </Link>

</li>

</ul>
  </nav>
</template>

<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  inscription: {
    type: Object,
    required: false
  }
});


let open = ref('')
</script>

<style scoped>
.navbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #8bdde7e8;
  padding: 10px 20px;
  font-family: Arial, sans-serif;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1000;
}

.logo a {
  font-weight: bold;
  font-size: 22px;
  text-decoration: none;
  color: #0805c2ff;
}

.menu {
  list-style: none;
  display: flex;
  gap: 20px;
  margin: 0;
  padding: 0;
  align-items: center;
}

.menu-item {
  position: relative;
  cursor: pointer;
}

.menu-item > span,
.menu-item > a {
  color: #050c0e;
  font-size: 16px;
  text-decoration: none;
  
}

.menu-item:hover > span,
.menu-item:hover > a {
  color: #1abc9c;
}

.dropdown {
  position: absolute;
  top: 100%;
  left: 0;
  background: #7ccec7f5;
  border-radius: 5px;
  min-width: 180px;
  padding: 5px 0;
  z-index: 100;
  text-decoration:none;
}

.dropdown li {
  padding: 8px 15px;
 
}

.dropdown li:hover {
  background: #1abc9c;
}

.dropdown li a {
  color: #fff;
  display: block;
}

.dropdown li small {
  display: block;
  font-size: 11px;
  color: #ccc;
  margin-top: 2px;
}
.user-profile {
  display: flex;
  align-items: center;
}

.user-image {
  width: 50px;
  height: 50px;
  border-radius: 80%;
  object-fit: cover;
  cursor: pointer;
  border: 2px solid #0805c2ff;
}

.user-image:hover {
  border-color: #1abc9c;
}

</style>
