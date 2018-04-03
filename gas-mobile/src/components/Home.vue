<template>
    <Page class="first-page" actionBarHidden="true" backgroundSpanUnderStatusBar="true">
         <FlexboxLayout flexDirection="column" justifyContent="center">
            <StackLayout class="container">
                <StackLayout class="logo">
                    <Image src="~/images/logo.jpg"/>
                </StackLayout>
                <FlexboxLayout class="buttons" flexDirection="column">
                    <button @tap="$router.push('/panel')" class="btn-entrar" >Entrar</button>
                    <FlexboxLayout class="little" justifyContent="space-between">
                        <button @tap="$router.push('/login')" class="white">Iniciar Sesion</button>
                        <button @tap="$router.push('/register')" class="white" >Registrarse</button>   
                    </FlexboxLayout>
                </FlexboxLayout>
            </StackLayout>
         </FlexboxLayout>
    </Page>
</template>
<script>
    export default {
        created() {
            this.$store.commit('SET_USER', null)
            console.log(this.$store.state.session)
        }
    }
</script>
<style scoped>
Page {
    padding: 0;
}
.container {
    margin: 20;
    padding: 35;
    border-radius: 2;
    background: #fff;
}
.buttons {
    margin-top: 20;
}
.btn-entrar{
    background-color: #338adf;;
}
.little {
    margin-top: 7;
}
.white {
    background: #35a3;
    width: 47%;
}
</style>
