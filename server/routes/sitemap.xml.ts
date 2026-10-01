const pages = ['/', '/competences', '/realisations', '/cv', '/ensavoirplus', '/contact']

export default defineEventHandler((event) => {
  const { siteUrl } = useRuntimeConfig(event).public
  const urls = pages.map((path) => `  <url><loc>${siteUrl}${path}</loc></url>`).join('\n')
  setHeader(event, 'content-type', 'application/xml; charset=utf-8')
  return `<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
${urls}
</urlset>
`
})
