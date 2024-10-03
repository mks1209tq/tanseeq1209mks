<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Employee;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'employee_code' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'full_name' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'date_of_birth' => $this->faker->date(),
            'hire_date' => $this->faker->dateTime(),
            'termination_date' => $this->faker->dateTime(),
            'salutation' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'status' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'employee_status' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'company' => $this->faker->company(),
            'gender' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'sponsor' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'nationality' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'category' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'department' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'religion' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'physically_challenged' => $this->faker->regexify('[A-Za-z0-9]{3}'),
            'division' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'designation' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'company_transportation' => $this->faker->regexify('[A-Za-z0-9]{3}'),
            'medical_insurance' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'salary_transfer_letter' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'cost_head' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'entity' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'line_manager_1' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'line_manager_2' => $this->faker->regexify('[A-Za-z0-9]{255}'),
        ];
    }
}
