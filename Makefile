-include .env
-include .version

changelog := CHANGELOG.md

.DEFAULT_GOAL := help
.PHONY: $(filter-out $(changelog) docs vendor, $(MAKECMDGOALS))

help: ## Show this help message
	@printf "\033[33mPHP Unit Converter \033[0m(\033[34mversion $(VERSION)\033[0m) by Jordan Brauer\n\n"
	@printf "\033[33mUsage:\033[0m\n  make [target] [arg=\"val\"...]\n\n\033[33mTargets:\033[0m\n"
	@grep -E '^[-a-zA-Z0-9_\.\/]+:.*?## .*$$' $(firstword $(MAKEFILE_LIST)) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[32m%-15s\033[0m %s\n", $$1, $$2}'

analysis: vendor ## Analyze the source code and manifest document(s)
	@composer validate
	@composer normalize --dry-run
	@bin/phpcs fix --config=.php_cs --show-progress=dots --ansi -vvv --dry-run
	@vendor/bin/phpinsights --no-interaction \
		--min-quality=70 \
		--min-complexity=90 \
		--min-architecture=70 \
		--min-style=90

changelog: $(changelog) ## Generate a new changelog for versions defined in .version config
$(changelog): vendor .version
	@git tag $(VERSION)
	@/usr/bin/php -f vendor/bin/conventional-changelog -- \
		--history \
		--from-tag="$(VERSION_INITIAL)" \
		--to-tag="$(VERSION_LATEST)" \
		--ver="$(VERSION)"
	@git tag -d $(VERSION)
	@touch $(changelog)

coverage: vendor ## Generate a coverage report from the tests for CI/CD
	@vendor/bin/phpunit --coverage-clover=./clover.xml --configuration=./phpunit.xml --testsuite=fullspec --color=never
	#@vendor/bin/pest --coverage --coverage-clover=./clover.xml --configuration=./phpunit.xml --color=never

docs: $(wildcard src/*.php) $(wildcard src/**/*.php) ## Generate a new set of documentation
	@/usr/bin/php -f bin/phpdoc -- -d ./src -t ./docs
	@touch docs

lock: vendor
	@composer update --lock --ignore-platform-reqs

release: analysis docs changelog ## Release the version as defined in .version config
	@git commit -am "chore(release): $(VERSION)"
	@git tag $(VERSION)
	@git push origin $(VERSION)
	@git push

style: vendor ## Format the source code and other documents in the repository
	@composer normalize
	@bin/phpcs fix --config=.php_cs --show-progress=dots --ansi -vvv

test: vendor ## Run tests
	#@vendor/bin/phpunit --configuration=./phpunit.xml --testsuite=fullspec --color=always
	@vendor/bin/pest --configuration=phpunit.xml --color=always

vendor: composer.json ## Install vendor dependencies
	@composer install --optimize-autoloader --no-suggest --ignore-platform-reqs
	@touch vendor

