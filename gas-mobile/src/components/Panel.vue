<template>
  <Page>
    <ActionBar title="Publiservicios" flat="true"/>      
    <StackLayout orientation="vertical">
      <Image src="~/images/stove.jpg"/>
       <ListView for="item in items" @itemTap="onItemTap" >
        <v-template>
          <StackLayout class="list-item" orientation="horizontal">
            <Label :text="item.icon" class="icon"/>
            <Label :text="item.text"/>
          </StackLayout>
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
          {icon: String.fromCharCode('0xe903'), text: 'Beneficios del gas natural', route: '/beneficios'},
          {icon: 'e991', text: 'Procesos y costos de instalación', route: '/instalacion'},
          {icon: 'ea08', text: 'Reportar un problema con el gas natural', route: '/home'}
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
  .list-item {
    padding: 10;
  }
  .list-item Label {
    font-size: 18;
  }
</style>
