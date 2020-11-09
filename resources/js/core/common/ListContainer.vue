<template>
  <div class="list__container card">
      <div class="search-list">
          <icon-search />
          <input type="text" placeholder="Find Bible...">
      </div>
      <ul>
        <li
            v-for="(item, index) in data"
            :key="index"
            :class="{active: activeItem == index}"
            @click="selectItem(index)"
            @dblclick="forceUpdate(index)"
        >
            {{ item }}
        </li>
      </ul>
  </div>
</template>

<script>
    export default {
        name: 'ListContainer',
        props: {
            data: Array,
            type: String
        },
        data() {
            return {
                activeItem: null
            }
        },
        methods: {
            selectItem(item) {
                this.activeItem = item
                switch(this.type) {
                    case 'chapters':
                        this.$emit('update-verse', this.data[item])
                    break;
                    case 'books':
                        this.$emit('update-book', this.data[item])
                    break;
                }
            },
            forceUpdate(index) {
                if(this.activeItem == index) {
                    this.$emit('force-update')
                }
            }
        }
    }
</script>
