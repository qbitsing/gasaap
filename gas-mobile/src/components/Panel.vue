<template>
  <Page>
    <ActionBar title="Publiservicios" flat="true"/>      
    <StackLayout orientation="vertical">
      <Image src="~/images/stove.jpg"/>
       <ListView for="item in items" @itemTap="onItemTap"  >
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
  import {mapState} from 'vuex'
  export default {
    created () {
      console.log(this.$store)
      console.log(this.userData)
    },
    computed: mapState(['userData']),
    data(){
      return{
        items :[
          {icon: String.fromCharCode('0xe903'), text: 'Beneficios del gas natural', route: '/beneficios'},
          {icon: String.fromCharCode('0xe991'), text: 'Procesos y costos de instalación', route: '/instalacion'},
          {icon: String.fromCharCode('0xea08'), text: 'Reportar un problema con el gas natural', route: '/home'}
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
    padding: 14;
    font-size: 18; 
    color: #000;
  }


</style>
