<template>
    <Page actionBarHidden="true">
        <FlexboxLayout flexDirection="column">
            <button class="volver" @tap="$router.push('/home')">Volver</button>
            <button class="login" @tap="logIn" >Iniciar sesion</button>
            <TextField hint="Contraseña." returnKeyType="send" secure="true" v-model="password" />            
            <TextField hint="E-mail." returnKeyType="next" v-model="email" />
            <label text="Inicia Sesión."/> 
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
                fetch('http://192.168.1.38/gasApp/api/usuarios/login', {
                    method: 'POST',
                    body
                })
                .then(e => e.json())
                .then(e => {
                    console.log(e)
                    if(e.status == 200) {
                        console.log('Correcto')
                        this.$router.push('/panel')
                    } else {
                        console.log('Incorrecto')
                        alert(e.message)
                        .then(() => {
                        console.log("Dialog closed")
                        })
                    }
                })
            }
        }
    }
</script>
<style scoped>
     
    Page {
        background: url('~/images/3.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: left;
    }

    label{
        text-align: center;
        color: #fff;
        font-size: 20;
        margin-bottom: 10;
    }

    FlexboxLayout {
        padding: 25;
    }

    Button, TextField {
        margin-top: 6;
        border-radius: 50;
        color: #fff;
        font-size: 16;
    }

    .login {
        font-weight:  700;        
        margin-top: 20;
        background: #35a3;
     
    }

    TextField {
        margin-top: 20;
        background: rgba(35,30,30,.4);
        padding: 10 15;
        placeholder-color: #fff;
    }

    .volver{
        color: #fff;
    }
</style>

