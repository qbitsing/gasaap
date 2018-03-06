<template>
    <Page actionBarHidden="true">
         <FlexboxLayout flexDirection="column-reverse" class="dad">     
            <button @tap="$router.push('/login')" class=" btn white">Iniciar Sesion</button>
            <button @tap="$router.push('/register')" class="btn white" >Registrarse</button>   
            <button @tap="$router.push('/panel')" class="btn-entrar" >Entrar</button>
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

.dad{
    padding: 15;
    margin-bottom: 40;
}

label{
    text-align: center;
    color: #fff;
    font-size: 20;
    margin-bottom: 10;
}

Page {
    background: url('~/images/7.jpg') ;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}

Button{
    margin-top: 7;
    color: #fff;
    border-radius: 50;
    transition: .3s;
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
