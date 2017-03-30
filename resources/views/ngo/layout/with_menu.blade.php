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
<body class="fontNormal" style="width: 100% !important;
    margin:auto; padding:auto">

    <table border="0" width="100%">
		<tr>
			<td>@include("ngo.layout.banner")</td>
		</tr>
		<tr>
			<td align="center">@include("ngo.layout.top_menu")</td>
		</tr>
	</table>
	<table border="0" width="100%" cellpadding="2" style="border-collapse: collapse">
	<tr>
		<td>@yield('content')</td>
	</tr>
	</table>
	<table>
		<tr>
			<td align="center">
			<p align="center"></td>
		</tr>
	</table>
    <table id="table4" style="border-collapse: collapse" width="100%" cellpadding="0" border="0">
        <tbody>
        <tr>
            <td height="20">
                <center class="fontNormal">
                    <hr size="1" noshade="noshade" color="#0066FF">
                    <font color="#0000FF" face="Tahoma">
                        © Copyright by CRDB/CDC</font><font face="Tahoma"><font color="#0000FF">
                            ODA Disbursement Website (NGO)
                            2011</font>
                    </font>
                </center>
            </td>
        </tr>
        </tbody>
    </table>

    {!! csrf_field() !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
<script type="text/javascript">
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });

</script>

</body>
</html>