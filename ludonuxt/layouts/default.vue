<template>
  <div>
    <div>
      <b-navbar toggleable="lg" type="dark" variant="dark">
        <b-navbar-brand to="/">NavBar</b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
          <b-navbar-nav>
            <b-nav-item to="/listeadmin">listeAdmin</b-nav-item>
          </b-navbar-nav>
          <b-navbar-nav class="ml-auto">
            <template v-if="user">
              <b-nav-item-dropdown :text="user.username" right>
                <b-dropdown-item href="#" v-on:click="logout()">Logout</b-dropdown-item>
              </b-nav-item-dropdown>
            </template>

            <template v-else>
              <b-nav-item-dropdown text="Anon." right>
                <b-dropdown-item href="#" v-on:click="login()">Login</b-dropdown-item>
              </b-nav-item-dropdown>
            </template>
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>
    </div>
    <nuxt />
  </div>
</template>

<script>
export default {
  methods: {
    login() {
      this.$router.push("login");
    },
    logout() {
      this.$store.commit("user/logout");
    }
  },
  computed: {
    user() {
      return this.$store.state.user.user;
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
