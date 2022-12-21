<?php

namespace App\Http\Controllers\Home;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{
    public function index()
    {
        $name = request()->input('name') ?? '';
        $map = [
            ['user_id','=',Auth::id()],
            ['name','like',"%{$name}%"]
        ];
        $projects = Project::where($map)->paginate(20);

        return view('index.index',['projects' => $projects,'search' => request()->all()]);
    }

}
