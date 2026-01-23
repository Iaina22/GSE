<template>
  <div class="container">
    <h1>Liste des Reservations</h1>

    <Link :href="route('reservations.create')" class="btn btn-success mb-3">Ajouter Reservation</Link>

    <div v-if="$page.props.flash.success" class="alert alert-success">
      {{ $page.props.flash.success }}
    </div>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Email</th>
          <th>CIN</th>
          <th>Telephone</th>
          <th>Date</th>
          <th>Heure Début</th>
          <th>Heure Fin</th>
          <th>Type Evènement</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="res in reservations" :key="res.id">
          <td>{{ res.nom }}</td>
          <td>{{ res.email }}</td>
          <td>{{ res.cin }}</td>
          <td>{{ res.telephone }}</td>
          <td>{{ res.date }}</td>
          <td>{{ res.heure_debut }}</td>
          <td>{{ res.heure_fin }}</td>
          <td>{{ res.type_evenement }}</td>
          <td>
            <Link :href="route('reservations.edit', res.id)" class="btn btn-warning btn-sm">Edit</Link>
            <button @click="deleteReservation(res.id)" class="btn btn-danger btn-sm">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/inertia-vue3';

export default {
  props: {
    reservations: Array
  },
  components: { Link },
  methods: {
    deleteReservation(id) {
      if (confirm('Vraiment supprimer cette reservation ?')) {
        Inertia.delete(route('reservations.destroy', id));
      }
    }
  }
};
</script>
