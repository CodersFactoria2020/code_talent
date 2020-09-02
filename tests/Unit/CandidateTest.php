<?php

namespace Tests\Unit;

use App\Candidate;
use App\Course;
use App\Promotion;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
;

class CandidateTest extends TestCase
{
    use RefreshDatabase;

    public function test_inserts_candidate_average_progress_into_candidates_table()
    {
        $promotion = factory(Promotion::class)->create();
        $courses = factory(Course::class,2)->create(['name'=>'CSS', 'platform' => 'sololearn']);

        Promotion::all()->each(function ($pro) use ($courses)
        {
            $pro->courses()->saveMany($courses);
        });

        $candidate = factory(Candidate::class)->create(['promotion_id'=>$promotion->id,
            'sololearn' => 'https://www.sololearn.com/Profile/6700255',
            'codeacademy'=>'https://www.codecademy.com/profiles/sergioliveresamor_fullstackphysio']);

        $this->assertDatabaseHas('candidates', [
            'percentage' => null,
            'last_connection' => null
        ]);

        $percentage = 80.0;
        $last_connection = Carbon::now();
        Candidate::updateProgress($candidate, $percentage, $last_connection);

        $this->assertDatabaseHas('candidates', [
            'percentage' => $percentage,
            'last_connection' => $last_connection
        ]);
    }
}
