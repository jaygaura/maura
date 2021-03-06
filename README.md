# Solutions by Jay Gaura
### [UI page with a section for each task](http://maura.can)
see below on how to spin up the server


## Q1
`
SELECT
	code,
	AVG(govt_debt / gdp_per_capita) as debt,
	COUNT(DISTINCT year) as years
FROM homestead.countries
WHERE year >= YEAR(NOW()-interval 5 year) AND gdp_per_capita > 40000
GROUP BY code
HAVING years = 4
ORDER BY debt desc
LIMIT 3;
`
* note - I use interval = 5 year because my sample data only includes years up to 2020 (2010 - 2020)
* [UI page - Query results](http://maura.can/q1)
* To populate data run `art migrate:fresh --seed`

### Classes and Methods

* Controller [code/app/Http/Controllers/Controller@Q1page()](code/app/Http/Controllers/Controller.php#L18)
* View [code/resources/views/q1.blade.php](code/resources/views/q1.blade.php)

## Q2

* [UI page - Simple visual demo](http://maura.can/q2)

### Classes and Methods

* Controller [code/app/Http/Controllers/Controller@Q2page()](code/app/Http/Controllers/Controller.php#L40)
* The OOP schematic classes [code/app/Helpers](code/app/Helpers)
* View [code/resources/views/q2.blade.php](code/resources/views/q2.blade.php)

## Q3

* [UI page - the Form](http://maura.can/q3)
### Classes and Methods

* Controller, get method [code/app/Http/Controllers/Controller@Q3page()](code/app/Http/Controllers/Controller.php#L67)
* Controller, post method [code/app/Http/Controllers/Controller@Q3post()](code/app/Http/Controllers/Controller.php#L80)
* Request Validation [code/app/Http/Requests/Q3PostRequest.php](code/app/Http/Requests/Q3PostRequest.php)
* View [code/resources/views/q3.blade.php](code/resources/views/q3.blade.php)

## Unit Testing

* Basic HTTP Test [code/tests/Feature/BasicTest.php](code/tests/Feature/BasicTest.php)
* to run tests `art migrate:fresh --env=testing && art test --stop-on-failure`

## How to spin up the server
(assuming you have git, vagrant and composer already installed)

* clone the repository
* `composer install`
* update [ip address](Homestead.yaml#L1) (if needed) and [local folder](Homestead.yaml#L10)
* you will also need to set up virtual host on host machine `10.0.0.20 maura.can` (I did not use a vagrant plugin to manage hosts automatically).
* `vagrant up`
* `vagrant ssh`
* now on the guest machine
* `cd code` or just `www`
* `composer install`
* `yarn install`
* `cp .env.example .env`
* `art key:generate`
* `art migrate --seed`
* [open in the browser](http://maura.can).