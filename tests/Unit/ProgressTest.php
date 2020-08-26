<?php

namespace Tests\Unit;

use App\CodeAcademyScraping;
use App\Course;
use App\Progress;
use App\SoloLearnScraping;
use Tests\TestCase;


class ProgressTest extends TestCase
{
    public function test_if_course_has_a_percentage()
    {
        $mock_courses = include 'tests/Unit/Mock_CoursesSoloLearn.php';
        $course = new Course();
        $course->setName('PHP');

        $scrappy = new SoloLearnScraping();
        $data = $scrappy->getCourse($mock_courses, $course);


        $progress = new Progress();
        $progress->setPercentage('100');
        $progress_percentage = $progress->getPercentage();

        $this->assertClassHasAttribute('percentage',Progress::class);
        $this->assertEquals($data[1],$progress_percentage);

    }

    public function test_convert_percentage_string_to_integer()
    {
        $progress = new Progress();
        $progress->setPercentage('100');
        $progress_percentage = $progress->getPercentage();

        $this->assertIsInt($progress_percentage);
    }


}
