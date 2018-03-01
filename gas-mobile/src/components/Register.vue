<template>
    <Page actionBarHidden="true">
        <StackLayout>
            <Label :text="labelText"/>
            <image src="~/assets/images/hola.png" />
            <button @tap="$router.push('/home')">Volver</button>  
            <button @tap="$router.push('/init')">Registrarse</button>  
        </StackLayout>
    </Page>
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
