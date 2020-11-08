<template>
  <div class="main__container">
      <main-header />
      <bible-view />
  </div>
</template>

<script>
    import MainHeader from '@/core/modules/App/Header'
    import BibleView from '@/core/modules/Main/views/BibleView'

    export default {
        name: 'MainComponent',
        props: {
            user: Object
        },
        components: {
            MainHeader,
            BibleView
        },
        mounted() {
            this.$store.commit('auth/SET_CURRENT_USER', this.user)
        }
    }
</script>
