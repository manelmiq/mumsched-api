<?php
/**
 * Created by PhpStorm.
 * User: emmanuell
 * Date: 3/18/19
 * Time: 1:02 PM
 */

namespace Tests\Feature;

namespace Tests\Feature;

use App\Article;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;



class SectionsTest extends TestCase
{
    public function testCreateSection()
    {

        $payload = [
            'id_course' => '1',
            'id_block' => '1',
            'id_faculty' => '1',
        ];

        $content = $this->json('POST', '/api/sections', $payload

        )->getContent();

        $debug = 1;

        $this->assertTrue(true, true);
    }




}
