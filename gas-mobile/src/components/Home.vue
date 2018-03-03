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
    padding: 24;
    background: #f5f6fa;
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
    background-color: rgba(255, 255, 255, .8);
    color: #40739e;
    border:1 solid #000;
}

</style>

