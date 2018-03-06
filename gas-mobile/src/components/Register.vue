<template>
    <Page class="first-page" actionBarHidden="true">
        <FlexboxLayout flexDirection="column" justifyContent="space-between">
               <label text="Regístrate."/>     
            <FlexboxLayout flexDirection="column" justifyContent="center">   
                <TextField borderWidth="1" borderColor="#eee" hint="E-mail." v-model="email" />  
                <TextField borderWidth="1" borderColor="#eee" hint="Contraseña." secure="true" v-model="password" />
                <TextField borderWidth="1" borderColor="#eee" hint="Confirmar Contraseña." secure="true" v-model="confirmPassword"  />            
                <TextField borderWidth="1" borderColor="#eee" hint="Nombres y Apellidos" v-model="name"/>
                <TextField borderWidth="1" borderColor="#eee" hint="Teléfono" v-model="phone"/>
                <button @tap="create" class="registrer" >Registrarse</button>
            </FlexboxLayout>
                <button class="volver" @tap="$router.push('/home')" >Volver</button>  
        </FlexboxLayout>
    </Page>
</template>
<script>
export default {
    data() {
            return {
                phone: null,
                name: null,                
                password: null,
                confirmPassword: null,
                email: null                
            }
        },
        methods: {
            verifyPasswords() {

            },
            create() {
                const body = new FormData()
                body.append('phone', this.phone)
                body.append('name', this.name)              
                body.append('email', this.email)
                body.append('password', this.password)
            
                fetch('http://192.168.1.9/gasApp/api/usuarios/create', {
                    method: 'POST',
                    body
                })
                .then(e => e.json())
                .then(e => {
                    console.log(e)
                    if(e.status == 200) {
                         this.$router.push('/panel')
                    } else {
                         alert(e.message)
                     }
                })
            }
            
            }
        }
</script>
<style scoped>
    .registrer{
        margin-top:20;
        background: #35a3;
    }
    label{
        text-align: center;
        color: #fff;
        font-size: 20;
        margin-bottom: 10;
    }
    TextField {
        margin-top: 20;
    }

</style>
