<template>
    <StackLayout>
        <Label :text="hometext"/>
    </StackLayout>
</template>

<script>
  export default {
      data() {
          return {
              hometext: 'Esta es la home'
          }
      }
  };
</script>

<style scoped>
    Button {
        background-color: #42b883;
        width: 50%;
    }
</style>