<template>
    <Page actionBarHidden="true">
         <StackLayout class="dad">
            <button @tap="$router.push('/panel')" >Entrar</button>
            <button @tap="$router.push('/login')" class=" btn" >Iniciar Sesion</button>
            <button @tap="$router.push('/register')" class="btn" >Registrarse</button>    
        </StackLayout>
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
    height: 290;
    padding: 15;
}
Page {
    background: url('~/images/4.jpg');
}
button{
    font-size: 16;
    padding: 10 0;
    background-color: #40739e;
    color: #fff;
    margin-top: 7;
    border-radius: 50;
}

.btn{
    border:1 solid #000;
}

</style>

