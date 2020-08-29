<?php

namespace Tests\Feature;

use App\Candidate;
use App\Course;
use App\Observers\CandidateObserver;
use App\Promotion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CandidateObserverTest extends TestCase
{
    use RefreshDatabase;

    public function test_when_created_candidate_create_progress()
    {
        $promotion = factory(Promotion::class)->create();
        $courses = factory(Course::class,2)->create(['name'=>'CSS']);

        Promotion::all()->each(function ($pro) use ($courses)
        {
            $pro->courses()->saveMany($courses);
        });

        $candidate = factory(Candidate::class)->create(['promotion_id'=>$promotion->id,
            'sololearn' => 'https://www.sololearn.com/Profile/6700255',
            'codeacademy'=>'https://www.codecademy.com/profiles/sergioliveresamor_fullstackphysio']);
        $observer = new CandidateObserver;
        //$progress =$observer->created($candidate);

        $this->assertDatabaseHas('progress', ['percentage'=>100]);
        //$this->assertEquals('100', $progress->percentage);
    }

    public function test_creates_a_progres_for_each_course()
    {
        $promotion = factory(Promotion::class)->create();
        $courses = factory(Course::class,8)->create(['name'=>'CSS']);

        Promotion::all()->each(function ($pro) use ($courses){$pro->courses()->saveMany($courses);
        });

        factory(Candidate::class)->create(['promotion_id'=>$promotion->id,
            'sololearn' => 'https://www.sololearn.com/Profile/6700255',
            'codeacademy'=>'https://www.codecademy.com/profiles/sergioliveresamor_fullstackphysio']);

        $this->assertDatabaseCount('progress', 8);
    }



}
