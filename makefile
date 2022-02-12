# ref: https://localheinz.com/blog/2018/01/24/makefile-for-lazy-developers/
.PHONY: it
it: coding-standards tests


.PHONY: coding-standards
coding-standards: vendor
	vendor/bin/phpmd src ansi rulesets.xml
	vendor/bin/psalm src -c psalm.xml
	vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.php --diff --verbose

.PHONY: code-coverage
code-coverage: vendor
	vendor/bin/phpunit --coverage-text

.PHONY: tests
tests: vendor
	vendor/bin/phpunit

vendor: composer.json composer.lock
	composer validate
	composer install