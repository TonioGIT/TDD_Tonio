<?php

namespace App\Http\Controllers;
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

//    public function getDetails($id) {
//        $details = DB::select('select project_name, description, date_of_creation, author from boissons WHERE id=?', [$id]);
//        return view ('projects/projectsedit', ["boisson"=>$details[0]]);
//    }
}
