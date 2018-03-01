<template>
  <StackLayout>
        <Label :text="labelText"/>
        <image src="~/assets/images/hola.png" />
        <button @tap="$router.replace('/home')">Volver</button>  
        <button @tap="$router.replace('/init')">Registrarse</button>  
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
