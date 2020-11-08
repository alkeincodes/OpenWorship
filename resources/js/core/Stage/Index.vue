<template>
    <div class="stage-view__container">
        <video autoplay muted loop id="stage">
            <source src="/stage_backgrounds/background.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        <div class="stage-view__content">
            <div class="presentation-main">
                <pre>
                    I Love You Lord
                    For Your Mercy Never Fails Me
                </pre>
            </div>
            <div class="presentation-meta">
                <div class="title">
                    Goodness of God - Bethel Music
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
        created() {
            console.log(this.content)
        }
    }
</script>

<style lang="scss">
    .stage-view {
        &__container {
            height: 100vh;
            font-size: 3rem;
            color: #fff;
            text-shadow: 2px 2px #000;
            user-select: none;
            video {
                position: fixed;
                top: 0;
                left: 0;
                object-fit: cover;
                width: 100%;
                height: 100%;
            }
        }
        &__content {
            z-index: 2;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;

            .presentation {
                &-main {
                    pre {
                        font-size: 5rem;
                        color: #fff;
                        white-space: pre-line;
                        text-align: center;
                        font-weight: bold;
                    }
                }
                &-meta {
                    display: flex;
                    align-items: flex-end;
                    justify-content: space-between;
                    position: absolute;
                    bottom: 0;
                    width: 100%;
                    padding: 30px;

                    .title {
                        font-size: 2rem;
                    }

                    .branding {
                        opacity: .3;
                    }
                }
            }
        }
    }
</style>
