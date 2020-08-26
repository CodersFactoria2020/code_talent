<?php

namespace Tests\Unit;

use App\Candidate;
use App\CodeAcademyScraping;
use App\Course;
use App\Progress;
use App\SoloLearnScraping;
use Tests\TestCase;


class ProgressTest extends TestCase
{
    private $scrappy;
    private $course;

    public function setUp(): void
    {
        parent::setUp();
        $candidate = factory(Candidate::class)->make(['sololearn' => 'https://www.sololearn.com/Profile/6700255']);
        $this->scrappy = new SoloLearnScraping($candidate);

        $this->course = new Course('PHP');
    }

    public function test_if_course_has_a_percentage()
    {
        $data = $this->scrappy->getCourse($this->course);
        $progress_percentage = Progress::fromSoloLearn($this->scrappy, $this->course)->getPercentage();

        $this->assertClassHasAttribute('percentage',Progress::class);
        $this->assertEquals($data[1],$progress_percentage);
    }

    public function test_convert_percentage_string_to_integer()
    {
        $progress_percentage = Progress::fromSoloLearn($this->scrappy, $this->course)->getPercentage();

        $this->assertIsInt($progress_percentage);
    }

    public function test_get_percentage_from_course()
    {
        $mock_courses = include 'tests/Unit/Mock_CoursesSoloLearn.php';

        $percentage = Progress::fromSoloLearn( $this->scrappy, $this->course)->getPercentage();

        $this->assertTrue(in_array($percentage,$mock_courses[4]));
        $this->assertEquals($percentage, $mock_courses[4][1]);
    }

}
