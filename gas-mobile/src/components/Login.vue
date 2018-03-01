<template>
    <StackLayout>
        <label text="login"/>
        <button @tap="$router.replace('/home')">Volver</button>
        <button @tap="$router.replace('/init')">Iniciar sesion</button>
    </StackLayout>
</template>
