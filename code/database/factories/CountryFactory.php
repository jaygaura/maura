<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $code = null;
        $year = null;
        do {
            $code   = $this->faker->countryCode;
            $year   = $this->faker->numberBetween(2010, 2020);
            $record = Country::where([
                ['code', '=', $code],
                ['year', '=', $year],
            ])->count();
        } while ($record > 0);
        return [
            'code'           => $code,
            'year'           => $year,
            'gdp_per_capita' => $this->faker->randomFloat(2, 10000, 99999999),
            'govt_debt'      => $this->faker->randomFloat(2, 10000, 99999999),
        ];
    }
}
