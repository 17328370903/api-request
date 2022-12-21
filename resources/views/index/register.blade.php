@extends('index.layouts.base')

@section('title','注册')

@section('content')
    <form action=""  class="form needs-validation" id="app" novalidate>
        <div class="row mt-3 text-end">
            <label for="" class=" col col-form-label" id="name" >姓&nbsp;&nbsp;&nbsp;名:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="name" v-model="formData.name" name="name"  required>
            </div>
        </div>

        <div class="row mt-3 text-end">
            <label for="" class=" col col-form-label">邮&nbsp;&nbsp;&nbsp;箱:</label>
            <div class="col-sm-9">
                <input type="email" class="form-control" v-model="formData.email" name="email" required>
            </div>
        </div>
        <div class="row mt-3 text-end">
            <label for="" class=" col col-form-label">密&nbsp;&nbsp;&nbsp;码:</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" name="password" v-model="formData.password" required>
            </div>
        </div>
        <div class="row mt-3 text-end">
            <label for="" class=" col col-form-label">重复密码:</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" name="password_confirmation"
                       v-model="formData.password_confirmation" required>
            </div>
        </div>
        <div class="row mt-3 text-end">
            <label for="" class="col col-form-label">验证码:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="code" v-model="formData.code">
            </div>
            <div class="col-sm-3">
                <a class="btn btn-warning" @click="getCode">获取</a>
            </div>
        </div>
        <div class="row mt-3">
            <button class="col-10 btn btn-primary offset-1 register" @click="register" type="submit">注册</button>
        </div>
        <div class="row mt-3">
            <a class="col-10 btn btn-light offset-1" href="/login">登录</a>
        </div>
    </form>

@endsection
@section('script')
    <script>

        new Vue({
            el: "#app",
            data() {
                return {
                    formData: {
                        name: "",
                        email: "",
                        password: "",
                        password_confirmation: "",
                        code: ""
                    }
                }
            },
            methods: {
                getCode() {
                    post({url: "/register/sendEmail"}).then(res => {
                        this.formData.code = res.code;
                    })
                },
                register() {
                    const btn = document.querySelector('.register')
                    btn.disabled = true;
                    post({url: "/register", data: this.formData}).then(res => {
                        NOTICE.success('注册成功')
                        jump("/login")
                    }).finally(() => {
                        btn.disabled = false;
                    })
                }
            }
        })
    </script>
@endsection


<style>
    .form {
        width: 400px;
        /*height:400px;*/
        border: 1px solid #eee;
        padding: 10px;
        margin: 0 auto;
        margin-top: calc(50vh - 150px);
        border-radius: 10px;
        box-shadow: 1px 2px 1px #eee;
        transition: top .2s ease;

    }
</style>
