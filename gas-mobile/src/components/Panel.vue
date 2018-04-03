<template>
  <Page>
    <ActionBar title="Publiservicios">
        <NavigationButton text="Atrás" />
    </ActionBar>
    <StackLayout orientation="vertical">
      <Image src="~/images/stove.jpg"/>
       <ListView separatorColor="transparent" borderWidth="1" borderColor="#000" class="list" for="item in items" @itemTap="onItemTap"  >
        <v-template>
          <StackLayout class="list-item" orientation="horizontal" >
            <Label :text="item.icon" class="icon" />
            <Label :text="item.text" />
          </StackLayout>
        </v-template>
      </ListView> 
    </StackLayout>
  </Page>
</template>
<script>
  export default {
    created () {
      if(this.$store.state.session) {
        const problem = {icon: String.fromCharCode('0xea08'), text: 'Reportar un problema', route: '/mails'} 
        this.items.push(problem)
      }
    },
    data(){
      return{
        items :[
          {icon: String.fromCharCode('0xe903'), text: 'Beneficios del gas natural', route: '/beneficios'},
          {icon: String.fromCharCode('0xe991'), text: 'Procesos y costos de instalación', route: '/instalacion'},
        ]
      }
    },
    methods: {
      onItemTap(e) {
          this.$router.push('/panel'+e.item.route)
      }
    }
  }
</script>
<style scoped>
  .list {
    height: 100%;
  }
  .list-item {
    padding: 14;
    font-size: 18; 
    color: #000;
  }
</style>
