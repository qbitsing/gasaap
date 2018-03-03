<template>
    <Page actionBarHidden="true">
        <StackLayout>
            <Label text="labelText"/>
            <TextField hint="E-mail."/>
            <TextField hint="Contraseña." secure="true"  />
            <TextField hint="Nombres y Apellidos"/>
            <TextField hint="Teléfono"/>
            <TextField hint="Confirmar Contraseña." secure="true"  />
            <button @tap="$router.push('/init')" class="registrer">Registrarse</button>  
            <button @tap="$router.push('/home')">Volver</button>  
        </StackLayout>
    </Page>
</template>
<script>
   
</script>
<style scoped>

label{
    font-size: 40;
    text-align: center;
}

StackLayout{
    padding: 25;    
}

button, TextField{
    border-radius: 50;
}

.registrer{
    margin-top:20;
    background: #35a3;
    color: #fff;
}

TextField {
        margin-top: 20;
        background: rgba(35,30,30,.4);
        padding: 10 15;
        color: #fff;
    }


</style>
