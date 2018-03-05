<template>
    <Page actionBarHidden="true">
        <FlexboxLayout flexDirection="column-reverse">
            <button class="volver" @tap="$router.push('/home')" >Volver</button>  
            <button @tap="$router.push('/init')" class="registrer" >Registrarse</button>  
            <TextField hint="Teléfono" v-model="cellphone"/>
            <TextField hint="Nombres y Apellidos" v-model="name"/>
            <TextField hint="Contraseña." secure="true"  v-model="password" />
            <TextField hint="Confirmar Contraseña." secure="true" v-model="confirmPassword"  />            
            <TextField hint="E-mail." v-model="email" />  
            <label text="Registrate."/>          
            
        </FlexboxLayout>
    </Page>
</template>
<script>
export default {
    data() {
            return {
                cellphone: null,
                name: null,                
                password: null,
                confirmPassword: null,
                email: null                
            }
        },
        methods: {
            logIn() {
                const body = new FormData()
                body.append('cellphone', this)
                body.append('name', this)              
                body.append('email', this.email)
                body.append('password', this.password)
               // if(password == confirmPassword){
                fetch('http://192.168.1.38/gasApp/api/usuarios/create', {
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
        background: rgba(35,30,30,.4);
        padding: 10 15;
        placeholder-color: #fff;
        
    }

    .volver{
        width: 100;
        height: 40;
    }


</style>
