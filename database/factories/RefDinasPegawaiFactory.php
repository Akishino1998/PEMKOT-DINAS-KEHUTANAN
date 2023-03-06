<?php

namespace Database\Factories;

use App\Models\RefDinasPegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

class RefDinasPegawaiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RefDinasPegawai::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user' => $this->faker->randomDigitNotNull,
        'id_dinas' => $this->faker->randomDigitNotNull,
        'id_jabatan' => $this->faker->randomDigitNotNull,
        'nama' => $this->faker->word,
        'nip' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
