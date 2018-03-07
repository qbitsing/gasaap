<template>
    <Page class="first-page" actionBarHidden="true">
         <FlexboxLayout flexDirection="column" justifyContent="space-between">
            <StackLayout class="logo">
                <Image src="~/images/logo.jpg"/>
            </StackLayout>
            <StackLayout class="buttons">
                <button @tap="$router.push('/panel')" class="btn-entrar" >Entrar</button>
                <button @tap="$router.push('/login')" class=" btn white">Iniciar Sesion</button>
                <button @tap="$router.push('/register')" class="btn white" >Registrarse</button>   
            </StackLayout>
         </FlexboxLayout>
    </Page>
</template>
<script>
    export default {
        created() {
            // if(application.android) {
            // }
        }
    }
</script>
<style scoped>
Page {
    padding: 0;
}
.logo {
    padding: 40;
    background: #fff;
}
.buttons {
    padding: 15;
}
.btn-entrar{
    background-color: #40739e;
}
.btn-entrar:pressed{
    background-color: #175e99;
}
.white {
    background-color: #fff;
    color: #000;
}
.white:pressed{
    background-color: rgb(165, 164, 164);
}
</style>
