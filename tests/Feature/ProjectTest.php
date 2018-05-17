<?php
/**
 * Created by PhpStorm.
 * User: antoine.doussan
 * Date: 16/05/2018
 * Time: 13:16
 */

namespace Tests\Feature;


use Tests\TestCase;

class ProjectTest extends TestCase

{
    public function testBasicTest()
    {
        $response = $this->get('/projects');
        $response->assertStatus(200);
    }

    public function testHtmlTitleDetected()
    {
        $response = $this->get('/projects');
        $response->assertSee('<h1>Liste des projets</h1>');
    }

    public function test()
    {

    }

}