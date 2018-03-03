<template>
    <Page actionBarHidden="true">
        <StackLayout>
            <label text="log in"/>
            <TextField hint="E-mail." returnKeyType="next" v-model="email" />
            <TextField hint="Contraseña." returnKeyType="send" secure="true" v-model="password" />
            <button class="login" @tap="logIn">Iniciar sesion</button>
            <button class="volver" @tap="$router.push('/home')">Volver</button>
        </StackLayout>
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
    label {
        font-size: 30;
        text-align: center;
        text-transform: uppercase;
    }    

    StackLayout {
        padding: 25;
    }

    Button, TextField {
        margin-top: 6;
        border-radius: 50;
    }

    .login {
        margin-top: 20;
        background: #35a3;
        color: #fff;
    }

    TextField {
        margin-top: 20;
        background: rgba(30,30,30,.4);
        padding: 10 15;
        color: #fff;
    }

    .volver{
        width: 100;
        height: 40;
    }
</style>

