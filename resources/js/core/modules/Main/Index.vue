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
        async mounted() {
            await this.$store.commit('auth/SET_CURRENT_USER', this.user)
            let payload = {
                key: 'user_id',
                value: this.user.id
            }
            await this.$store.commit('stage/SET_STAGE_CONTENT', payload)

            if(this.user.current_session) {
                let data = {
                    key: 'session_hash',
                    value: this.user.current_session
                }
                this.$store.commit('stage/SET_STAGE_CONTENT', data)
            }
        }
    }
</script>
