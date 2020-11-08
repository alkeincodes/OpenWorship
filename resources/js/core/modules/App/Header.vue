<template>
  <div class="site-header__container">
      <div class="site-header__left">
          <h4>Open Worship</h4>
          <nav>
              <a href="#" class="active">Bible</a>
              <a href="#">Praise & Worship</a>
          </nav>
      </div>
      <div class="site-header__right">
          <!-- <a href="#" @click="logout">Logout</a> -->
          <el-dropdown trigger="click">
             <user-name-avatar
                avatar="https://source.unsplash.com/random/35x35"
                custom-class="clickable"
            />
            <el-dropdown-menu slot="dropdown">
                <el-dropdown-item
                    icon="el-icon-close"
                    @click.native="logout"
                >
                    Logout
                </el-dropdown-item>
            </el-dropdown-menu>
            </el-dropdown>
      </div>
  </div>
</template>

<script>
    import UserNameAvatar from '@/core/common/UserNameAvatar';

    export default {
        name: 'Header',
        components: {
            UserNameAvatar
        },
        methods: {
            logout() {
                this.$store.dispatch('auth/logout')
                console.log('eytety')
            }
        }
    }
</script>
