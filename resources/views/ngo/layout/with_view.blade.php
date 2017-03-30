<!DOCTYPE html>
<?php
use App\Http\Controllers\Bootstrap\Bootstrap;
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>CRDB/CDC ODA Disbursement Database Website (NGO)</title>

    <?php echo (new Bootstrap())->inludeCSS() ?>
    <?php echo (new Bootstrap())->inludeJS() ?>
    <meta name="_token" content="{!! csrf_token() !!}"/>

</head>


<body style="width: 90% !important;">

@yield('content')

<script type="text/javascript">

</script>

</body>
</html>