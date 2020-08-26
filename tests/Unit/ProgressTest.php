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
    private $scrappy_soloLearn;
    private $scrappy_codeAcademy;
    private $php_course;
    private $html_course;

    public function setUp(): void
    {
        parent::setUp();
        $candidate = factory(Candidate::class)->make(['sololearn' => 'https://www.sololearn.com/Profile/6700255',
            'codeacademy'=>'https://www.codecademy.com/profiles/sergioliveresamor_fullstackphysio']);
        $this->scrappy_soloLearn = new SoloLearnScraping($candidate);
        $this->scrappy_codeAcademy = new CodeAcademyScraping($candidate);

        $this->html_course = new Course('HTML');
        $this->php_course = new Course('PHP');
    }

    public function test_if_course_has_a_percentage()
    {
        $data = $this->scrappy_soloLearn->getCourse($this->php_course);
        $progress_percentage = Progress::fromSoloLearn($this->scrappy_soloLearn, $this->php_course)->getPercentage();

        $this->assertClassHasAttribute('percentage',Progress::class);
        $this->assertEquals($data[1],$progress_percentage);
    }

    public function test_convert_percentage_string_to_integer()
    {
        $progress_percentage = Progress::fromSoloLearn($this->scrappy_soloLearn, $this->php_course)->getPercentage();

        $this->assertIsInt($progress_percentage);
    }

    public function test_get_percentage_from_sololearn_course()
    {
        $mock_courses = include 'tests/Unit/Mock_CoursesSoloLearn.php';

        $percentage = Progress::fromSoloLearn( $this->scrappy_soloLearn, $this->php_course)->getPercentage();

        $this->assertTrue(in_array($percentage,$mock_courses[4]));
        $this->assertEquals($percentage, $mock_courses[4][1]);
    }

    public function test_get_percentage_from_codeacademy_course_is_one_hundred()
    {
        $percentage = Progress::fromCodeAcademy( $this->scrappy_codeAcademy, $this->html_course)->getPercentage();

        $this->assertEquals(100,$percentage);
    }

    public function test_get_percentage_from_codeacademy_course_is_zero()
    {
        $percentage = Progress::fromCodeAcademy( $this->scrappy_codeAcademy, $this->php_course)->getPercentage();

        $this->assertEquals(0,$percentage);
    }

}
