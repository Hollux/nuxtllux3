SHELL := /bin/bash
NVM := source $$HOME/.nvm/nvm.sh >/dev/null && nvm use >/dev/null &&

.PHONY: install dev stop status generate preview

install:
	@$(NVM) npm install

dev:
	@echo "🚀 Starting dev server on 127.0.0.1:3001 (holluxdev.hollux.fr)..."
	@$(NVM) nohup npm run dev > nohup.out 2>&1 &
	@echo "✅ Started. Logs: tail -f nohup.out"

stop:
	@echo "🛑 Stopping nuxtllux3..."
	@pkill -f "nuxtllux3/node_modules/.bin/nuxt" && echo "✅ Stopped." || echo "✅ Rien à arrêter."

status:
	@pgrep -af "nuxtllux3/node_modules/.bin/nuxt" || echo "✅ Aucun dev server."

# Site statique à déposer sur l'hébergement OVH : .output/public
generate:
	@$(NVM) npm run generate

preview:
	@$(NVM) npx serve .output/public -l 3002
