<template>
  <StackLayout>
        <Label :text="labelText"/>
<<<<<<< HEAD
        <image src="~/assets/images/hola.png" />
        <button @tap="$router.replace('/home')">Cancelar</button>  
        <button @tap="$router.replace('/init')">Registrarse</button>  
=======
        <image src="~/images/hola.png"></image>

        <button @tap="$router.replace('/home')">Home</button>    
>>>>>>> b7861e6d167bee7e4bbd66329a000c5efe1d5455
    </StackLayout>
</template>
<script>
    export default {
        data () {
            return {
                labelText: 'estamos en el registro'
            }
        }
    }
</script>
<style scoped>
</style>
