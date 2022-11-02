@php header('Access-Control-Allow-Origin: *'); @endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<input type="text" oninput="citySearch($(this).val())">
<div id="msg"></div>
<script>
    function citySearch(query){
        $.ajax({
            type:'POST',
            url:'http://geodb-free-service.wirefreethought.com/v1/geo/cities?limit=5&offset=0&namePrefix='+query+'&languageCode=ru',
            data:'_token = <?php echo csrf_token() ?>',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data) {
                $("#msg").html(data.msg);
            }
        });
    }
    //
</script>
</body>
</html>
