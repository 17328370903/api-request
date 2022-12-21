@extends('index.layouts.base')

@section('title','登录')

@section('content')
    <form action="" class="form" onsubmit="return false">
        <div class="row mt-3 text-end">
            <label for="email" class=" col col-form-label">邮&nbsp;&nbsp;&nbsp;箱:</label>
            <div class="col-sm-9">
                <input type="email" id="email" class="form-control" name="email">
            </div>
        </div>
        <div class="row mt-3 text-end">
            <label for="password" class=" col col-form-label">密&nbsp;&nbsp;&nbsp;码:</label>
            <div class="col-sm-9">
                <input id="password" type="password" class="form-control" name="password">
            </div>
        </div>
        <div class="row mt-3 text-end">
            <label for="code" class="col col-form-label">验证码:</label>
            <div class="col-sm-4">
                <img src="{{captcha_src()}}" alt="图片已经损坏" onclick="checkCaptcha(this)" id="code-image">
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="code" id="code">
            </div>
        </div>
        <div class="row mt-3">
            <button class="col-10 btn btn-primary offset-1 login" onclick="login()">登录</button>
        </div>
        <div class="row mt-3">
            <a class="col-10 btn btn-light offset-1" href="/register">注册</a>
        </div>
    </form>

@endsection
@section('script')
    <script>
        function checkCaptcha(img){
            img.setAttribute('src',"{{captcha_src()}}&num="+Math.random())
        }
        function login(){
            let btn = document.querySelector('.login')
            btn.disabled = true;
            let formInputs = document.querySelectorAll("form [name]")
            let data = {}
            formInputs.forEach(input => {
                console.log(input.value)
                data[input.name] = input.value;
            })
            post({url:"/login",data}).then(res =>{
                NOTICE.success('登录成功');
                jump("/")
            }).catch(err=>{
                checkCaptcha(document.querySelector('#code-image'))
            }).finally(() => {
                btn.disabled = false;
            })
        }
    </script>
@endsection


<style>
    .form{
        width: 400px;
        height:300px;
        border:1px solid #eee;
        padding:10px;
        margin: 0 auto;
        margin-top: calc(50vh - 150px);
        border-radius: 10px;
        box-shadow: 1px 2px 1px #eee;
    }
</style>
