<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateBlogTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    /** @test */
    function guest_can_submit_a_new_blog()
    {
        $response = $this->post('/blogs', [
            'title' => 'Example Title',
            'content' => 'Example description.',
        ]);

        $this->assertDatabaseHas('blogs', [
            'title' => 'Example Title'
        ]);

        $response
            ->assertStatus(302)
            ->assertHeader('Location', url('/blogs'));

        $this
            ->get('/blogs')
            ->assertSee('Example Title');
    }

    /** @test */
        function blog_is_not_created_if_validation_fails()
        {
            $response = $this->post('/blogs');

            $response->assertSessionHasErrors(['title', 'content']);
        }
}
