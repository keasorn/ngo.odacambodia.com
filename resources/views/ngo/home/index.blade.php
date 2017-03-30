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
<form name="myform" id="myform" method="post" action="/">
    
    <table width="100%">
		<tr>
			<td><table border="0" width="100%" id="table3" style="border-collapse: collapse">
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
						</table></td>
		</tr>
	</table>
    
    <table  width="100%">
		<tr>
			<td>
    <hr noshade color="" style="color:#00800;border: solid 1px;">
    		</td>
		</tr>
		<tr>
			<td height="65">
			
			<div align="center">
							<table border="0" width="750" id="table1" cellpadding="2" style="border-collapse: collapse">
								<tr>
									<td valign="top" rowspan="2" width="264"  style="padding:5px">
									<img src="/images/ngo_logo.jpg" width="262" height="293"  style="border: solid 1px black;"></td>
									<td valign="top" align="center" width="210">
									<font color="#0066FF">To update disbursement data on NGO's 
									Programs/Projects, please log in with valid 
									User Name and Password<br></font>&nbsp;<table border="1" width="100%" id="table4" cellspacing="0" cellpadding="0" style="border-collapse: collapse" bordercolor="#0066FF">
										<tr>
											<td>
											<table border="0" width="100%" cellpadding="2" style="border-collapse: collapse" id="table5">
												<tr>
													<td nowrap background="images/bg02.jpg" class="fontnormal" align="center">
													<font color="#FFFFFF"><b>Log In</b></font></td>
												</tr>
												<tr>
													<td nowrap bgcolor="#DDEAFB">
													<table border="0" width="100%" class="fontnormal" cellpadding="2"
                                                   style="border-collapse: collapse" id="table6">
														<tr>
															<td align="right" nowrap>
															<b>
															<font color="#0066FF">User name:</font></b></td>
															<td align="left">
															<input type="text" name="uid" id="uid" size="20"
                                                               class="fontNormal"></td>
														</tr>
														<tr>
															<td align="right">
															<b>
															<font color="#0066FF">Password:</font></b></td>
															<td align="left">
															<input type="password" name="pwd" id="pwd" size="20"
                                                               class="fontNormal"></td>
														</tr>
														<tr>
															<td align="right">&nbsp;</td>
															<td align="left">
															<input type="submit" value="Log In"
                                                                            name="bntSubmit3"
                                                                            style="border:1px solid #000080; padding:1px; width:60px; height:18"
                                                                            class="fontNormal">
															<input type="submit" value="Cancel" name="bntSubmit4"
                                                               style="border:1px solid #000080; padding:1px; width:60px; height:18"
                                                               class="fontNormal"></td>
														</tr>
													</table></td>
												</tr>
											</table></td>
										</tr>
									</table>
									<font color="#FF0000" style="color:red !important">
									<b>{{$error}}</b></font> </td>
									<td valign="top" rowspan="2" width="264" style="padding:5px">
									<img src="/images/cambodia_map.jpg" width="262" height="293" style="border: solid 1px black;"></td>
								</tr>
								<tr>
									<td valign="bottom" align="center" width="210">Looking for data on NGO's disbursement to 
									Cambodia, please click 	
									<a href="/ngo/visitor" name="bntSubmit" style="border:1px solid #C0C0C0; width:60px; height:18; color:#0000FF; font-weight:bold; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px; background-color:#FFFFFF" class="fontNormal">Visitor</a>
									<br><a href="test.odacambodia.com">cdc.khmer.biz</a></td>
								</tr>
								<tr>
									<td valign="top" width="264">&nbsp;
									</td>
									<td valign="bottom" align="center" width="210">&nbsp;
									
									</td>
									<td valign="top" width="264">&nbsp;
									</td>
								</tr>
								<tr>
									<td valign="top" colspan="3" class="fontnormal">
									<p align="justify">This Database is 
									maintained on behalf of the Royal Government 
									of Cambodia by the Cambodian Rehabilitation 
									and Development Board (CRDB) of the Council 
									for the Development of Cambodia (CDC). The 
									Royal Government is grateful to all NGO 
									partners for supporting this Database and 
									contributing to more effective aid 
									management by providing timely and 
									comprehensive information.</p>
									<p align="center">For further information or 
									assistance, please visit
									<a href="http://www.cdc-crdb.gov.kh/database">www.cdc-crdb.gov.kh/database</a> or contact<br>
									<a href="mailto:cdc-cmb@camnet.com.kh">cdc-cmb@camnet.com.kh</a><br>&nbsp;</td>
								</tr>
							</table>
						</div>
    		</td>
		</tr>
	</table>
    {!! csrf_field() !!}
    <input type="hidden" name="_token" value="{{csrf_token()}}" hidden/>
</form>
</body>
</html>