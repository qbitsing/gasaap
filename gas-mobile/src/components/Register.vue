<template>
    <Page class="first-page" actionBarHidden="true" backgroundSpanUnderStatusBar="true">
        <ActionBar title="Publiservicios" flat="true"/>
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
import * as application from "tns-core-modules/application"
import * as platform from "tns-core-modules/platform"
import * as utils from "tns-core-modules/utils/utils"
import { mapActions } from 'vuex';
export default {
    created() {
        if (application.ios) {
            application.on("launch", () => {
            utils.ios.getter(UIApplication, UIApplication.sharedApplication).statusBarStyle = UIStatusBarStyle.LightContent;
            });
        }

        // Make the Android status bar transparent.
        // See http://bradmartin.net/2016/03/10/fullscreen-and-navigation-bar-color-in-a-nativescript-android-app/
        // for details on the technique used.
        if (application.android && platform.device.sdkVersion >= "21") {
            application.android.on("activityStarted", () => {
            const View = android.view.View;
            const window = application.android.startActivity.getWindow();
            window.setStatusBarColor(0x000000);

            const decorView = window.getDecorView();
            decorView.setSystemUiVisibility(
                View.SYSTEM_UI_FLAG_LAYOUT_STABLE
                | View.SYSTEM_UI_FLAG_LAYOUT_HIDE_NAVIGATION
                | View.SYSTEM_UI_FLAG_LAYOUT_FULLSCREEN
                | View.SYSTEM_UI_FLAG_IMMERSIVE_STICKY);
            })
        }
    },
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
