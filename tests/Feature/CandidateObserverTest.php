<?php

namespace Tests\Feature;

use App\Candidate;
use App\Promotion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CandidateObserverTest extends TestCase
{
    use RefreshDatabase;

    public function test_when_created_candidate_create_progress()
    {
        $promotion = factory(Promotion::class)->create();
        factory(Candidate::class)->create(['promotion_id'=>$promotion->id,
            'sololearn' => 'https://www.sololearn.com/Profile/6700255',
            'codeacademy'=>'https://www.codecademy.com/profiles/sergioliveresamor_fullstackphysio']);

        $this->assertDatabaseHas('candidates', ['id'=>1]);
        $this->assertDatabaseHas('progress', ['id'=>1]);

    }
}
