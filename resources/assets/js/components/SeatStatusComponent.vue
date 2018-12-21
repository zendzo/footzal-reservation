<template>
  <p class="btn btn-sm btn-danger" v-if="statusBooked">Tidak Tersedia</p>
  <p class="btn btn-sm btn-secondary" v-else>Tersedia</p>
</template>

<script>
    export default {
      props: ['booked','seat_id'],
      data(){
        return {
          statusBooked: this.booked
        }
      },
        mounted() {
            Echo.channel('seat-status.' + this.seat_id)
            .listen('OrderStatusChangedEvent', (seat) =>  {
              this.statusBooked = seat.booked
            });
        }
    }
</script>
