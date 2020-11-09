<template>
    <div class="stage-view__container">
        <video autoplay muted loop id="stage">
            <source src="/stage_backgrounds/background.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        <div class="stage-view__content">
            <div class="presentation-main">
                <pre>
                    {{ stageContent.line }}
                </pre>
            </div>
            <div class="presentation-meta">
                <div class="title">
                    <span v-if="stageContent">
                        {{ `${stageContent.title} - ` }}{{ stageContent.by }}
                    </span>
                </div>
                <div class="branding">
                    Powered by OpenWorship
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        name: 'StageIndex',
        props: {
            content: Object
        },
        data() {
            return {
                stageContent: null
            }
        },
        created() {
            let content
            if(this.content) {
                let displayable = JSON.parse(this.content.displayable)
                content = {
                    title: displayable.title,
                    line: displayable.line,
                    by: displayable.by
                }

                this.stageContent = content
            }
        },
        mounted() {
            Echo.channel('home')
                .listen('StageMessage', (e) => {
                    // console.log(e.message)
                    let displayable = JSON.parse(e.message.displayable)
                    this.stageContent = {
                        title: displayable.title,
                        line: displayable.line,
                        by: displayable.by
                    }
                })
        }
    }
</script>
