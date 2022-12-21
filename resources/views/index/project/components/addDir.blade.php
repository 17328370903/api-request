<div class="modal fade" id="addDirModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">添加目录</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="addDir">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">目录名称</label>
                        <input type="text" class="form-control" name="name" v-model="dirFormData.name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">关 闭</button>
                <button type="button" class="btn btn-primary" @click="saveDir()">保 存</button>
            </div>
        </div>
    </div>
</div>


