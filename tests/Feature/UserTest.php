<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Http\Middleware\CheckTenantStatus;
use Illuminate\Http\Request;

use App\Models\Domain;

class SiteFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     */    use RefreshDatabase;

    /** @test */
    public function it_can_display_the_index_page()
    {
        $user = User::factory()->create(); // The create() method requires parentheses to work.
        $response = $this->actingAs($user)->get(route('sites.index')); // actingAs() should be called before making the request.


        $response->assertStatus(200);
   }

 /** @test */
    public function it_can_show_the_create_form()
    {
        $user=User::factory()->create();
        $response = $this->actingAs($user)->get(route(name: 'sites.create'));

        $response->assertStatus(200);
        $response->assertViewIs('sites.create');
    }


 /** @test */
    public function it_can_store_a_new_site()
    {
        $user=SuperAdmin::factory()->create();

        $data = [
            'name' => 'Test',
            'email' => 'Test',
            'password' =>'1234567890',
            'status' => '1',
        ];

        $response = $this->actingAs($user)->post(route('sites.store'), $data);


        $this->assertDatabaseHas('users', [
            'name' => 'Test',
            'email' => 'Test',
            'password' =>'1234567890',
            'status' => '1',
        ], 'mysql') ;





    }

 /** @test */
        public function it_can_show_the_edit_form()
        {

            $user = User::factory()->create();

            $response = $this->actingAs($user)->get(route('user.edit', $user));
            $response->assertStatus(200);
            $response->assertViewIs('sites.edit');

        }

 /** @test */
 public function test_site_with_status_zero_cannot_access()
 {
     // Create a user with status 0

     $site=Site::factory()->create(['status'=> 0]);
     $domain=new Domain();
     $domain->domain=$site->name.'.localhost';

     $domain->site_id=$site->id;
     $domain->save();
     $domain1=$domain->domain;

     $response = $this->get($domain1);

     // Assert that the user is not authenticated
     $response->assertStatus(404);

     // Assert that a redirection or error message occurs

 }
}
