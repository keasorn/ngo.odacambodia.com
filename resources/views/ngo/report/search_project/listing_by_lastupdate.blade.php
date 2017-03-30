@extends('ngo.layout.with_menu')
<?php
$topMenuId="report";
$leftMenuId="search_by_last_update";
?>
<?php
use App\Http\Controllers\MyUtility;
?>
@section('content')
    <div align="center">
    <table border="0" width="99%" id="table1" cellpadding="0" style="border-collapse: collapse">

        <tr>
            <td height="20" width="20%" valign="top">
                @include("ngo.layout.left_pane")
            </td>
            <td valign="top">
                <div align="center">

                    <table width="100%" border="0" cellspacing="2" cellpadding="0">
                                                          <tr>
                                                            <td width="23%">&nbsp;</td>
                                                            <td width="8%">&nbsp;</td>
                                                            <td width="67%" colspan="2">&nbsp;</td>
                                                          </tr>
                                                          <tr>
                                                            <td height="63" colspan="4"><img src="/images/listing_of_project_by_lastupdate.jpg" alt="" width="329" height="50" /></td>
                                                          </tr>
                                                          <tr>
                                                            <td class="BoldBlue" nowrap><img src="/images/arrow_red.gif" width="8" height="9">Last Updated</td>
                                                            <td align="right" nowrap>
															<b>
															<font color="#333333">
															NGO Type:</font></b></td>
                                                            <td colspan="2">
                                                            <select name="TypeCode" id="TypeCode" class="fontNormalBlue">
                                                            <option value="All">- - - ALL - - - </option>
                                                            <option value="1">Foreign NGOs</option>
                                                            <option value="2">Cambodian NGOs</option>
                                                            <option value="3">Association</option>
                                                            </select></td>
                                                          </tr>
                                                          <tr>
                                                            <td class="BoldBlue" nowrap><span class="style1"> (Date Questionnaire Completed)</span></td>
                                                            <td align="right" nowrap>
															<b>
															<font color="#333333">From:</font></b></td>
                                                            <td width="15%">
															<div id="StartDate"
                 class="input-group date my-datepicker"
                 data-date-format="dd-mm-yyyy">
                <input name="txtSatartDate"
                       id="txtStartDate"
                       value=""
                       readonly="" class="fontNormal cursorHand text-left"  size="15"
                       style="text-align: center" type="text" alt="" width="16" height="15" border="0" ><span class="input-group-addon"
                                                                    style="padding: 0px !important;">
                                                            <img src="/images/Calendar_scheduleHS.png" align="absbottom"
                                                                 style="    height: 88%;"> </span>
            </div>
															</td>
                                                          </tr>
                                                          <tr>
                                                            <td nowrap>&nbsp;</td>
                                                            <td align="right" nowrap>
															<b>
															<font color="#333333">
															To:</font></b></td>
                                                            <td width="15%"><div id="EndDate"
                 class="input-group date my-datepicker"
                 data-date-format="dd-mm-yyyy">
                <input name="txtEndDate"
                       id="txtEndDate"
                       value=""
                       readonly="" class="fontNormal cursorHand text-left"  size="15"
                       style="text-align: center" type="text" alt="" width="16" height="15" border="0" ><span class="input-group-addon"
                                                                    style="padding: 0px !important;">
                                                            <img src="/images/Calendar_scheduleHS.png" align="absbottom"
                                                                 style="    height: 88%;"> </span>
            </div>
															</td>
                                                            <td><button type="button" id="bntSearch" class="fontNormal cursorHand" onClick="bntGo_onClick()" style="width: 38; height: 27">
															GO</button></td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="4" height="21">&nbsp;</td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="4" id="tdListingByLastUpdate" align="center">
                                                            @include("ngo.report.search_project.listing_by_lastupdate_sub")
															</td>
                                                          </tr>
                                                          <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td colspan="2">&nbsp;</td>
                                                          </tr>
                                                        </table>														&nbsp;</div>
            </td>
        </tr>
    </table>
</div>
<script type="text/javascript">

function bntGo_onClick() {
	if (ById("StartDate").value == "") ById("txtStartDate").value = ""
	if (ById("EndDate").value == "") ById("txtEndDate").value = ""

	var submitValue = "?StartDate="+ ById("txtStartDate").value
	submitValue += "&EndDate="+ ById("txtEndDate").value
	submitValue += "&TypeCode="+ ById("TypeCode").value	
	Ajax_UpdatePanel("/ngo/report/listing_by_lastupdate_sub",submitValue,"tdListingByLastUpdate",true)
}

function body_onLoad()  {
	bntGo_onClick() 
}

function showListing(submitValue, id)
{
	var display = ById("tr"+ id).style.display 
	
	if (display == 'none') {
		var data = "?StartDate="+ ById("txtStartDate").value
		data += "&EndDate="+ ById("txtEndDate").value
		data += "&RID= " +submitValue
		display = ''
		ById("img"+ id).src = "/images/minus_sign.jpg" 
		Ajax_UpdatePanel('/ngo/report/listing_by_lastupdate_sub_listing',data,"div"+ id, true)

	}
	else {
		display = 'none'
		ById("img"+ id).src = "/images/plus_sign.jpg"
	}

	ById("tr"+ id).style.display = display
	
} 
            $(function () {
                $('#StartDate').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    clearBtn: true,
                    todayBtn: "linked",
                    format:"dd-M-yyyy",
                    beforeShowMonth: function (date) {
                        if (date.getMonth() == 8) {
                            return false;
                        }
                    },
                    beforeShowYear: function (date) {
                        if (date.getFullYear() == 2007) {
                            return false;
                        }
                    },
                    toggleActive: true
                });
            $('#EndDate').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    clearBtn: true,
                    todayBtn: "linked",
                    format:"dd-M-yyyy",
                    beforeShowMonth: function (date) {
                        if (date.getMonth() == 8) {
                            return false;
                        }
                    },
                    beforeShowYear: function (date) {
                        if (date.getFullYear() == 2007) {
                            return false;
                        }
                    },
                    toggleActive: true
                });
            });
        function init() {
            var StartDate = "{{$StartDate}}";
            var EndDate = "{{$EndDate}}";

            ById("txtStartDate").value = StartDate;
            ById("txtEndDate").value = EndDate;
        }
        init()
</script>
@endsection