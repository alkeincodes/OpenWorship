<template>
    <div class="stage-preview__container bg-preview">
        <video autoplay muted loop id="stage">
            <source src="/stage_backgrounds/background.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    </div>
</template>


<script>
    export default {
        name: 'StageBgPreview',
        props: {
            content: Object
        },
        created() {
            console.log(this.content)
        },
        mounted() {

        }
    }
</script>
