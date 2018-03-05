<template>
    <Page actionBarHidden="true">
        <TabView :selectedIndex="selectedIndex">
            
            <TabViewItem title="Proceso">
                <TabView>
                    <TabViewItem title="otro">
                        <Label text="hola"></Label>
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