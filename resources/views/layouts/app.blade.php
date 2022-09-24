<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico">
    <title>勞動部15-29歲青年勞工就業狀況調查問卷表</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css?v=20210901">
    <link rel="stylesheet" href="css/style.css">
    <style>
      .footer-btn{
        margin-top: 0.5rem
      }
    </style>
</head>
@yield('content')
<script>
    $(function(){
      {!! Session::has('msg') ? 'alert("'.Session::get("msg").'")'  : '' !!}
      $('#go-back').on('click', function () {
        var currentPage = parseInt($('#current').text());
        var backPage = backPage = 'page' + (currentPage - 1); 
        location.href = location.protocol + "//" + location.host + '/' + backPage
      })

      // 強制跳出數字鍵盤
      $('input[type=tel], input[type=number]').attr("inputmode","numeric");

      // 手機板需focus invalid選項
      var invalidFlag = false;
      $('input, select').on('invalid', function(event){
        if (!invalidFlag) {
          event.target.scrollIntoView()
          invalidFlag = true
        }
      })
      setInterval(() => {
        if (invalidFlag) {
          invalidFlag = false
        }
      }, 1000);

      $('#save').on('click', function () {
        $('#form').append("<input type='hidden' name='save-return' value='return'>")
        $('button[type=submit]').click(); 
      })
    })
  </script>
</html>
