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
* Class `code/app/Http/Controllers/Controller.php`, method `Q1page()`
* To populate data run `art migrate:fresh --seed`

## Q2

* [UI page - Simple visual demo](http://maura.can/q2)
* Class `code/app/Http/Controllers/Controller.php`, method `Q2page()`
* The other classes are in `code/app/Helpers`

## Q3

* [UI page - the Form](http://maura.can/q3)
* Class `code/app/Http/Controllers/Controller.php`, method `Q3page()`

## How to spin up the server (assuming you have git, vagrant and composer already installed)
* clone the repository
* `composer install`
* `vagrant up`
* `vagrant ssh`
* now on the guest machine
* `cd code` or just `www`
* `composer install`
* `art migrate --seed`
* `art key:generate`
* `yarn install`
* `cp .env.example .env`
* will also need to set up virtual host on host machine `10.0.0.20 maura.can` (I did not use a vagrant plugin to manage hosts automatically). If 10.0.0.20 is unavailble it can be changed in `code/Homestead.yaml`.
* let me know if I missed anything (things not working) - writing this from memory.