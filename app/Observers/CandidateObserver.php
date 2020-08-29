<?php

namespace App\Observers;

use App\Candidate;
use App\CodeAcademyScraping;
use App\Course;
use App\Progress;

class CandidateObserver
{

    public function created(Candidate $candidate)
    {
        $scrappy_codeAcademy = new CodeAcademyScraping($candidate);
        $course = $candidate->promotion->courses[0];

        $progress_codeAcademy = Progress::fromCodeAcademy($scrappy_codeAcademy, $course);

        return $progress_codeAcademy;
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
