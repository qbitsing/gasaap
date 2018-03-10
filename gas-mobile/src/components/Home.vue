<template>
    <Page class="first-page" actionBarHidden="true" backgroundSpanUnderStatusBar="true">
         <FlexboxLayout flexDirection="column" justifyContent="center">
            <StackLayout class="container">
                <StackLayout class="logo">
                    <Image src="~/images/logo.jpg"/>
                </StackLayout>
                <FlexboxLayout class="buttons" flexDirection="column">
                    <button @tap="$router.push('/panel')" class="btn-entrar" >Entrar</button>
                    <FlexboxLayout>
                        <button @tap="$router.push('/login')" class="btn white">Iniciar Sesion</button>
                        <button @tap="$router.push('/register')" class="btn white" >Registrarse</button>   
                    </FlexboxLayout>
                </FlexboxLayout>
            </StackLayout>
         </FlexboxLayout>
    </Page>
</template>
<script>
    export default {
        created() {
            console.log(this.$store)
        }
    }
</script>
<style scoped>
Page {
    padding: 0;
}
.container {
    width: 80%;
    margin: 20;
    padding: 35;
    border-radius: 2;
    height: 300;
    background: #fff;
}
.buttons {
    margin-top: 20;
}
/* .logo {
    padding: 40;
} */
.btn-entrar{
    background-color: #40739e;;
}
 /* .btn-entrar:pressed{
    background-color: #175e99;
} */
.white {
    width: 50%;
}
/* .white:pressed{
    background-color: rgb(165, 164, 164);
} */
</style>
