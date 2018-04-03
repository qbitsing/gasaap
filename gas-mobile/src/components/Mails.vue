<template>
  <Page>
    <ActionBar title="Reportar un Problema">
        <NavigationButton text="Atrás" />
    </ActionBar>
    <StackLayout orientation="vertical">
      <Image src="~/images/stove.jpg"/>
      <StackLayout class="text-container">
        <TextField hint="Asunto" v-model="subject" />            
        <TextView v-model="message" hint="Mensaje"/>
        <Button @tap="send">Enviar</Button>               
      </StackLayout>
    </StackLayout>
  </Page>
</template>
<script>
    export default {
        data () {
            return {
                subject: null,
                message: null
            }
        },
        methods: {
            send () {
                const session = this.$store.state.session
                const body = new FormData()
                body.append('email', session.email)
                body.append('name', session.name)
                body.append('phone', session.phone)
                body.append('document', session.document)
                body.append('subject', this.subject)
                body.append('message', this.message)
                fetch('https://gasapp-api.herokuapp.com/mail', {
                    method: 'POST',
                    body
                })
                .then(e => e.json())
                .then(e => {
                    console.log(e)
                    if(e.status == 200) {
                        alert('Mensaje enviado correctamente, pronto nos pondremos en contacto contigo.')
                        this.subject = null,
                        this.message = null
                        this.$router.push('/panel')
                    } else {
                        alert({
                            title: "Error",
                            message: "Lo sentimos, tu mensaje no se pudo enviar, inténtalo más tarde.",
                        })
                    }
                })
                .catch(e =>{
                    console.log(e)
                    alert({
                        title: "Error",
                        message: "Lo sentimos, tu mensaje no se pudo enviar, inténtalo más tarde.",
                    })
                }) 
            }
        }
    }
</script>
<style scoped>
    .text-container {
        padding: 10 20;
    }
    TextField {
        font-size: 18;        
        placeholder-color: #999;
        color: #333;
    }
    Button {
        background: #338adf;
    }
    TextView {
        padding: 8;
        height:100;
    }
</style>
