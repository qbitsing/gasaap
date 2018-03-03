<template>
    <Page actionBarHidden="true">
        <StackLayout>
            <TextField hint="E-mail."/>
            <TextField hint="Contraseña." secure="true"  />
            <TextField hint="Nombres y Apellidos"/>
            <TextField hint="Teléfono"/>
            <TextField hint="Confirmar Contraseña." secure="true"  />
            <button @tap="$router.push('/init')" class="registrer">Registrarse</button>  
            <button class="volver" @tap="$router.push('/home')">Volver</button>  
        </StackLayout>
    </Page>
</template>
<script>
   
</script>
<style scoped>

    StackLayout{
        padding: 25;    
    }

    button, TextField{
        margin-top: 6;
        border-radius: 50;
    }

    .registrer{
        margin-top:20;
        background: #35a3;
        color: #fff;
    }

    TextField {
        margin-top: 20;
        background: rgba(35,30,30,.1);
        padding: 10 15;
    }

    .volver{
        width: 100;
        height: 40;
    }


</style>
