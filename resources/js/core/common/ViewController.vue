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
                isLive: false
            }
        },
        computed: {
            user() {
                return this.$store.getters['auth/user']
            }
        },
        methods: {
            livePreview() {
                if(this.isLive) {
                    this.initiateLiveSession()
                    this.isLive = false
                } else {
                    this.endLiveSession()
                }
            },
            async initiateLiveSession() {
                this.isLoading = true
                let payload = {
                    user_id: this.user.id,
                    background: 'NEWS',
                    stage_type: 'bible-view',
                    displayable: 'content-lamang'
                }

                payload.displayable = JSON.stringify(payload)

                const stage = await this.$store.dispatch('stage/createStageSession', payload)

                window.open(`/stage/${stage.hash}`)
            },
            endLiveSession() {

            }
        }
    }
</script>
