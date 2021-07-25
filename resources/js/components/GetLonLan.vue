<template>
    <div class="container">
        <input type="text" name="address" id="address" v-model="address">
        <input type="hidden" name="gps_lng" id="gps_lng" v-model="gps_lng">
        <input type="hidden" name="gps_lat" id="gps_lat" v-model="gps_lat">
    </div>
</template>

<script>

export default {
    name : "GetLonLan",
    data() {
      return{
          longitude : '',
          latitude : ''
      }  
    },
    
}

</script>