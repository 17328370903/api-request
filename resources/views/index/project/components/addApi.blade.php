<div class="modal fade " id="addApiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">添加接口</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="addApi" enctype="multipart/form-data">
                    <div class="mb-3 input-group">
                        <label for="recipient-name" class="input-group-text">地址</label>
                        <input type="text" class="form-control" name="url" v-model="apiFormData.url">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" @click="request">发送</button>
                    </div>
                    <div class="mb-3 input-group">
                        <label for="recipient-name" class="input-group-text">接口名称</label>
                        <input type="text" class="form-control" name="name" v-model="apiFormData.name">
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">请求方式</label>
                        <select class="form-select" id="inputGroupSelect01" v-model="apiFormData.method">
                            <option selected value="0">GET</option>
                            <option value="1">POST</option>
                            <option value="2">PUT</option>
                            <option value="3">DELETE</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a style="cursor: pointer;" :class="'nav-link ' + (activeTab =='params' ? 'active'  :'')" @click="activeTab='params'">Params</a>
                            </li>
                            <li class="nav-item">
                                <a style="cursor: pointer;" :class="'nav-link ' + (activeTab =='body' ? 'active'  :'')" @click="activeTab='body'">Body</a>
                            </li>
                            <li class="nav-item">
                                <a style="cursor: pointer;" :class="'nav-link ' + (activeTab =='header' ? 'active'  :'')" @click="activeTab='header'">Header</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="card col-12">
                            <div class="card-body">
                                <table class="table table-sm table-bordered" v-if="activeTab === 'params'">
                                    <thead>
                                    <tr>
                                        <th>参数名</th>
                                        <th>值</th>
                                        <th>参数类型</th>
                                        <th>描述</th>
                                        <th align="center" class="d-flex justify-content-center align-items-center">
                                            <img src="/static/icons/plus.svg" alt="" width="20" height="20" @click="addData('params')">
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr v-for="(item,index) in apiFormData.params" :key="index">
                                        <td>
                                            <input type="text" class="form-control" v-model="item.name">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" v-model="item.value">
                                        </td>
                                        <td>
                                            <select class="form-select" v-model="item.type">
                                                <option selected value="int">int</option>
                                                <option value="string">string</option>
                                                <option value="file">file</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" v-model="item.description">
                                        </td>
                                        <td style="height: 47px;padding:0;" align="center" class="d-flex justify-content-center align-items-center">
                                            <img src="/static/icons/plus.svg" alt="" width="20" height="20" @click="addData('params')">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table table-sm table-bordered" v-else-if="activeTab === 'body'">
                                    <thead>
                                    <tr>
                                        <th>参数名</th>
                                        <th>值</th>
                                        <th>参数类型</th>
                                        <th>描述</th>
                                        <th align="center" class="d-flex justify-content-center align-items-center">
                                            <img src="/static/icons/plus.svg" alt="" width="20" height="20" @click="addData('body')">
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr v-for="(item,index) in apiFormData.body" :key="index">
                                        <td>
                                            <input type="text" class="form-control" v-model="item.name">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" v-model="item.value">
                                        </td>
                                        <td>
                                            <select class="form-select" v-model="item.type">
                                                <option selected value="int">int</option>
                                                <option value="string">string</option>
                                                <option value="file">file</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" v-model="item.description">
                                        </td>
                                        <td style="height: 47px;padding:0;" align="center" class="d-flex justify-content-center align-items-center">
                                            <img src="/static/icons/plus.svg" alt="" width="20" height="20" @click="addData('body')">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table table-sm table-bordered" v-else>
                                    <thead>
                                    <tr>
                                        <th>参数名</th>
                                        <th>值</th>
                                        <th>参数类型</th>
                                        <th>描述</th>
                                        <th align="center" class="d-flex justify-content-center align-items-center">
                                            <img src="/static/icons/plus.svg" alt="" width="20" height="20" @click="addData('header')">
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr v-for="(item,index) in apiFormData.header" :key="index">
                                        <td>
                                            <input type="text" class="form-control" v-model="item.name">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" v-model="item.value">
                                        </td>
                                        <td>
                                            <select class="form-select" v-model="item.type">
                                                <option selected value="int">int</option>
                                                <option value="string">string</option>
                                                <option value="file">file</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" v-model="item.description">
                                        </td>
                                        <td style="height: 47px;padding:0;" align="center" class="d-flex justify-content-center align-items-center">
                                            <img src="/static/icons/plus.svg" alt="" width="20" height="20" @click="addData('header')">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="card">
                            <div class="card-header">
                                结果
                            </div>
                            <div class="card-body" v-html="result">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">关 闭</button>
                <button type="button" class="btn btn-primary" @click="saveApi()">保 存</button>
            </div>
        </div>
    </div>
</div>


