<?php

namespace Tests\Unit;

use App\Progress;
use Tests\TestCase;


class ProgressTest extends TestCase
{

    public function test_if_SoloLearn_have_a_course_name()
    {
        $allCourses = include 'tests/Unit/AllCoursesMock.php';
        $progress = new Progress();
        $courseInfo = $progress->getPhpCourseInfo($allCourses);

        $this->assertContains('PHP Tutorial', $courseInfo);
    }
}
