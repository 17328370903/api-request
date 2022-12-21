<!doctype html>
<html lang="zh_cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/css/common.css">
    <script src="/static/bootstrap/js/popper.min.js"></script>
    <script src="/static/bootstrap/js/bootstrap.min.js"></script>
{{--    <script src="/static/bootstrap/js/bootstrap.bundle.js"></script>--}}
    <script src="/static/common/function.js"></script>
    <script src="/static/common/axios.min.js"></script>
    <script src="/static/common/request.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.10/dist/vue.js"></script>
    <title>@yield('title')</title>
</head>
<body>
@yield('content')
</body>
</html>
@yield('script')
