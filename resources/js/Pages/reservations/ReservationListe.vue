<template>
  <div>
    <ul>
      <li v-for="reservation in reservations" :key="reservation.id">
        {{ reservation.nom }}
        <button @click="deleteReservation(reservation.id)">Delete Reservation</button>
      </li>
    </ul>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
  props: {
    reservations: Array,  // Lisitry ny reservations avy amin'ny controller
  },
  methods: {
    deleteReservation(id) {
      Inertia.delete(`/reservations/${id}`, {
        onSuccess: () => {
          console.log("Reservation supprimée");
        },
        onError: (errors) => {
          console.error(errors);
        },
      });
    },
  },
};
</script>
