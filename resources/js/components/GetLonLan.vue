<template>
    <div class="container">
        <p>lorem</p>
        <input type="hidden" name="gps_lng" id="gps_lng">
        <input type="hidden" name="gps_lat" id="gps_lat">
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
