<template>
    <StackLayout>
        <Label :text="hometext"/>
        <Label text="hometext"/>
        <button @tap="$router.replace('/login')" style="btn_login">Login</button>
        <button @tap="$router.replace('/register')" style="btn_register">Registarse</button>    
    </StackLayout>
</template>

<script>
  export default {
      data() {
          return {
              hometext: 'Esta es llllllllldfdfdflll'
          }
      }
  };
</script>

<style scoped>

</style>