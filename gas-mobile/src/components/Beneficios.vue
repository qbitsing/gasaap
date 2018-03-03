<template>
    <Page actionBarHidden="true">
        <TabView :selectedIndex="selectedIndex">
            
            <TabViewItem title="uno" >
                <TabView>
                    <TabViewItem title="otro">
                        <Label text="hola"></Label>
                    </TabViewItem>
                    <TabViewItem title="otro2">
                        <Label text="hola2"></Label>
                    </TabViewItem>
                </TabView>
            </TabViewItem>
            <TabViewItem title="Úsalo siempre" >
                <Image src="~/images/hola.png"/>
            </TabViewItem>
            <TabViewItem title="Mayor Utilidad">
                <label text="Content for Tab 2"></label>
            </TabViewItem>
            <TabViewItem title="Más seguridad">
                <label text="Content for Tab 2"></label>
            </TabViewItem>
     
            
        </TabView>
        
    </Page>
</template>

<style scoped>
    
</style