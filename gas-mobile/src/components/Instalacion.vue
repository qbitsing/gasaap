<template>
    <Page>
        <ActionBar title="Publiservicios" flat="true"/>      
        <TabView :selectedIndex="selectedIndex" tabTextColor="#fff"    selectedTabTextColor="#fff" androidSelectedTabHighlightColor="#fff"  tabBackgroundColor="#fff">
            <TabViewItem title="Proceso">
                <TabView >
                    <TabViewItem title="otro">
                        <Label ref="tv" text="hola"></Label>
                    </TabViewItem>
                    <TabViewItem title="otro2">
                        <Label text="hola2"></Label>
                    </TabViewItem>
                </TabView>
            </TabViewItem>
            <TabViewItem title="Costo" >
                <Image src="~/images/hola.png"/>
            </TabViewItem>  
        </TabView>
    </Page>
</template>
<script>
export default {
    created() {
        const tb = this.$refs
        console.log(tb)
    }
}
</script>
