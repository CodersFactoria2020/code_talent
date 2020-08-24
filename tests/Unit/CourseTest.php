<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Course;

class CourseTest extends TestCase
{
    public function test_course_have_a_name()
    {
        $courseName = 'PHP';
        $course = new Course();
        $course->setName($courseName);

        $this->assertClassHasAttribute('name', Course::class );
        $this->assertEquals($courseName, $course->getName());
    }
}
