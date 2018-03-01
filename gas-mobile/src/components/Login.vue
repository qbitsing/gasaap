<template>
    <Page actionBarHidden="true">
        <StackLayout>
            <label text="login"/>
            <TextField hint="E-mail." returnKeyType="next" v-model="email" />
            <TextField hint="Contraseña." returnKeyType="send" secure="true" v-model="password" />
            <button @tap="logIn">Iniciar sesion</button>
            <button @tap="$router.push('/home')">Volver</button>
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
