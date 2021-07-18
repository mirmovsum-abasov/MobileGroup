<?php

namespace Tests\Feature\Admin;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeesTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->testCreate()->create();
        $this->actingAs($user, 'web');
    }

    public function testIndex()
    {
        $company   = Company::factory()->count(1)->create();
        $employees = Employee::factory()->count(1)->make(['company_id' => $company->first()->id]);
        $this->get("/admin/employees")->assertStatus(200);
    }

    public function testCreate()
    {
        $this->get('/admin/employees/create')->assertStatus(200);
    }

    public function testStore()
    {
        $params = $this->validParams();
        $this->post('/admin/employees', $params)
            ->assertStatus(302);

        $this->assertDatabaseHas('employees', $params);
    }

    public function testStoreFail()
    {
        $this->post('/admin/employees')
            ->assertStatus(302)
            ->assertSessionHas('errors');
    }


    private function validParams($overrides = [])
    {
        $company = Company::factory()->create();
        return array_merge([
            'company_id' => $company->id,
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'surname' => $this->faker->lastName,
        ], $overrides);
    }
}
