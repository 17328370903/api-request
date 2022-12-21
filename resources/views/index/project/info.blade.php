@extends('index.layouts.userLoginBase')
@section('title','项目详情')

@section('main')
    <div style="width:100%;" id="app">
        <div class="aside">
            <div class="option d-flex justify-content-end p-1">
                <img src="/static/icons/plus.svg" width="20" height="20" @click="add(0)"/>
                <img src="/static/icons/folder-plus.svg" width="20" height="20" @click="addDir(0)"/>
            </div>
            <div class="interface">
                <x-api-tree :menu="$menu" tag="0"/>
            </div>
        </div>
        <div class="components">
            @include("index.project.components.addDir")
            @include("index.project.components.addApi")
        </div>
    </div>
@endsection
@section('script')
    <script>
        new Vue({
            el: "#app",
            data() {
                return {
                    method:"add",
                    activeTab:"params",
                    dirFormData: {
                        p_id: 0,
                        project_id: "{{$project->id}}",
                        name: "",
                    },
                    apiFormData:{
                        id:0,
                        p_id:0,
                        project_id: "{{$project->id}}",
                        name:"",
                        params:[],
                        body:[],
                        header:[],
                        method:0,
                        url:"",
                    },
                    result:""
                }
            },
            methods: {
                addDir(p_id = 0) {
                    event.preventDefault()
                    event.stopPropagation();
                    this.dirFormData.p_id = p_id;
                    const myModalAlternative = new bootstrap.Modal('#addDirModal', {})
                    myModalAlternative.show()
                },
                saveDir() {
                    post({url: "/api/addDir", data: this.dirFormData}).then(res => {
                        NOTICE.success('添加成功')
                        window.location.reload()
                    })
                },
                add(p_id = 0) {
                    event.preventDefault()
                    event.stopPropagation();
                    this.apiFormData.p_id = p_id;
                    const myModalAlternative = new bootstrap.Modal('#addApiModal', {})
                    this.reFormData()
                    myModalAlternative.show()
                    this.method = 'add'
                },
                saveApi() {
                    post({url: this.method === 'add'?"/api/addApi":'/api/update', data:this.apiFormData}).then(res => {
                        NOTICE.success('添加成功')
                        window.location.reload()
                    })
                },
                addData(field='params'){
                    this.apiFormData[field].push({
                        name:"",
                        value:"",
                        type:"string",
                        description:""
                    })
                },
                edit(id){
                    get({url:"/api/info",data:{id}}).then(res => {
                        this.apiFormData = res
                        const myModalAlternative = new bootstrap.Modal('#addApiModal', {})
                        myModalAlternative.show()
                        this.method = 'edit'
                    })
                },
                reFormData(){
                    this.apiFormData = {
                        id:0,
                        p_id:0,
                        project_id: "{{$project->id}}",
                        name:"",
                        params:[],
                        body:[],
                        header:[],
                        method:0,
                        url:"",
                    }
                },
                request(){
                    post({url:"/api/request",data:this.apiFormData}).then(res => {
                        this.result = res.result
                    })
                }
            },

        })

        function clickMenu(btn) {
            let btnStatus = btn.nextElementSibling.style.display;
            if (btnStatus === 'block') {
                btn.nextElementSibling.style.display = 'none'
                btn.children[0].children[0].setAttribute('src', '/static/icons/chevron-right.svg')
            } else {
                btn.nextElementSibling.style.display = 'block';
                btn.children[0].children[0].setAttribute('src', '/static/icons/chevron-down.svg')
            }
        }

    </script>

@endsection
<style>
    .aside {
        width: 200px;
        height: 100%;
        border: 1px solid #eee;
        border-top: none;
    }

    .interface {
        width: 100%;
        height: 100%;
    }

    .interface-item {
        width: 100%;
        cursor: pointer;
    }

    .parent-name {
        margin-left: 5px;
        font-size: 16px;
        white-space: nowrap;
    }

    .children {
        display: none;
        transition: all .2s;
    }

    .children div {
        font-size: 14px;
    }

    .children div:last-child {
        border: none;
    }

    .method {
        color: red;
        font-size: 10px;
    }
</style>


