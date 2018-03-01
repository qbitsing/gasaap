<template>
    <Page actionBarHidden="true">
        <FlexBoxLayout flexDirection="column" class="dad">
            <button @tap="$router.push('/panel')" >Entrar</button>
            <FlexBoxLayout justifyContent="space-between" >
                <button @tap="$router.push('/login')" class="btn-home btn" >Iniciar Sesion</button>
                <button @tap="$router.push('/register')" class="btn-home btn" >Registrarse</button>    
            </FlexBoxLayout>
        </FlexBoxLayout>
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
    padding: 10;
    background: #f5f6fa;
}


button{
    font-size: 16;
    padding: 20 0;
    background-color: #40739e;
    color: #fff;
}

.btn{
    background-color: #fff;
    color: #40739e;
    width: 160;
}

</style>

