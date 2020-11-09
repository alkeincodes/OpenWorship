<template>
    <nav>
        <el-button class="no-border no-bg">Logo</el-button>
        <el-button class="no-border no-bg">Black</el-button>
        <el-button class="no-border no-bg">Clear</el-button>
        <el-button
            type="danger"
            @click="livePreview"
            :plain="!isLive"
        >
            {{ isLive ? 'End Live' : 'Go Live' }}
        </el-button>
    </nav>
</template>

<script>
    export default {
        name: 'ViewController',
        data() {
            return {
                currentSessionHash: null
            }
        },
        computed: {
            user() {
                return this.$store.getters['auth/user']
            },
            isLive() {
                if(this.user) {
                    return this.user.current_session != null
                }
            }
        },
        methods: {
            livePreview() {
                if(!this.isLive) {
                    this.initiateLiveSession()
                } else {
                    this.endLiveSession()
                }
            },
            async initiateLiveSession() {
                this.isLoading = true
                let stageContent = this.$store.getters['stage/stageContent']

                console.log(stageContent)

                if(this.user.current_session) {
                    this.$message.error('You already have a live session.');
                } else {
                    const { stage, user } = await this.$store.dispatch('stage/createStageSession', stageContent)
                    this.$store.commit('auth/SET_CURRENT_USER', user)

                    let userContent = {
                        key: 'user_id',
                        value: user.id
                    }
                    await this.$store.commit('stage/SET_STAGE_CONTENT', userContent)

                    if(user.current_session) {
                        let data = {
                            key: 'session_hash',
                            value: user.current_session
                        }
                        this.$store.commit('stage/SET_STAGE_CONTENT', data)
                    }
                    this.currentSessionHash = stage.hash
                    window.open(`/stage/${stage.hash}`)
                }
            },
            async endLiveSession() {
                const { data } = await this.$store.dispatch('stage/endStageSession', this.user.current_session)
                console.log(result)
                this.$store.commit('auth/SET_CURRENT_USER', data)
            }
        }
    }
</script>
