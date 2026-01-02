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
  margin: 35px 0;
  hr {
    width: 100%;
    color: black;
    margin: 26px 0;
  }
  a {
    color: white;
    background-color: black;
    padding: 11px 35px;
    margin: 5px 45px;
    white-space: nowrap;
    font-family: "raleway", sans-serif;
    text-transform: uppercase;
    font-size: 0.85rem;
    font-style: normal;
    font-weight: 700;
  }
}
</style>