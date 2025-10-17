<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 5),
            'last_name' => $this->faker->lastName,
            'first_name'=> $this->faker->firstName,
            'gender'=>$this->faker->randomElement([1, 2, 3]),
            'email'=> $this->faker->safeEmail,
            'tel1'=>'080',
            'tel2'=> $this->faker->numerify('####'),
            'tel3'=> $this->faker->numerify('####'),
            'address'=> $this->faker->city() . $this->faker->streetAddress(),
            'building'=> $this->faker->secondaryAddress(20),
            'detail'=> $this->faker->text(120),
        ];
    }
}
