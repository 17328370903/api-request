<?php

namespace App\Http\Controllers\Home;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjectController extends BaseController
{
    /**
     * 創建項目
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create()
    {
        $data = request()->post();
        $this->validator( $data)->validated();
        $data['user_id'] = Auth::id();
        Project::create($data);
        return $this->successJson();
    }

    /**
     * 項目詳情
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function info()
    {
        $id = request()->input('id')??0;
        $project = Project::where('id',$id)->with('api')->where('user_id',Auth::id())->first();
        if(!$project){
            abort(404);
        }
        $api = $project->api->toArray();
        $menu = getTree(dealTree( $api));

        return view('index.project.info',['project'=>$project,'menu'=>$menu]);
    }

    /**
     * 編輯項目
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit()
    {
        $id = request()->input('id')??0;
        $project = Project::where('id',$id)->where('user_id',Auth::id())->first();
        if(!$project){
            abort(404);
        }
        return view('index.project.edit',['project'=>$project]);
    }

    /**
     * 修改項目
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update()
    {
        $data = request()->post();
        $this->validator( $data)->validated();
        $project = Project::where('id',$data['id'])->where('user_id',Auth::id())->first();
        if(!$project){
            return $this->errorJson('数据不存在');
        }
        $data['user_id'] = Auth::id();
        Project::create($data);
        $project->update([
            'name' => $data['name'],
            'description' => $data['description']
        ]);
        return $this->successJson();
    }


    //验证
    protected function validator($data)
    {
        return Validator::make( $data, [
            'name' => ['required','max:100'],
        ]);
    }


}
