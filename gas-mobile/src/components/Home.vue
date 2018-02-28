<template>
    <StackLayout>
        <Label :text="hometext"/>
        <Label text="hometext"/>
        <button @tap="$router.replace('/register')">Ir a pantalla de registro</button>    
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