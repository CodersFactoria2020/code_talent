<?php

namespace App\Observers;

use App\Candidate;
use App\CodeAcademyScraping;
use App\Course;
use App\Progress;
use App\SoloLearnScraping;

class CandidateObserver
{

    public function created(Candidate $candidate)
    {
        $scrappy_codeAcademy = new CodeAcademyScraping($candidate);
        $scrappy_soloLearn = new SoloLearnScraping($candidate);
        $courses = $candidate->promotion->courses;


        foreach($courses as $course)
        {
            if($course->platform == 'codeacademy')
            {
                Progress::fromCodeAcademy($scrappy_codeAcademy, $course);
            }

            if($course->platform == 'sololearn')
            {
                Progress::fromSoloLearn($scrappy_soloLearn, $course);
            }
        }


    }

    public function updated(Candidate $candidate)
    {
        //
    }

    public function deleted(Candidate $candidate)
    {
        //
    }

    public function restored(Candidate $candidate)
    {
        //
    }

    public function forceDeleted(Candidate $candidate)
    {
        //
    }
}
