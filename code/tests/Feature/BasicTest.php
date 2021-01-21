<?php

namespace Tests\Feature;

use Tests\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic test example.
     * art migrate:fresh --env=testing && art test --stop-on-failure
     *
     * @return void
     */
    public function testHome()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSeeInOrder(['Q1', 'Q2', 'Q3']);
    }

    public function testQ1()
    {
        $this->get(route('q1.page'))
            ->assertStatus(200)
            ->assertSeeText('Average Debt over the last 4 years');
    }

    public function testQ2()
    {
        $this->get(route('q2.page'))
            ->assertStatus(200)
            ->assertSeeText('John Smith is being asked to open his mouth by Dr. Patel.');
    }

    public function testQ3()
    {
        $this->get(route('q3.page'))
            ->assertStatus(200)
            ->assertSeeInOrder(['Choice A', 'Choice B', 'Choice C']);

        $this->post(route('q3.post', [
            'choices' => json_encode(['Haha', 'Hoho', 'calculus']),
        ]))
            ->assertStatus(200)
            ->assertJsonMissingValidationErrors(['choices']);
    }
}
