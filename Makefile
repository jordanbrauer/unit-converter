-include .env

.DEFAULT_GOAL := help
.PHONY: $(filter-out vendor, $(MAKECMDGOALS))

help: ## Show this help message
	@printf "\033[33mUsage:\033[0m\n  make [target] [arg=\"val\"...]\n\n\033[33mTargets:\033[0m\n"
	@grep -E '^[-a-zA-Z0-9_\.\/]+:.*?## .*$$' $(firstword $(MAKEFILE_LIST)) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[32m%-15s\033[0m %s\n", $$1, $$2}'

analysis: vendor ## Analyze the source code and manifest document(s)
	@composer validate
	@composer normalize --dry-run
	@composer style -- --dry-run
	@composer analyze

changelog: vendor ## Generate a new changelog

docs: vendor ## Generate a new set of documentation

fmt: vendor ## Format the source code and other documents in the repository
	@composer normalize
	@composer style

release: docs changelog
	# git tag

test: vendor ## Run tests
	@composer test

vendor: composer.json ## Install vendor dependencies
	@composer install --optimize-autoloader --no-suggest --ignore-platform-reqs
	@touch vendor

