<?php


use App\Models\ngo\NgoProjectThematicMakerModel;



$thematicMarker = NgoProjectThematicMakerModel::where('PRN', "=", $PRN)->get();

?>





<table border="0" width="600" cellpadding="2">

	<tr>

		<td style="padding-left: 2px; padding-right: 2px; padding-top: 4px; padding-bottom: 4px">

			<table border="1" style="border-collapse: collapse; width: 600px;" id="table20"

				   class="table-responsive" width="592" cellpadding="2" bordercolor="#C0C0C0"

				   cellspacing="0">

				<tbody>

				<tr>

					<td width="27" bgcolor="#ECE9D8" align="center" style="padding: 4px"><b>No</b></td>

					<td width="420" bgcolor="#ECE9D8" style="padding: 4px"><b>Thematic Marker</b></td>

					<td align="center" bgcolor="#ECE9D8" width="24" style="padding: 4px"><b>NO</b></td>

					<td align="center" bgcolor="#ECE9D8" width="42" style="padding: 4px"><b>Minor</b></td>

					<td align="center" bgcolor="#ECE9D8" width="57" style="padding: 4px"><b>Moderate</b></td>

					<td align="center" bgcolor="#ECE9D8" width="57" style="padding: 4px"><b>Very Significant</b></td>

				</tr>

				<tr>

					<td valign="top" width="27" nowrap="" align="center" style="padding: 4px">1.</td>

					<td valign="top" width="420" nowrap="" style="padding: 4px">Builds or strengthens Government capacity/systems</td>

					<td valign="top" align="center" width="24" style="padding: 4px">

						<input type="radio" value="0" name="rdBuildCapacity" id="thematicMarker10_0" checked></td>

					<td valign="top" align="center" width="42" style="padding: 4px">

						<input type="radio" value="1" name="rdBuildCapacity" id="thematicMarker10_1"></td>

					<td valign="top" align="center" width="56" style="padding: 4px">

						<input type="radio" value="2" name="rdBuildCapacity" id="thematicMarker10_2"></td>

					<td valign="top" align="center" width="57" style="padding: 4px">

						<input type="radio" value="3" name="rdBuildCapacity" id="thematicMarker10_3"></td>

				</tr>

				<tr>

					<td valign="top" width="27" nowrap="" bgcolor="#E3EBFD" align="center" style="padding: 4px">2.</td>

					<td valign="top" width="420" nowrap="" bgcolor="#E3EBFD" style="padding: 4px">Supports Public Financial Management reform implementations</td>

					<td valign="top" align="center" width="24" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="0" name="rdFinancial" id="thematicMarker14_0" checked></td>

					<td valign="top" align="center" width="42" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="1" name="rdFinancial" id="thematicMarker14_1"></td>

					<td valign="top" align="center" width="56" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="2" name="rdFinancial" id="thematicMarker14_2"></td>

					<td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="3" name="rdFinancial" id="thematicMarker14_3"></td>

				</tr>

				<tr>

					<td valign="top" width="27" nowrap="" align="center" style="padding: 4px">3.</td>

					<td valign="top" width="420" nowrap="" style="padding: 4px">Supports Public Admin Reform implementation</td>

					<td valign="top" align="center" width="24" style="padding: 4px">

						<input type="radio" value="0" name="rdAdminReform" id="thematicMarker15_0" checked></td>

					<td valign="top" align="center" width="42" style="padding: 4px">

						<input type="radio" value="1" name="rdAdminReform" id="thematicMarker15_1"></td>

					<td valign="top" align="center" width="56" style="padding: 4px">

						<input type="radio" value="2" name="rdAdminReform" id="thematicMarker15_2"></td>

					<td valign="top" align="center" width="57" style="padding: 4px">

						<input type="radio" value="3" name="rdAdminReform" id="thematicMarker15_3"></td>

				</tr>

				<tr>

					<td valign="top" width="27" nowrap="" bgcolor="#E3EBFD" align="center" style="padding: 4px">4.</td>

					<td valign="top" width="420" nowrap="" bgcolor="#E3EBFD" style="padding: 4px">Support Decentralization Reform implementation</td>

					<td valign="top" align="center" width="24" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="0" name="rdDecentralize" id="thematicMarker16_0" checked></td>

					<td valign="top" align="center" width="42" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="1" name="rdDecentralize" id="thematicMarker16_1"></td>

					<td valign="top" align="center" width="56" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="2" name="rdDecentralize" id="thematicMarker16_2"></td>

					<td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="3" name="rdDecentralize" id="thematicMarker16_3"></td>

				</tr>

				<tr>

					<td valign="top" width="27" nowrap="" align="center" style="padding: 4px">5.</td>

					<td valign="top" width="420" nowrap="" style="padding: 4px">Support Legal &amp; Judicial Reform Implementation</td>

					<td valign="top" align="center" width="24" style="padding: 4px">

						<input type="radio" value="0" name="rdJudicial" id="thematicMarker17_0" checked></td>

					<td valign="top" align="center" width="42" style="padding: 4px">

						<input type="radio" value="1" name="rdJudicial" id="thematicMarker17_1"></td>

					<td valign="top" align="center" width="57" style="padding: 4px">

						<input type="radio" value="2" name="rdJudicial" id="thematicMarker17_2"></td>

					<td valign="top" align="center" width="57" style="padding: 4px">

						<input type="radio" value="3" name="rdJudicial" id="thematicMarker17_3"></td>

				</tr>

				<tr>

					<td valign="top" width="27" nowrap="" align="center" bgcolor="#E3EBFD" style="padding: 4px">6.</td>

					<td valign="top" width="420" nowrap="" bgcolor="#E3EBFD" style="padding: 4px">Gender equality and women's empowerment</td>

					<td valign="top" align="center" width="24" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="0" name="rdGender" id="thematicMarker5_0" checked></td>

					<td valign="top" align="center" width="42" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="1" name="rdGender" id="thematicMarker5_1"></td>

					<td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="2" name="rdGender" id="thematicMarker5_2"></td>

					<td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="3" name="rdGender" id="thematicMarker5_3"></td>

				</tr>

				<tr>

					<td valign="top" width="27" nowrap="" align="center" style="padding: 4px">7.</td>

					<td valign="top" width="420" nowrap="" style="padding: 4px">Environmental protection (other than climate change-related)</td>

					<td valign="top" align="center" width="24" style="padding: 4px">

						<input type="radio" value="0" name="rdEnvironment" id="thematicMarker9_0" checked></td>

					<td valign="top" align="center" width="42" style="padding: 4px">

						<input type="radio" value="1" name="rdEnvironment" id="thematicMarker9_1"></td>

					<td valign="top" align="center" width="57" style="padding: 4px">

						<input type="radio" value="2" name="rdEnvironment" id="thematicMarker9_2"></td>

					<td valign="top" align="center" width="57" style="padding: 4px">

						<input type="radio" value="3" name="rdEnvironment" id="thematicMarker9_3"></td>

				</tr>

				<tr>

					<td valign="top" width="27" nowrap="" bgcolor="#E3EBFD" align="center" style="padding: 4px">8.</td>

					<td valign="top" width="420" nowrap="" bgcolor="#E3EBFD" style="padding: 4px">Climate change</td>

					<td valign="top" align="center" bgcolor="#E3EBFD" width="24" style="padding: 4px">

						<input type="radio" value="0" name="rdClimate" id="thematicMarker8_0" checked></td>

					<td valign="top" align="center" bgcolor="#E3EBFD" width="42" style="padding: 4px">

						<input type="radio" value="1" name="rdClimate" id="thematicMarker8_1" ></td>

					<td valign="top" align="center" bgcolor="#E3EBFD" width="57" style="padding: 4px">

						<input type="radio" value="2" name="rdClimate" id="thematicMarker8_2" ></td>

					<td valign="top" align="center" bgcolor="#E3EBFD" width="57" style="padding: 4px">

						<input type="radio" value="3" name="rdClimate" id="thematicMarker8_3" ></td>

				</tr>

				<tr>

					<td valign="top" width="27" nowrap="" align="center" style="padding: 4px">9.</td>

					<td valign="top" width="420" nowrap="" style="padding: 4px">HIV/AIDS (awareness, prevention and treatment)</td>

					<td valign="top" align="center" width="24" style="padding: 4px">

						<input type="radio" value="0" name="rdHIV" id="thematicMarker6_0" checked></td>

					<td valign="top" align="center" width="42" style="padding: 4px">

						<input type="radio" value="1" name="rdHIV" id="thematicMarker6_1"></td>

					<td valign="top" align="center" width="57" style="padding: 4px">

						<input type="radio" value="2" name="rdHIV" id="thematicMarker6_2"></td>

					<td valign="top" align="center" width="57" style="padding: 4px">

						<input type="radio" value="3" name="rdHIV" id="thematicMarker6_3"></td>

				</tr>

				<tr>

					<td valign="top" width="27" nowrap="" align="center" bgcolor="#E3EBFD" style="padding: 4px">10.</td>

					<td valign="top" width="420" nowrap="" bgcolor="#E3EBFD" style="padding: 4px">Industrial Development Policy (non-sector support)</td>

					<td valign="top" align="center" width="24" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="0" name="rdIndustrialDev" id="thematicMarker18_0" checked></td>

					<td valign="top" align="center" width="42" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="1" name="rdIndustrialDev" id="thematicMarker18_1"></td>

					<td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="2" name="rdIndustrialDev" id="thematicMarker18_2"></td>

					<td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="3" name="rdIndustrialDev" id="thematicMarker18_3"></td>

				</tr>

				<tr>

					<td valign="top" width="27" nowrap="" align="center" style="padding: 4px">11.</td>

					<td valign="top" width="420" nowrap="" style="padding: 4px">Income and employment generation</td>

					<td valign="top" align="center" width="24" style="padding: 4px">

						<input type="radio" value="0" name="rdIncome" id="thematicMarker3_0" checked></td>

					<td valign="top" align="center" width="42" style="padding: 4px">

						<input type="radio" value="1" name="rdIncome" id="thematicMarker3_1"></td>

					<td valign="top" align="center" width="57" style="padding: 4px">

						<input type="radio" value="2" name="rdIncome" id="thematicMarker3_2"></td>

					<td valign="top" align="center" width="57" style="padding: 4px">

						<input type="radio" value="3" name="rdIncome" id="thematicMarker3_3"></td>

				<tr>

					<td valign="top" width="27" nowrap="" bgcolor="#E3EBFD" align="center" style="padding: 4px">12.</td>

					<td valign="top" width="420" nowrap="" bgcolor="#E3EBFD" style="padding: 4px">Private Sector Development</td>

					<td valign="top" align="center" width="24" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="0" name="rdPrivate" id="thematicMarker13_0" checked></td>

					<td valign="top" align="center" width="42" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="1" name="rdPrivate" id="thematicMarker13_1" ></td>

					<td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="2" name="rdPrivate" id="thematicMarker13_2" ></td>

					<td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="3" name="rdPrivate" id="thematicMarker13_3" ></td>

				</tr>

				<tr>

					<td valign="top" width="27" nowrap="" align="center" style="padding: 4px">13.</td>

					<td valign="top" width="420" nowrap="" style="padding: 4px">South-South and/or Triangular Cooperation</td>

					<td valign="top" align="center" width="24" style="padding: 4px">

						<input type="radio" value="0" name="rdSouthSouth" id="thematicMarker12_0" checked></td>

					<td valign="top" align="center" width="42" style="padding: 4px">

						<input type="radio" value="1" name="rdSouthSouth" id="thematicMarker12_1"></td>

					<td valign="top" align="center" width="57" style="padding: 4px">

						<input type="radio" value="2" name="rdSouthSouth" id="thematicMarker12_2"></td>

					<td valign="top" align="center" width="57" style="padding: 4px">

						<input type="radio" value="3" name="rdSouthSouth" id="thematicMarker12_3"></td>

				</tr>

				<tr>

					<td valign="top" width="27" nowrap="" align="center" bgcolor="#E3EBFD" style="padding: 4px">14.</td>

					<td valign="top" width="420" nowrap="" bgcolor="#E3EBFD" style="padding: 4px">Community-based project</td>

					<td valign="top" align="center" width="24" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="0" name="rdCommunity" id="thematicMarker7_0" checked></td>

					<td valign="top" align="center" width="42" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="1" name="rdCommunity" id="thematicMarker7_1"></td>

					<td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="2" name="rdCommunity" id="thematicMarker7_2"></td>

					<td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="3" name="rdCommunity" id="thematicMarker7_3"></td>

				</tr>

				<tr>

					<td valign="top" width="27" nowrap="" align="center" style="padding: 4px">15.</td>

					<td valign="top" width="420" nowrap="" style="padding: 4px">Engagement with civil society or non-state actors</td>

					<td valign="top" align="center" width="24" style="padding: 4px">

						<input type="radio" value="0" name="rdEngagement" id="thematicMarker11_0" checked></td>

					<td valign="top" align="center" width="42" style="padding: 4px">

						<input type="radio" value="1" name="rdEngagement" id="thematicMarker11_1"></td>

					<td valign="top" align="center" width="57" style="padding: 4px">

						<input type="radio" value="2" name="rdEngagement" id="thematicMarker11_2"></td>

					<td valign="top" align="center" width="57" style="padding: 4px">

						<input type="radio" value="3" name="rdEngagement" id="thematicMarker11_3"></td>

				</tr>

				<tr>

					<td valign="top" width="27" nowrap="" align="center" bgcolor="#E3EBFD" style="padding: 4px">16.</td>

					<td valign="top" width="420" nowrap="" bgcolor="#E3EBFD" style="padding: 4px">Food security</td>

					<td valign="top" align="center" width="24" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="0" id="thematicMarker1_0" name="rdFoodSecurity" checked></td>

					<td valign="top" align="center" width="42" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="1" id="thematicMarker1_1" name="rdFoodSecurity"></td>

					<td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="2" id="thematicMarker1_2" name="rdFoodSecurity"></td>

					<td valign="top" align="center" width="57" bgcolor="#E3EBFD" style="padding: 4px">

						<input type="radio" value="3" id="thematicMarker1_3" name="rdFoodSecurity"></td>

				</tr>

				<tr>

					<td valign="top" width="27" nowrap="" bgcolor="#FFFFFF" align="center" style="padding: 4px">17.</td>

					<td valign="top" width="420" nowrap="" bgcolor="#FFFFFF" style="padding: 4px">Social protection</td>

					<td valign="top" align="center" bgcolor="#FFFFFF" width="24" style="padding: 4px">

						<input type="radio" value="0" name="rdSocialProtection" id="thematicMarker2_0" checked></td>

					<td valign="top" align="center" bgcolor="#FFFFFF" width="42" style="padding: 4px">

						<input type="radio" value="1" name="rdSocialProtection" id="thematicMarker2_1"></td>

					<td valign="top" align="center" bgcolor="#FFFFFF" width="57" style="padding: 4px">

						<input type="radio" value="2" name="rdSocialProtection" id="thematicMarker2_2"></td>

					<td valign="top" align="center" bgcolor="#FFFFFF" width="57" style="padding: 4px">

						<input type="radio" value="3" name="rdSocialProtection" id="thematicMarker2_3"></td>

				</tr>

				<tr>

					<td valign="top" width="27" nowrap="" bgcolor="#E3EBFD" align="center" style="padding: 4px">18.

					</td>

					<td valign="top" width="420" nowrap="" bgcolor="#E3EBFD" style="padding: 4px">Youth support and development</td>

					<td valign="top" align="center" bgcolor="#E3EBFD" width="24" style="padding: 4px">

						<input type="radio" value="0" name="rdYouth" id="thematicMarker4_0" checked></td>

					<td valign="top" align="center" bgcolor="#E3EBFD" width="42" style="padding: 4px">

						<input type="radio" value="1" name="rdYouth" id="thematicMarker4_1"></td>

					<td valign="top" align="center" bgcolor="#E3EBFD" width="57" style="padding: 4px">

						<input type="radio" value="2" name="rdYouth" id="thematicMarker4_2"></td>

					<td valign="top" align="center" bgcolor="#E3EBFD" width="57" style="padding: 4px">

						<input type="radio" value="3" name="rdYouth" id="thematicMarker4_3"></td>

				</tr>

				</tbody>

			</table></td>

	</tr>

	<tr>

		<td align="right">
			<font color="#FF0000">
			<label id="saved"></label></font>
			<input type="button" class="fontNormal" value="Save"  onclick="insertThematicMarker()">

		</td>

	</tr>

</table>




<script type="text/javascript">


	function insertThematicMarker() {

		var thematicMarker18 = $('input[name="rdIndustrialDev"]:checked').val();

		var thematicMarker17 = $('input[name="rdJudicial"]:checked').val();

		var thematicMarker16 = $('input[name="rdDecentralize"]:checked').val();

		var thematicMarker15 = $('input[name="rdAdminReform"]:checked').val();

		var thematicMarker14 = $('input[name="rdFinancial"]:checked').val();

		var thematicMarker13 = $('input[name="rdPrivate"]:checked').val();

		var thematicMarker12 = $('input[name="rdSouthSouth"]:checked').val();

		var thematicMarker11 = $('input[name="rdEngagement"]:checked').val();

		var thematicMarker10 = $('input[name="rdBuildCapacity"]:checked').val();

		var thematicMarker9 = $('input[name="rdEnvironment"]:checked').val();

		var thematicMarker8 = $('input[name="rdClimate"]:checked').val();

		var thematicMarker7 = $('input[name="rdCommunity"]:checked').val();

		var thematicMarker6 = $('input[name="rdHIV"]:checked').val();

		var thematicMarker5 = $('input[name="rdGender"]:checked').val();

		var thematicMarker4 = $('input[name="rdYouth"]:checked').val();

		var thematicMarker3 = $('input[name="rdIncome"]:checked').val();

		var thematicMarker2 = $('input[name="rdSocialProtection"]:checked').val();

		var thematicMarker1 = $('input[name="rdFoodSecurity"]:checked').val();
		var data = 'PRN=' + "{{$PRN}}";
		@for ($i = 1; $i <= 18; $i++)
            data += '&thematicMarker{{$i}}=' + thematicMarker{{$i}};
		@endfor

        $.ajax({
			url: '/dp/data_entry/project_03//thematic_marker/insert',
			type: 'post',
			data: data,
			async: false,
			success: function (response, status) {
				//$('#thematicMaker').html(response);
				$("#saved").text("Already saved!")
			},
			error: function (xhr, status, error) {
				alert('insert to project thematic_marker false')
			}

		});

	}
	function initThematicMarker() {

		$("input[type=radio]").change(function () {

			$("#saved").text("YOU MUST SAVE THEMATIC MARKER DATA HERE !")

		})

		@foreach($thematicMarker as $tm)

            ById("thematicMarker{{$tm->thematicMarker}}_{{$tm->thematicLevel}}").checked = true;

		@endforeach



    }

	initThematicMarker()

</script>