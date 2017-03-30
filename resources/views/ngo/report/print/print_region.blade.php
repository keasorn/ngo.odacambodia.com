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

</head>


<body onload="load_printRegion()" topmargin="1" leftmargin="1" rightmargin="1" bottommargin="1" marginwidth="1"
      marginheight="1">

<div align="center">
    <form id="printform" name="printform">
        <table border="0" width="750" id="table1" cellpadding="2" class="fontNormal">
            <tr>
                <td height="20">

                    <div align="center">
                        <table border="0" width="100%" id="table2" style="border-collapse: collapse">
                            <tr>
                                <td width="25%" rowspan="2" align="center">
                                    <img border="0" src="/images/logo1.jpg" width="96" height="113"></td>
                                <td rowspan="2" width="50%" align="center">
                                    <p align="center">
                                        <img border="0" src="/images/ngo_title.gif" width="533" height="100"></td>
                                <td valign="top" width="25%" align="center">
                                    <img border="0" src="/images/flag.gif" width="100" height="72"></td>
                            </tr>
                            <tr>
                                <td width="25%" align="center">
                                    <img border="0" src="/images/kingdom_cam.jpg" width="103" height="33"></td>
                            </tr>

                        </table>


                        <hr noshade color="#0000FF" size="1">


                    </div>
                </td>
            </tr>
            <tr>
                <td height="20" align="right">

                    <a href="#none" onclick="window.print()">
                        <img border="0" src="/images/print.gif" width="18" height="18" align="absbottom">
                        Print
                    </a>
                    <a href="#none" onclick="window.close()">
                        <img border="0" src="/images/close.jpg" width="18" height="18">
                        Close
                    </a>
                </td>
            </tr>
            <tr>
                <td height="20" id="printRegion">
                    @yield('content')
                </td>
            </tr>
            <tr>
                <td height="20" align="right">

                    <a href="#none" onclick="window.print()">
                        <img border="0" src="/images/print.gif" width="18" height="18" align="absbottom">
                        Print
                    </a>
                    <a href="#none" onclick="window.close()">
                        <img border="0" src="/images/close.jpg" width="18" height="18">
                        Close
                    </a>
                </td>
            </tr>
            <tr>
                <td height="20">
                    <p align="center"><font color="#0000ff" face="Tahoma">
                            Copyright �</font><font color="#0000ff" face="Tahoma"> CDC/CRDB ODA Disbursement Website
                            (NGO) 2007</font></td>
            </tr>
        </table>
    </form>
</div>

</body>
<script>
    function printFormInit() {
        $("#printform :input").attr("disabled", true);

    }
    printFormInit();
</script>
</html>