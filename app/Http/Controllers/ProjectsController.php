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

    public function getDetails2($id) {
//        $details = DB::select('select * from projects WHERE id=?', [$id]);
        $details = Project::find($id);
//        $project = new Project();
//        $user = $details->user->find($details->user_id);
//        dump($user);
        return view ('/projectmodif', ["project"=>$details]);
    }

//    public function checkUserIsProjectOwner($id)
//    {
//
//        return view ('/projectmodif', ["project"=>$details]);
//
//    }

    public function publish(Request $request, $id)
    {
        $details = Project::find($id);
        $projects = Project::find($id);
        $userId = \Auth::user()->id;

        // Controller que le User Authentifié et = au user du projet.
        if (($userId) == $projects->user->id) {

            $projects->project_name = $request->input('project_name');
            $projects->description = $request->input('description');
            $projects->save();
            return redirect()->route('edit', ['id' => $projects->id]);

        }
        else {
            return view ('/projectmodif', [
                "project" => $details,
                'is_error' => true
            ]);
        }
    }

}
