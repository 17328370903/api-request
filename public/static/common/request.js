const instance = axios.create({
    headers: {},
    timeout: 1200,
    baseURL: 'http://mm.cc'
})

instance.interceptors.response.use(response => {
    const code = parseInt(response.data.code) || 500;
    switch (code) {
        case 200:
            return response.data.data;
        case 400:
            NOTICE.error(response.data.msg)
            throw new Error(response.data)
        case 401:
            break;
        case 403:
            NOTICE.error('沒有訪問權限')
            throw new Error('沒有訪問權限');
        default:
            NOTICE.error('系统错误')
            throw new Error(response.data)
    }

}, error => {
    NOTICE.error('网络错误')
    throw new Error('网络错误');
})

const post = ({url, headers = {}, data = {}}) => {
    return instance.request({
        method: "post",
        url,
        headers,
        data
    })
}
const get = ({url, headers = {}, data = {}}) => {
    return instance.request({
        method: "get",
        url,
        headers,
        params: data
    })
}

