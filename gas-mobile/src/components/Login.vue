<template>
    <Page class="first-page" actionBarHidden="true"  backgroundSpanUnderStatusBar="true">
        <FlexboxLayout class="margin" flexDirection="column" justifyContent="space-between">
                <label text="Inicia Sesión."/> 
            <FlexboxLayout flexDirection="column" justifyContent="center">
                <TextField borderWidth="1" borderColor="#eee" hint="E-mail" returnKeyType="next" v-model="email" />
                <TextField borderWidth="1" borderColor="#eee" hint="Contraseña" returnKeyType="send" secure="true" v-model="password" />            
                <button class="login" @tap="logIn" >Iniciar sesion</button>
            </FlexboxLayout>
            <button class="back" @tap="$router.push('/home')">Volver</button>
        </FlexboxLayout>
    </Page>
</template>
<script>
export default {
    data() {
        return {
            email: null,
            password: null
        }
    },
    methods: {
        logIn() {
            const body = new FormData()
            body.append('email', this.email)
            body.append('password', this.password)
            fetch('https://gasapp-api.herokuapp.com/usuarios/login', {
                method: 'POST',
                body
            })
            .then(e => e.json())
            .then(e => {
                console.log(e)
                if(e.status == 200) {
                    this.password = null
                    this.email = null
                    this.$store.commit('SET_USER', e.userData[0])
                    this.$router.push('/panel')
                } else {
                    this.password = null
                    alert(e.message)
                }
            })
        }
    }
}
</script>
<style scoped>
    label{
        text-align: center;
        color: #fff;
        font-size: 20;
        margin-bottom: 10;
    }
    .login {
        margin-top: 10;
        background: #35a3;
    }
    .volver{
        color: #fff;
    }
</style>

