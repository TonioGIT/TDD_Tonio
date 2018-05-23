<?php

namespace App\Http\Controllers;
use App\Project;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProjectsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getProjects() {
        $Projects = DB::select('select * from projects');
        return view ('/projects', compact("Projects"));
    }

    public function getDetails($id) {
//        $details = DB::select('select * from projects WHERE id=?', [$id]);
        $details = Project::find($id);
//        $project = new Project();
//        $user = $details->user->find($details->user_id);
//        dump($user);



        return view ('/projectsedit', ["project"=>$details]);
    }
}
