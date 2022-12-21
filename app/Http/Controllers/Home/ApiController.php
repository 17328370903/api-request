<?php

namespace App\Http\Controllers\Home;

use App\Models\Api;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiController extends BaseController
{
    public function addDir()
    {
        $data = request()->post();
        $validator = Validator::make( $data, [
            'project_id' => [ 'required' ],
            'name'       => [
                'required',
                'max:50',
            ],
        ] );
        $validator->validated();
        $project_id = $data[ 'project_id' ];
        $p_id = $data[ 'p_id' ] ?? 0;
        $project = Project::where( 'id', $project_id )
                          ->where( 'user_id', Auth::id() )
                          ->first();
        if ( !$project ) abort( 404 );
        $api = new Api();
        $api->type = 1;
        $api->name = $data[ 'name' ];
        $api->p_id = $p_id;
        $api->project_id = $project_id;
        $api->save();
        return $this->successJson();
    }

    public function addApi()
    {
        $data = request()->post();
        $validator = Validator::make( $data, [
            'project_id' => [ 'required' ],
            'name'       => [
                'required',
                'max:50',
            ],
            'url'        => [ 'required' ],
        ] );
        $validator->validated();
        $data[ 'user_id' ] = Auth::id();
        Api::create( $data );
        return $this->successJson();
    }

    public function info()
    {
        $id = request()->all( 'id' );
        $api = Api::where( 'id', $id )
                  ->first();
        if ( !$api ) {
            return $this->errorJson( '数据不存在' );
        }
        return $this->successJson( $api->toArray() );
    }

    public function update()
    {
        $data = request()->post();
        $validator = Validator::make( $data, [
            'id'         => [ 'required' ],
            'project_id' => [ 'required' ],
            'name'       => [
                'required',
                'max:50',
            ],
            'url'        => [ 'required' ],
        ] );
        $validator->validated();
        $api = Api::where( 'id', $data[ 'id' ] )
                  ->first();
        if ( !$api ) {
            return $this->errorJson();
        }
        $api->update($data);
        return $this->successJson();
    }

    public function request()
    {
        $data = request()->post();
        $validator = Validator::make( $data, [
            'url'        => [ 'required','active_url' ],
        ] );
        $validator->validated();

        $header = [];
        if(!empty( $data['header'])){
            foreach ( $data['header'] as $datum ) {
                if($datum['name']){
                    $header[$datum['name']] = $datum['value'];
                }
            }
        }
        $body = [];
        if(!empty( $data['body'])){
            foreach ( $data['body'] as $datum ) {
                if($datum['name']){
                    $body[$datum['name']] = $datum['value'];
                }
            }
        }



        $curl = curl_init();

        $curl_set = [
            CURLOPT_URL            => $data['url'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER     => array_merge( $header,[ 'User-Agent: Apifox/1.0.0 (https://www.apifox.cn)' ]),
        ];



        if($data['method'] == 1){
            $curl_set[CURLOPT_CUSTOMREQUEST] = 'POST';
            $curl_set[CURLOPT_POSTFIELDS] = $body;
        }else if($data['method'] == 0){
            $curl_set[CURLOPT_CUSTOMREQUEST] = 'GET';
        }
        curl_setopt_array( $curl, $curl_set);
        $response = curl_exec( $curl );

        curl_close( $curl );
        return $this->successJson(['result'=>$response,'t'=>http_build_query($body)]);
    }

}
