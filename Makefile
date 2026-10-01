SHELL := /bin/bash
.DEFAULT_GOAL := help

NVM     := source $$HOME/.nvm/nvm.sh >/dev/null && nvm use >/dev/null &&
PATTERN := [n]uxtllux3/node_modules/.bin/nuxt
LOG     := nohup.out
URL     := http://127.0.0.1:3001 (holluxdev.hollux.fr)

.PHONY: help install up down restart status logs generate preview clean release versions

##@ Aide
help: ## Affiche cette liste
	@awk 'BEGIN {FS = ":.*##"} \
		/^##@/ { printf "\n\033[1;33m%s\033[0m\n", substr($$0, 5) } \
		/^[a-zA-Z_-]+:.*##/ { printf "  \033[36m%-10s\033[0m %s\n", $$1, $$2 }' $(MAKEFILE_LIST)
	@echo

##@ Dev
up: ## Démarre le serveur de dev en arrière-plan
	@if pgrep -f "$(PATTERN)" >/dev/null; then echo "⚠️  Déjà lancé → $(URL)"; exit 0; fi; \
	$(NVM) nohup npm run dev > $(LOG) 2>&1 & \
	echo "🚀 Démarré → $(URL)  (logs : make logs)"

down: ## Arrête le serveur de dev
	@if pkill -f "$(PATTERN)"; then \
		while pgrep -f "$(PATTERN)" >/dev/null; do sleep 0.2; done; echo "🛑 Arrêté."; \
	else echo "✅ Rien à arrêter."; fi

restart: down up ## Redémarre le serveur de dev

status: ## Indique si le serveur tourne
	@pgrep -af "$(PATTERN)" || echo "💤 Aucun serveur de dev."

logs: ## Suit les logs du serveur (Ctrl+C pour quitter)
	@tail -f $(LOG)

##@ Projet
install: ## Installe les dépendances
	@$(NVM) npm install

clean: ## Supprime les caches et builds (.nuxt, .output)
	@rm -rf .nuxt .output && echo "🧹 Nettoyé."

##@ Production
generate: ## Génère le site statique dans .output/public (vérification locale)
	@$(NVM) npm run generate

preview: ## Sert le site généré sur le port 3002
	@$(NVM) npx serve .output/public -l 3002

# Une version = un tag git vX.Y.Z = l'image hollux-site:vX.Y.Z, construite par la CI
# de la forge au push du tag (.forgejo/workflows/ci.yml). Mise en ligne sur debianProd :
#   prod hollux deploy vX.Y.Z
release: ## Crée une version : la forge génère le site et construit l'image (make release v=v3.0.0)
	@test -n "$(v)" || { echo "Usage : make release v=vX.Y.Z  (dernière : $$(git describe --tags --abbrev=0 2>/dev/null))"; exit 1; }
	@echo "$(v)" | grep -Eq '^v[0-9]+\.[0-9]+\.[0-9]+$$' || { echo "Format attendu : vX.Y.Z"; exit 1; }
	@test "$$(git rev-parse --abbrev-ref HEAD)" = "master" || { echo "À lancer depuis master"; exit 1; }
	@test -z "$$(git status --porcelain)" || { echo "Modifications non commitées"; exit 1; }
	git fetch -q origin
	@test "$$(git rev-parse HEAD)" = "$$(git rev-parse origin/master)" || { echo "master n'est pas synchronisé avec origin/master (push/pull d'abord)"; exit 1; }
	git tag -a $(v) -m "$(v)"
	git push origin $(v)
	@echo "Version $(v) taguée. Génération puis image : https://hlxvault.tail47a825.ts.net:8443/hollux/hollux/actions"
	@echo "Puis sur debianProd : prod hollux deploy $(v)"

versions: ## Liste les 10 dernières versions
	@git fetch -q --tags origin 2>/dev/null || true
	@git tag --sort=-creatordate --format='  %(refname:short)  %(creatordate:short)  %(subject)' | head -10
