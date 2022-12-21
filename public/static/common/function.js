class Utils
{
    static callback(callback= () =>{}){
        callback()
    }

}

/**
 * 通知
 * @param message
 * @param type
 * @param title
 * @param time
 */
function notice(message, type, title, time) {
    let html = `
        <div class="toast-container position-fixed top-0 end-0 p-3" id="message-box">
    <div id="liveToast" class="toast bg-${type} text-light" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">${title}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">${message}</div>
    </div>
</div>
    `;
    document.querySelector('body').insertAdjacentHTML('beforeend', html)
    const toastLiveExample = document.getElementById('liveToast')
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
    setTimeout(() => {
        toast.hide()
        document.querySelector('#message-box').remove()
    }, time)
}

const NOTICE = {
    success: (message = 'success', title = '提示', time = 1200) => notice(message, 'success', title, time),
    error: (message = 'error', title = '提示', time = 2000) => notice(message, 'danger', title, time),
    confirm: ({message = "确认删除吗？",confirms=()=>{},cancel=() => {}}) => {
        let html = `
            <div class="modal fade" tabindex="-1" id="myModal">
               <div class="modal-dialog modal-fullscreen-sm-down">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">提示</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>${message}</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary" onclick="Utils.callback(${confirms})">确定</button>
                  </div>
                </div>
              </div>
            </div>
        `;
        document.querySelector('body').insertAdjacentHTML('beforeend', html)
        const myModal = new bootstrap.Modal('#myModal', {
            keyboard: false
        })
        myModal.show()
        return myModal;
    }
}

function jump(url = '/', time = 1500) {
    if(time<=0){
        window.location.href = url;
    } else {
        setTimeout(() => {
            window.location.href = url;
        }, time)
    }

}


