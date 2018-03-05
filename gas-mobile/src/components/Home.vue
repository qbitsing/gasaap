<template>
    <Page actionBarHidden="true">
         <FlexboxLayout flexDirection="column-reverse" class="dad">
         <FlexboxLayout justifyContent	="space-between">
             
            <button @tap="$router.push('/login')" class=" btn" borderWidth="3" borderColor="#40739e">Iniciar Sesion</button>
            <button @tap="$router.push('/register')" class="btn" borderWidth="3" borderColor="#40739e">Registrarse</button>   
         </FlexboxLayout> 
            <button @tap="$router.push('/panel')" class="btn-entrar" >Entrar</button>
            <label text="Registrate o Inicia Sesión."/>                   
            
           
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
}

label{
    text-align: center;
    color: #fff;
    font-size: 20;
    margin-bottom: 10;
}

Page {
   
    background: url('~/images/7.jpg') ;
    opacity: 2;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}

Button{
    font-size: 16;
    padding: 15 0;
    margin-top: 7;
    color: #40739e;
    width: 130;
    background-color: #fff;
}

.btn-entrar{
    background-color: #40739e ;
    color: #fff;
}



</style>

