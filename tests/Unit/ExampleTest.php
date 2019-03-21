<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

    public function testBlocksEqualsNull()
    {
    	$studentService = new \App\Services\FacultyService();
    	$resp = $studentService->blocksEqualsNull(1);
        $this->assertEquals(count($resp), 2);
    	$this->assertEquals($resp["blocks"], null);
        $this->assertEquals($resp["faculty_id"], 1);
    }

    public function testBlocksPreferenceEqualsNull()
    {
        $studentService = new \App\Services\FacultyService();
        $resp = $studentService->coursesEqualsNull(8);
        $this->assertEquals(count($resp), 2);
        $this->assertEquals($resp["courses"], null);
        $this->assertEquals($resp["faculty_id"], 8);
    }
}