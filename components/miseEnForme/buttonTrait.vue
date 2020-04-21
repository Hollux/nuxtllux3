<template>
  <div class="buttonTrait">
    <div class="test">
      <hr color="black" />
      <nuxt-link :to="{path: link}">{{ linkName }}</nuxt-link>
      <hr color="black" />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    link: {
      type: String,
      default: "/"
    },
    linkName: {
      type: String,
      default: "link"
    }
  }
};
</script>

<style lang="scss" scoped>
.test {
  display: flex;
  hr {
    width: 100%;
    color: black;
  }
  a {
    color: white;
    background-color: black;
    padding: 0 10px;
    margin: 5px 15px 25px;
    white-space: nowrap;
  }
}
</style>