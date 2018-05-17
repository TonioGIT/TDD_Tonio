<?php
/**
 * Created by PhpStorm.
 * User: antoine.doussan
 * Date: 16/05/2018
 * Time: 13:16
 */

namespace Tests\Feature;


use Tests\TestCase;
use App\Project;


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

    public function testProjectFactoryDbURL()
    {
        $project = factory(Project::class)->create();
        $response =$this->get('/projects');
        $response->assertSee($project->project_name);
    }

}