@extends('index.layouts.base')

<style>
    .header {
        height: 50px;
        border: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 10px;
    }

    .header .user {
        width: 300px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .user .username {

    }

    .user .avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: #eee;
        margin-left: 5px;
    }

    #main {
        height: calc(100% - 50px);
        min-height: 750px;
        margin: 0;
        padding: 0;
    }
</style>
@section('content')
    <header class="header">
        <div class="menu">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">首页</a>
                </li>
            </ul>
        </div>
        <div class="user">
            <div class="username">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        {{\Illuminate\Support\Facades\Auth::user()->name}}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item active" href="#">修改资料</a></li>
                        <li><a class="dropdown-item" href="#"
                               onclick="NOTICE.confirm({confirms:()=>jump('/outlogin',0)})">退出登录</a></li>
                    </ul>
                </div>

            </div>
            <div class="avatar">
                <img src="" alt="">
            </div>

        </div>
    </header>
    <section class="main" id="#main">
        @yield('main')
    </section>
@endsection

