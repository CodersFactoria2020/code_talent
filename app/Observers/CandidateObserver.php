<?php

namespace App\Observers;

use App\Candidate;
use App\CodeAcademyScraping;
use App\Course;
use App\Progress;
use App\SoloLearnScraping;
use Carbon\Carbon;

class CandidateObserver
{

    public function created(Candidate $candidate)
    {
        $scrappy_codeAcademy = new CodeAcademyScraping($candidate);
        $scrappy_soloLearn = new SoloLearnScraping($candidate);
        $courses = $candidate->promotion->courses;

        $percentageSum = 0;
        $lastConnections = [];
        foreach($courses as $course)
        {
            if($course->platform == 'codeacademy')
            {
                $progress = Progress::fromCodeAcademy($scrappy_codeAcademy, $course);
            }

            if($course->platform == 'sololearn')
            {
                $progress = Progress::fromSoloLearn($scrappy_soloLearn, $course);
            }
            $percentageSum += $progress->percentage;
            array_push($lastConnections, $progress->getLastConnection());
        }

        //Obterner la media de los progresoso: Suma de los porcentages / numero de cursos (redondeado)
        $average_progress = floor($percentageSum/count($courses));

        //Obtener la last connection más cercana
        $lastConnection = $this->findClosestDate($lastConnections);

        // Hacer la query en la db para que actualice el candidato con el progreso medio



    private function findClosestDate(array $lastConnections)
    {
        foreach ($lastConnections as $date) {
            $interval[] = abs(strtotime(Carbon::now()) - strtotime($date));
        }
        asort($interval);
        $closest = key($interval);

        return $lastConnections[$closest];
    }
}
