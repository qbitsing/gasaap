<template>
  <StackLayout>
        <Label :text="labelText"/>
        <image src="~/images/hola.png"></image>

        <button @tap="$router.replace('/home')">Home</button>    
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
