@extends('index.layouts.userLoginBase')
@section('title',"首页")
@section('main')
    <div class="card mt-2">
        <div class="card-body">
            <form action="/" class="row mt-4 search-form" >
                <div class="col-auto">
                    <label for=""></label>
                    <input value="{{$search['name'] ?? ''}}" name="name" type="text" class="form-control form-control-sm" placeholder="请输入项目名称">
                </div>
                <div class="col-auto">
                    <button class="btn btn-light btn-sm">
                        <img src="/static/icons/search.svg" alt="Bootstrap" width="16" height="16">
                        搜 索</button>
                    <a class="btn btn-primary btn-sm" href="/project/add">创建项目</a>
                </div>
            </form>
            <table class="table table-bordered mt-4">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>项目名称</th>
                    <th>简介</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="/project/info?id={{$item->id}}">{{ $item->name }}</a></td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a type="button" class="btn btn-info btn-sm" href="/project/edit?id={{$item->id}}">编辑</a>
                                <button type="button" class="btn btn-danger btn-sm">刪除</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{$projects->links()}}
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>

    </script>
@endsection

<style>
    td {
       text-align: center;
    }
    th {
        text-align: center;
    }
</style>

