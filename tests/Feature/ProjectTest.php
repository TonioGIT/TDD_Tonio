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
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ProjectTest extends TestCase

{
    use RefreshDatabase;

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

    public function testProjectNameDetectedInDetailsPage()
    {
        $project = factory(Project::class)->create();
//        dd($project);
//        dd($project->id);
        $response = $this->get('/projectsedit/'.$project->id);
        $response->assertSee($project->project_name);
    }

    public function testRelationBetweenModelsProjectUser()
    {
        $user = factory(User::class)->create();
        $project = factory(Project::class, 7)->create(['user_id' => $user->id]);
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection', $user->projects);

        // compter le nombre de projets (je dois en avoir 7)
        $this->assertEquals(7, count($user->projects));

        // $user->projects[0] -> je dois avoir une instance de Project
        $this->assertInstanceOf(Project::class, $user->projects[0]);
    }

    public function testProjectHasAUser()
    {
        $project = factory(Project::class)->create();
        $this->assertInstanceOf(User::class, $project->user);
    }

    public function testAffichageAuthorNameInDetailsPage()
    {
        $user = factory(User::class)->create();
        $project = factory(Project::class)->create(['user_id' => $user->id]);
//        $details = Project::find($user->id);
//        $response = $details->user->find($details->user_id);
//        $this->assertEquals($user->name, $response->name);

        $this->assertEquals($user->name, $project->user->name);
//        dd($user, $response);
    }

//    public function testNoAccessToModificationPageIfNotAuthor()
//    {
//        // Etant donné un projet et un user.
//        $project = factory(Project::class)->create();
//        $user = factory(User::class)->create();
//
//        // Lorsqu'on essaye d'aller sur la page projectmodif avec l'id du projet et le user authentifié.
//        $response = $this->actingAs($user)->get('/projectmodif/'.$project->id);
//
//        // Alors on doit voir la phrase 'Vous nêtes pas lauteur de ce projet, impossible de le modifier !!!'.
//        $response->assertSee('Vous nêtes pas lauteur de ce projet, impossible de le modifier !!!');
//    }

    public function testNoModificationIfNotAuthor()
    {
        // Etant donné un projet et un user.
        $project = factory(Project::class)->create();
        $user = factory(User::class)->create();

        // Lorsqu'on authentifie le user et qu'il fait un post.
        $datas = array(
            "project_name"=>$project->project_name,
            "description"=>$project->description,
        );
//        dump($project);
//        dump($user);
        $response = $this->actingAs($user)->post('/projectmodif/'.$project->id, $datas);
        // Alors on doit voir le message d'erreur dans la page projectmodif.
        $response->assertSee('<h1>Impossible de mofifier le projet, vous n\'en n\'êtes pas l\'auteur !!!</h1>');
    }
}