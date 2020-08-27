<?php

namespace Tests\Unit;

use App\Course;
use Tests\TestCase;
use App\CodeAcademyScraping;

class CodeAcademyScrapingTest extends TestCase
{
    private $all_courses;
    private $scrappy;

    public function setUp(): void
    {
        parent::setUp();
        $this->scrappy = $this->partialMock(CodeAcademyScraping::class, function ($mock) {
            $all_courses = include 'tests/Unit/Mock_CoursesCodeAcademy.php';
            $mock->shouldReceive('getAllCourses')->andReturns($all_courses);
        });

        $this->all_courses= $this->scrappy->getAllCourses('');

    }


    public function test_returns_completed_courses()
    {
        $numberOfCompletedCourses = 4;

        $this->assertEquals($numberOfCompletedCourses, count($this->all_courses));
        $this->assertContains('Learn HTML', $this->all_courses);
    }


    public function test_get_completed_course()
    {
        $targetCourse = new Course('HTML');
        $course = $this->scrappy->getCourse($targetCourse);

        $this->assertStringContainsString( $course->getName(),'Learn HTML');
    }

    public function test_if_course_dont_exist_return_message()
    {
        $targetCourse = new Course('Go');
        $course = $this->scrappy->getCourse($targetCourse);

        $this->assertEquals('No existe el curso seleccionado',$course);
    }

}
