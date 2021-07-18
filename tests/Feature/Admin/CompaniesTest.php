<?php

namespace Tests\Feature\Admin;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompaniesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker;
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->testCreate()->create();
        $this->actingAs($user, 'web');
    }

    public function testIndex()
    {
        Company::factory()->count(5)->create();
        $this->get("/admin/companies")->assertStatus(200);
    }

    public function testCreate()
    {
        $this->get('/admin/companies/create')->assertStatus(200);
    }

    public function testStore()
    {
        $params = $this->validParams();

        $this->post('/admin/companies', $params)
            ->assertStatus(302);

        $this->assertDatabaseHas('companies', $params);
    }

    public function testStoreFail()
    {
        $this->post('/admin/companies')
            ->assertStatus(302)
            ->assertSessionHas('errors');
    }

    public function testUpdate()
    {
        $company = Company::factory()->create();

        $this->put('/admin/companies/' . $company->id, $this->validParams())->assertStatus(302);

        $this->assertDatabaseHas('companies', ['id' => $company->id]);
    }

    public function testDelete()
    {
        $company = Company::factory()->create();

        $this->delete("/admin/companies/{$company->id}")->assertStatus(302);
    }

    private function validParams($overrides = [])
    {
        return array_merge([
            'name' => $this->faker->company,
            'email' => $this->faker->email,
            'website' => $this->faker->domainName,
        ], $overrides);
    }
}
