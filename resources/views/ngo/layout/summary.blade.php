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

<body>

<div align="center">
    <table id="table1" style="border-collapse: collapse" width="99%" cellpadding="0" border="0">
        <tbody>


        <tr>
            <td>
                @yield('content')
            </td>
        </tr>

        </tbody>
    </table>
    <p><br>
        &nbsp;</p></div>
</body>
</html>













