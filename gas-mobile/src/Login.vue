<template>
    <Page>
        <StackLayout>
            <Label :text="msg" />
        </StackLayout>
    </Page>
</template>

<script>

  export default {
    data() {
      return {
        msg: 'Welcome to NativeScript-Vue.',
      }
    },
    // components: {
    //   Counter
    // }
  }
</script>

<style>
    Label {
        font-size: 24px;
        text-align: center;
    }
</style>
