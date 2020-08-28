<?php

namespace App\Observers;

use App\Candidate;
use App\CodeAcademyScraping;
use App\Progress;

class CandidateObserver
{

    public function created(Candidate $candidate)
    {
        $scrappy_codeAcademy = new CodeAcademyScraping($candidate);
        $course = $candidate->promotion->course;

        //$progress_codeAcademy = Progress::fromCodeAcademy($scrappy_codeAcademy, $course);

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
