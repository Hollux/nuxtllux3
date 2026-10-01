# Image de PRODUCTION de hollux.fr : site généré en statique (nuxt generate),
# servi par nginx. Apache (debianProd) relaie le domaine vers ce conteneur.
#
#   --target build -> génération seule (CI, à chaque push : toutes les pages se construisent)
#   (défaut)       -> nginx + site généré

# --- Dépendances ---
FROM node:24-alpine AS deps

WORKDIR /app
COPY package.json package-lock.json ./
# postinstall (nuxt prepare) relancé au build, une fois le code copié
RUN npm ci --no-audit --no-fund --ignore-scripts

# --- Génération ---
FROM deps AS build

COPY . .
RUN npm run generate

# --- Runtime : fichiers statiques servis par nginx ---
FROM nginx:1.27-alpine

COPY deploy/nginx.conf /etc/nginx/conf.d/default.conf
COPY --from=build /app/.output/public /usr/share/nginx/html

ARG APP_VERSION=dev
LABEL org.opencontainers.image.version=${APP_VERSION} \
      org.opencontainers.image.source="https://hlxvault.tail47a825.ts.net:8443/hollux/hollux"

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
