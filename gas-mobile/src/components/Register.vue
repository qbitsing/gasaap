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
                <Label :text="alertText" class="show"></Label>
            </FlexboxLayout>
                <button class="volver" @tap="$router.push('/home')" >Volver</button>  
        </FlexboxLayout>
    </Page>
</template>
<style>
.show {
    color: red;
    font-size: 14;
    margin-top: 10;
}
</style>
<script>
import { mapActions } from 'vuex';
export default {
    data() {
            return {
                alertText: null,
                phone: null,
                name: null,                
                password: null,
                confirmPassword: null,
                email: null                
            }
        },
        computed: {
            verifyPassword() {
                return this.password === this.confirmPassword
            }
        },
        methods: {
            create() {
                if(this.phone && this.name && this.email && this.password && this.confirmPassword) {
                    if (this.password === this.confirmPassword) {
                        const body = new FormData()
                        body.append('phone', this.phone)
                        body.append('name', this.name)              
                        body.append('email', this.email)
                        body.append('password', this.password)
                        console.log('create')
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
                    } else this.alertText = 'Las contraseñas no coinciden'
                } else this.alertText = 'Debes llenar todos los campos'
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
