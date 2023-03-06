<?php

namespace Database\Factories;

use App\Models\RefDinas;
use Illuminate\Database\Eloquent\Factories\Factory;

class RefDinasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RefDinas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_jenis_dinas' => $this->faker->randomDigitNotNull,
        'nama_dinas' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
