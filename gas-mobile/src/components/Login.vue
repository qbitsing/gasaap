<template>
    <Page class="first-page" actionBarHidden="true">
        <FlexboxLayout flexDirection="column" justifyContent="space-between">
                <label text="Inicia Sesión."/> 
            <FlexboxLayout flexDirection="column" justifyContent="center">
                <TextField borderWidth="1" borderColor="#eee" hint="E-mail." returnKeyType="next" v-model="email" />
                <TextField borderWidth="1" borderColor="#eee" hint="Contraseña." returnKeyType="send" secure="true" v-model="password" />            
                <button class="login" @tap="logIn" >Iniciar sesion</button >
            </FlexboxLayout>
            <button class="volver" @tap="$router.push('/home')">Volver</button>
        </FlexboxLayout>
    </Page>
</template>
<script>
export default {
    created() {
        console.log(this.$store)
    },
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
                    console.log('Correcto')
                    this.$store.commit('setUser', e.userData)
                    this.$router.push('/panel')
                } else alert(e.message)
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
        background: #35a3;
    }
    .volver{
        color: #fff;
    }
</style>

