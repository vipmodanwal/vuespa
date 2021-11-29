<template>
    <div>Contact
        <h6 @click="goBack()">Go Back</h6>
    </div>
    
</template>
<script>
export default{
    name:'Contact',
    methods: {
    goBack() {
      window.history.length > 1 ? this.$router.go(-1) : this.$router.push('/')
    }
  }
}
</script>