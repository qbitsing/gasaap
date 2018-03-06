<template>
    <Page actionBarHidden="true">
        <FlexboxLayout flexDirection="column">
            <label text="Regístrate."/>     
            <TextField hint="E-mail." v-model="email" />  
            <TextField hint="Contraseña." secure="true"  v-model="password" />
            <TextField hint="Confirmar Contraseña." secure="true" v-model="confirmPassword"  />            
            <TextField hint="Nombres y Apellidos" v-model="name"/>
            <TextField hint="Teléfono" v-model="phone"/>
            <button @tap="create" class="registrer" >Registrarse</button>
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

    FlexboxLayout{
        padding: 25;    
    }

     Page {
        background: url('~/images/7.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        
    }

    button, TextField{
        margin-top: 6;
        border-radius: 50;
        color: #fff;
        font-size: 16;
    }

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
        background: rgba(82, 69, 69, 0.473);
        placeholder-color: rgba(0, 0, 0, 0.7);
        padding: 10 15;
    }

</style>
