<template>
    <div class="stage-preview__container">
        <video autoplay muted loop id="stage">
            <source src="/stage_backgrounds/background.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        <div class="stage-preview__content">
            <div class="presentation-main">
                <pre>
                    {{ stageContent.line }}
                </pre>
            </div>
            <div class="presentation-meta">
                <div class="title">
                    {{ stageContent.title }} - {{ stageContent.by }}
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
        name: 'StagePreview',
        props: {
            data: Object
        },
        computed: {
            stageContent() {
                let stage = this.$store.getters['stage/stageContent']
                let content;

                if(stage) {
                    let displayable = JSON.parse(stage.displayable)
                    content = {
                        title: displayable.title,
                        line: displayable.line,
                        by: displayable.by
                    }
                }

                return content
            }
        },
        created() {
            console.log(this.content)
        }
    }
</script>
