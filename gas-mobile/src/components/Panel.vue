<template>
  <Page>
    <ActionBar title="Publiservicios" flat="true"/>      
    <StackLayout orientation="vertical">
      <Image src="~/images/stove.jpg"/>
       <ListView for="item in items" @itemTap="onItemTap">
        <v-template >
          <Label :text="item.text" class="listView"/>
        </v-template>
      </ListView> 
     
    </StackLayout>
  </Page>
</template>
<script>
  export default {
    data(){
      return{
        items :[
          {text: 'Beneficios del gas natural', route: '/beneficios'},
          {text: 'Procesos y costos de instalación', route: '/instalacion'},
          {text: 'Reportar un problema con el gas natural', route: '/home'}
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
  ActionBar {
    background: #338adf;
    color:#fff;
    
  }

  .listView{
    color: #000;
    font-size: 17;
    padding: 20;
  }
</style>
