.PHONY: dev stop status

dev:
	@echo "🚀 Starting dev server..."
	@nohup npm run dev > nohup.out 2>&1 &
	@echo "✅ Started. Logs: tail -f nohup.out"
	@echo "Arrêter avec: pkill -f nuxtllux3"

stop:
	@echo "🛑 Stopping nuxtllux3..."
	@pkill -f "nuxtllux3/node_modules/.bin/nuxt" && echo "✅ Stopped." || echo "✅ Rien à arrêter."

status:
	@ps aux | grep "nuxtllux3/node_modules/.bin/nuxt" | grep -v grep || echo "✅ Aucun dev server."
