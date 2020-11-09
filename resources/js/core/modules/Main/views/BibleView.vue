<template>
    <div class="split__container">
        <div class="split__left">
            <div class="list-header">
                <h5>Bible</h5>
                <h5>New King James Version</h5>
            </div>
            <list-container
                :data="books"
                type="books"
                @update-book="setBibleBook"
            />
            <list-container
                :data="chapters"
                type="chapters"
                @update-verse="setBibleVerse"
                @force-update="sendStageContent"
            />
        </div>
        <div class="split__right">
            <div class="stage__controller">
                <div></div>
                <view-controller :data="chapters" />
            </div>
            <div class="stage__user-preview">
                <stage-preview />
                <stage-bg-preview />
            </div>
        </div>
    </div>
</template>

<script>
    import ViewController from '@/core/common/ViewController'
    import ListContainer from '@/core/common/ListContainer'
    import StagePreview from '@/core/common/StagePreview'
    import StageBgPreview from '@/core/common/StageBgPreview'

    export default {
        name: 'BibleView',
        components: {
            ViewController,
            ListContainer,
            StagePreview,
            StageBgPreview
        },
        data() {
            return {
                books: [
                    'Genesis',
                    'Exodus',
                    'Leviticus',
                    'Numbers',
                    'Deuteronomy',
                    'Joshua',
                    'Judges',
                    'Ruth',
                    '1 Samuel',
                    '2 Samuel',
                    '1 Kings',
                    '2 Kings',
                ],
                chapters: [
                    'Sa sinugdan gibuhat sa Dios ang mga langit ug ang yuta.',
                    'Ug ang yuta awa-aw ug walay sulod; ug ang kangitngit diha sa ibabaw sa nawong sa kahiladman; ug ang Espiritu sa Dios naglihok sa ibabaw sa nawong sa mga tubig.',
                    'Ug miingon ang Dios: Mahimo ang kahayag: ug dina ang kahayag.',
                    'Ug nakita sa Dios ang kahayag nga kini maayo; ug gilain sa Dios ang kahayag gikan sa kangitngit.',
                    'Ug gihinganlan sa Dios ang kahayag nga Adlaw, ug ang kangitngit gihinganlan niya nga Gabii: ug dihay kahaponon ug dihay kabuntagon, usa ka adlaw.',
                    'Ug miingon ang Dios: Mahimo ang usa ka hawan sa taliwala sa mga tubig, ug pagabahinon niini ang mga tubig gikan sa mga tubig.',
                    'Ug gibuhat sa Dios ang hawan ug gilain ang mga tubig nga diha sa ilalum sa hawan gikan sa mga tubig nga diha sa ibabaw sa hawan; ug nahimo kini.',
                    'Ug gihinganlan sa Dios ang hawan nga Langit. Ug dihay kahaponon ug dihay kabuntagon, adlaw nga ikaduha.',
                    'Ug miingon ang Dios: Matingub ang mga tubig nga anaa sa ilalum sa mga langit ngadto sa usa ka dapit ug tumungha ang yuta nga mamala: ug nahimo kini.',
                    'Ug ang mamala nga dapit gihinganlan sa Dios nga Yuta; ug ang katilingban sa mga tubig iyang gihinganlan nga mga Dagat: ug nakita sa Dios nga kini maayo.',
                ]
            }
        },
        methods: {
            setBibleBook(book) {
                let stageContent = JSON.parse(this.$store.getters['stage/stageContent'].displayable)
                stageContent.title = book
                stageContent.by = 'NKJV'
                stageContent.line = ''

                let payload = {
                    key: 'displayable',
                    value: JSON.stringify(stageContent)
                }

                this.$store.commit('stage/SET_STAGE_CONTENT', payload)
            },
            setBibleVerse(verse) {
                let stageContent = JSON.parse(this.$store.getters['stage/stageContent'].displayable)
                stageContent.line = verse

                let payload = {
                    key: 'displayable',
                    value: JSON.stringify(stageContent)
                }

                this.$store.commit('stage/SET_STAGE_CONTENT', payload)
            },
            sendStageContent() {
                let payload = this.$store.getters['stage/stageContent']
                this.$store.dispatch('stage/updateStageSession', payload)
            }
        },
        created() {
            let payload = {
                key: 'stage_type',
                value: 'bible-view'
            }
            this.$store.commit('stage/SET_STAGE_CONTENT', payload)
        }
    }
</script>
