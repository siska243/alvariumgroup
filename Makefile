#---Symfony-And-Docker-Makefile---------------#
# Author: https://github.com/siska243
# License: MIT

#---------------------------------------------#
#---NPM-----#
NPM = npm
NPM_INSTALL = $(NPM) install --force
NPM_UPDATE = $(NPM) update
NPM_BUILD = $(NPM) run build
NPM_DEV = $(NPM) run dev
NPM_WATCH = $(NPM) run watch
#------------#

#---YARN-----#
YARN = yarn
YARN_INSTALL = $(YARN) install
YARN_ADD=$(YARN) add 
YARN_UPDATE = $(YARN) update
YARN_BUILD = $(YARN) run build
YARN_DEV = $(YARN) run dev
YARN_WATCH = $(YARN) run watch
YARN_DEV_LINT = $(YARN) lint
#------------#

#---PHP-----#
PHP=php
PHP_INI=$(PHP) --ini
PHP_CONSOLE = $(PHP) bin/console
PHP_CACHE_CLEAR= $(PHP_CONSOLE) c:c
PHP_SERVER = $(PHP) -S localhost:80 -t "public"

#---SYMFONY--#
SYMFONY = symfony
SYMFONY_SERVER_START = $(SYMFONY) serve -d
SYMFONY_SERVER_STOP = $(SYMFONY) server:stop
SYMFONY_CONSOLE = $(SYMFONY) console
SYMFONY_LINT = $(SYMFONY_CONSOLE) lint:
#------------#

#---COMPOSER-#
COMPOSER = composer
COMPOSER_INSTALL = $(COMPOSER) install
COMPOSER_UPDATE = $(COMPOSER) update
#------------#

## === 📦  NPM ===================================================
npm-install: ## Install npm dependencies.
	$(NPM_INSTALL)
.PHONY: npm-install

npm-update: ## Update npm dependencies.
	$(NPM_UPDATE)
.PHONY: npm-update

npm-build: ## Build assets.
	$(NPM_BUILD)
.PHONY: npm-build

npm-dev: ## Build assets in dev mode.
	$(NPM_DEV)
.PHONY: npm-dev

npm-watch: ## Watch assets.
	$(NPM_WATCH)
.PHONY: npm-watch
#---------------------------------------------#

## === 📦  YARN ===================================================
y-i: ## Install npm dependencies.
	$(YARN_INSTALL)
.PHONY: y-i

y-a: ## add new dependencies use like this COMMAND_ARGS="your dependency" make y-a".
	$(YARN_ADD) $(COMMAND_ARGS)
.PHONY: y-a
y-u: ## Update npm dependencies.
	$(YARN_UPDATE)
.PHONY: y-u

y-b: ## Build assets.
	$(YARN_BUILD)
.PHONY: y-b

y-d: ## Build assets in dev mode.
	$(YARN_DEV)
.PHONY: y-d

y-w: ## Watch assets.
	$(YARN_WATCH)
.PHONY: y-w

before-commit : ## before commit.
	$(YARN_ADD) --dev eslint && $(YARN_DEV_LINT)
.PHONY: before-commit
#---------------------------------------------#

## === 📦  SYMFONY ===================================================
sf: ## List and Use All Symfony commands (make sf command="commande-name").
	$(SYMFONY_CONSOLE) $(command)
.PHONY: sf

sf-start: ## Start symfony server.
	$(SYMFONY_SERVER_START)
.PHONY: sf-start

sf-start-d: ## Start symfony server background.
	$(SYMFONY_SERVER_START) -d
.PHONY: sf-start-d

sf-stop: ## Stop symfony server.
	$(SYMFONY_SERVER_STOP)
.PHONY: sf-stop

sf-cc: ## Clear symfony cache.
	$(SYMFONY_CONSOLE) cache:clear
.PHONY: sf-cc

sf-log: ## Show symfony logs.
	$(SYMFONY) server:log
.PHONY: sf-log

sf-dc: ## Create symfony database.
	$(SYMFONY_CONSOLE) doctrine:database:create --if-not-exists
.PHONY: sf-dc

sf-dd: ## Drop symfony database.
	$(SYMFONY_CONSOLE) doctrine:database:drop --if-exists --force
.PHONY: sf-dd

sf-su: ## Update symfony schema database.
	$(SYMFONY_CONSOLE) doctrine:schema:update --force
.PHONY: sf-su

sf-mm: ## Make migrations.
	$(SYMFONY_CONSOLE) make:migration
.PHONY: sf-mm

sf-dmm: ## Migrate.
	$(SYMFONY_CONSOLE) doctrine:migrations:migrate --no-interaction
.PHONY: sf-dmm

sf-fixtures: ## Load fixtures.
	$(SYMFONY_CONSOLE) doctrine:fixtures:load --no-interaction
.PHONY: sf-fixtures

sf-me: ## Make symfony entity
	$(SYMFONY_CONSOLE) make:entity
.PHONY: sf-me

sf-mc: ## Make symfony controller
	$(SYMFONY_CONSOLE) make:controller
.PHONY: sf-mc

sf-mf: ## Make symfony Form
	$(SYMFONY_CONSOLE) make:form
.PHONY: sf-mf

sf-perm: ## Fix permissions.
	chmod -R 777 var
.PHONY: sf-perm

sf-sudo-perm: ## Fix permissions with sudo.
	sudo chmod -R 777 var
.PHONY: sf-sudo-perm

sf-dump-env: ## Dump env.
	$(SYMFONY_CONSOLE) debug:dotenv
.PHONY: sf-dump-env

sf-dump-env-container: ## Dump Env container.
	$(SYMFONY_CONSOLE) debug:container --env-vars
.PHONY: sf-dump-env-container

sf-dump-routes: ## Dump routes.
	$(SYMFONY_CONSOLE) debug:router
.PHONY: sf-dump-routes

sf-open: ## Open project in a browser.
	$(SYMFONY) open:local
.PHONY: sf-open

sf-open-email: ## Open Email catcher.
	$(SYMFONY) open:local:webmail
.PHONY: sf-open-email

sf-check-requirements: ## Check requirements.
	$(SYMFONY) check:requirements
.PHONY: sf-check-requirements
sf-d-y: ## launch symfony serve background tasks and yarn watch.
		$(SYMFONY) serve -d && $(YARN_WATCH)
.PHONY: s-d-y
sf-d-n: ## launch symfony serve background tasks and npm watch
		$(SYMFONY) serve -d && $(NPM_WATCH)

#---------------------------------------------#

## === 📦  PHP ===================================================

p-s: ## php serve.
	$(PHP_SERVER)
p-c: ## php console.
	$(PHP_CONSOLE)
#---------------------------------------------#

## === 📦  COMPOSER ===================================================

composer-install: ## Install composer dependencies.
	$(COMPOSER_INSTALL)
.PHONY: composer-install

composer-update: ## Update composer dependencies.
	$(COMPOSER_UPDATE)
.PHONY: composer-update

composer-validate: ## Validate composer.json file.
	$(COMPOSER) validate
.PHONY: composer-validate
composer-validate-deep: ## Validate composer.json and composer.lock files in strict mode.
	$(COMPOSER) validate --strict --check-lock
.PHONY: composer-validate-deep
d-i-y: ## install all dependencies.
	$(COMPOSER) install && $(PHP_CACHE_CLEAR) && $(PHP_CONSOLE) assets:install public && $(YARN) install --force
d-i-n: ## install all dependencies
	$(COMPOSER) install && $(PHP_CACHE_CLEAR) && $(PHP_CONSOLE) assets:install public && $(NPM) install --force

#---------------------------------------------#

## === 🆘  HELP ==================================================
help: ## Show this help.
	@echo "Symfony-And-Docker-Makefile"
	@echo "---------------------------"
	@echo "Usage: make [target]"
	@echo ""
	@echo "Targets:"
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
#---------------------------------------------#
