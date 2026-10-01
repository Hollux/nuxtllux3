<template>
  <div class="layout">
    <SiteHeader />
    <main class="content">
      <slot />
    </main>
    <SiteFooter />
    <ScrollTop />
    <DarkBoot />
  </div>
</template>

<style scoped>
.layout {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

.content {
  flex: 1;
}
</style>
