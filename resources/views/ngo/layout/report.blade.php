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
            <td class="fontBig" colspan="2">&nbsp;            </td>
        </tr>
        <tr>
            <td class="fontBig" width="614" height="18">
            <td class="fontNormal" width="136" valign="middle" align="right" height="18">
                <a href="#none" onclick="javascrip:window.print()">
                    <img src="/images/print.gif" border="0" align="absbottom">
                    Print </a>
                <img src="/images/close.jpg" border="0" align="absbottom"><a href="#none"
                                                                             onclick="javascrip:window.close()">
                    Close
                </a></td>
        </tr>


        <tr>
            <td colspan="2" height="100">
            @yield('content')
            </td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td class="fontNormal" align="right">
                <a href="#none" onclick="javascrip:window.print()">
                    <img src="/images/print.gif" width="18" border="0" align="absmiddle" height="18">
                    Print </a>
                <img src="/images/close.jpg" width="18" border="0" height="18"><a href="#none"
                                                                                  onclick="javascrip:window.close()">
                    Close
                </a></td>
        </tr>
        </tbody>
    </table>
    <p><br>
        &nbsp;</p></div>
</body>
</html>














