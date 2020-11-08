<template>
  <div class="list__container card">
      <div class="search-list">
          <icon-search />
          <input type="text" placeholder="Find Bible...">
      </div>
      <ul>
        <li
            v-for="i in 10"
            :key="i"
        >
            List {{ i }}
        </li>
      </ul>
  </div>
</template>

<script>
    export default {
        name: 'ListContainer'
    }
</script>
