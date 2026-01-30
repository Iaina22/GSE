<template>
  <Navbar />
<div style="  background: rgba(245, 245, 245, 0.8);">
  <h2 class="text-primary text-center fw-lighter mt-4">
    Bienvenue
  </h2>

  <div v-if="inscription">
    <div class="actions">
      <Link :href="`/inscriptions/${inscription.id}/edit`" class="btn btn-dark">
        Modifier
      </Link>

      <button type="button" class="btn btn-danger" @click="supprimer">
        Supprimer
      </button>

      <button type="button" class="btn btn-secondary" @click="logout">
        Déconnexion
      </button>
    </div>

    <div class="profile-card">
      <h1 style="color:blue; text-align:center;">BIENVENUE !</h1>
      <ul class="list-group">
        <li class="list-group-item"><strong>Nom :</strong> {{ inscription.nom }}</li>
        <li class="list-group-item"><strong>Prénom :</strong> {{ inscription.prenom }}</li>
        <li class="list-group-item"><strong>Adresse :</strong> {{ inscription.adresse }}</li>
        <li class="list-group-item"><strong>Sexe :</strong> {{ inscription.sexe }}</li>
        <li class="list-group-item"><strong>Age :</strong> {{ inscription.age }}</li>
        <li class="list-group-item"><strong>Email :</strong> {{ inscription.email }}</li>
        <li class="list-group-item"><strong>CIN :</strong> {{ inscription.cin }}</li>
        <li class="list-group-item"><strong>Téléphone :</strong> {{ inscription.telephone }}</li>
      </ul>
    </div>
  </div>

  <div v-else class="text-center mt-5 text-danger">
    Aucun utilisateur trouvé
  </div>


  <div v-if="showLogoutModal" class="modal">
    <div class="modal-content">
      <p>Voulez-vous vraiment vous déconnecter ?</p>
      <div class="actions-modal">
        <button class="btn btn-secondary" @click="showLogoutModal = false">
          Non
        </button>
        <button class="btn btn-info" @click="confirmLogout">
          oui
        </button>
      </div>
    </div>
  </div>
  </div>
</template>

<script setup>
import Navbar from "../../Components/Navbar.vue";
import { Link, router } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
  inscription: {
    type: Object,
    required: false
  }
});


const supprimer = () => {
  if (!props.inscription) return;

  if (confirm("Voulez-vous vraiment supprimer cette inscription ?")) {
    router.delete(`/inscriptions/${props.inscription.id}`,  {
      preserveState: false,
      onFinish: () => {
        router.get('/conexion');
      }
    });
  }
};

const showLogoutModal = ref(false);

const logout = () => {
  showLogoutModal.value = true;
};

const confirmLogout = () => {
  showLogoutModal.value = false;
  router.post('/logout');
};
</script>

<style scoped>
.actions {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
  margin: 20px;
}

.profile-card {
  width: 50%;
  margin: 40px auto;
  text-align: start;
  padding: 20px;
  border-radius: 10px;
}

.profile-card h1 {
  margin-bottom: 20px;
}

.list-group-item {
  font-size: 16px;
}

.modal {
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.4);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
 
}

.modal-content {
  background: white;
  padding: 20px;
  border-radius: 8px;
  min-width: 300px;
  text-align: center;
  animation: slideDown 0.3s ease;
   width:40%;
}

@keyframes slideDown {
  from {
    transform: translateY(-30px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

.actions-modal {
  display: flex;
  justify-content: space-around;
  margin-top: 15px;
}
</style>
