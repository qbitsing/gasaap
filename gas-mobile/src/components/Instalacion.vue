<template>
    <Page>
        <ActionBar title="Publiservicios">
            <NavigationButton text="Atrás" />
        </ActionBar>    
        <TabView :selectedIndex="selectedIndex">
            <TabViewItem color="#f00" class="icon" sdkToggleNavButton v-for="item in items" :title="item.title" >
                <Image :src="item.src"/>
            </TabViewItem>  
        </TabView>
    </Page>
</template>
<script>
export default {
    created() {
        const tb = this.$refs
        console.log(tb)
    },
    data() {
        return {
            items: [
                { title: String.fromCharCode('0xe903'), src: '~/images/stove.jpg' },
                { title: String.fromCharCode('0xe907'), src: '~/images/stove.jpg' },
                { title: String.fromCharCode('0xe905'), src: '~/images/stove.jpg' },
                { title: String.fromCharCode('0xe910'), src: '~/images/stove.jpg' },
            ]
        }
    }
}
</script>
