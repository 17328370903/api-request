@extends('index.layouts.userLoginBase')
@section('title','编辑项目')

@section('main')
    <div class="d-flex justify-content-center" style="width:100%;" onsubmit="return false">
        <form action="" class="form mt-4 text-end">
            <input type="hidden" name="id" value="{{$project->id}}">
            <div class="row">
                <label for="" class="col-2 col-form-label text-end">项目名称:</label>
                <div class="col-10">
                    <input  type="text" class="form-control" placeholder="请输入项目名称" name="name" value="{{$project->name}}">
                </div>
            </div>
            <div class="row mt-3">
                <label for="" class="col-2 col-form-label text-end">项目简介</label>
                <div class="col-10">
                    <textarea name="description" class="form-control"  cols="30" rows="10" placeholder="请输入项目简介">{{$project->description}}</textarea>
                </div>
            </div>
            <div class="text-center mt-5 d-flex justify-content-end">
                <button class="btn btn-primary" onclick="add()">保 存</button>
                <div style="width:50px;"></div>
                <a class="btn btn-danger" href="javascript:history.go(-1)">返 回</a>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        function add() {
            let forms = document.querySelectorAll('form [name]')
            let data = {};
            forms.forEach(input => {
                data[input.name] = input.value
            })
            post({url:"/project/update",data}).then(res => {
                NOTICE.success("修改成功")
                jump("/")
            })
            console.log(data)
        }
    </script>
@endsection
<style>
    .form{
        min-width:750px;
        max-width: 1200px;
    }
</style>



