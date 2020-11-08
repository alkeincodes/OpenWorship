<template>
    <div class="split__container">
        <div class="split__left">
            <div class="list-header">
                <h5>Bible</h5>
                <h5>New King James Version</h5>
            </div>
            <list-container />
        </div>
        <div class="split__right">
            <div class="stage__controller">
                <div></div>
                <view-controller />
            </div>
        </div>
    </div>
</template>

<script>
    import ViewController from '@/core/common/ViewController'
    import ListContainer from '@/core/common/ListContainer'

    export default {
        name: 'BibleView',
        components: {
            ViewController,
            ListContainer
        }
    }
</script>
