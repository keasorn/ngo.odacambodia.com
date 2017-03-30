@extends("ngo.layout.with_view")


@section("content")
    <form method="POST" action="" target="main" name="myform">
        {!! csrf_field() !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table border="1" cellpadding="2" style="border-collapse: collapse" width="100%" id="table3"
               bordercolor="#FFFFFF" height="408">
            <tr>
                <td class="fontNormal" valign="middle" height="13" align="right" bgcolor="#D5E0FF" width="9%">
                    &nbsp;</td>
                <td class="fontNormal" valign="middle" height="13" align="left" colspan="2" bgcolor="#D5E0FF">
                    &nbsp;</td>
            </tr>
            <tr>
                <td class="fontNormal" valign="middle" height="13" align="right" bgcolor="#D5E0FF" width="9%">
                    &nbsp;</td>
                <td class="fontNormal" valign="middle" height="13" align="left" colspan="2" bgcolor="#D5E0FF">
                    &nbsp;</td>
            </tr>
            <tr>
                <td class="fontNormal" valign="middle" height="13" align="right" bgcolor="#D5E0FF" width="9%">
                    <font color="#000080"><b>Year:</b></font></td>
                <td class="fontNormal" valign="middle" height="13" align="left" colspan="2">
                    <select size="1" name="cmbYear" id="cmbYear" class="fontNormal">


                        <option value="2013">2013</option>
                        <option value="2014" selected>2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                    </select></td>
            </tr>
            <tr>
                <td class="fontNormal" valign="top" height="13" align="right" bgcolor="#D5E0FF" width="9%">
                    <font color="#000080"><b>NGO:</b></font></td>
                <td class="fontNormal" valign="middle" height="13" align="left" colspan="2">
                    <select size="15" name="cmbNGO[]" id="cmbNGO" class="fontNormal" multiple>
                        <option value="">All NGOs</option>
                        <option value="0">All Foreign NGOs</option>
                        <option value="00">All Cambodian NGOs</option>
                        <option value="000">Association</option>
                         @foreach($RIDlist as $row)
                                        <option value="{{$row->RID}}"
                                                title="{{$row->Org_Name_E}}">{{$row->Acronym}}</option>
										@endforeach 
                    </select></td>
            </tr>
            <tr>
                <td class="fontNormal" height="26" align="right" nowrap bgcolor="#D5E0FF" width="9%">

                    <font color="#000080"><b>Project <br>
                            Status:</b></font></td>
                <td class="fontNormal" height="26" align="left" nowrap colspan="2">

                    <select size="1" name="cmbstatus" class="fontNormal">
                        <option selected value="0">All</option>
                        <option value="1">On-going</option>
                        <option value="2">Completed</option>
                        <option value="3">Suspended</option>
                        <option value="4">Pipeline</option>
                        <option value="5">(Not Reported)</option>

                    </select></td>
            </tr>
            <tr>
                <td class="fontNormal" height="52" align="right" nowrap bgcolor="#D5E0FF" width="9%" rowspan="2"
                    valign="top">

                    <font color="#000080"><b>Date <br>
                            Q.
                            Completed:</b></font></td>
                <td class="fontNormal" height="26" align="right" nowrap width="4%">

                    From:
                </td>
                <td class="fontNormal" height="26" nowrap width="83%"> 
                 <div id="FromDate"
                 class="input-group date my-datepicker"
                 data-date-format="dd-mm-yyyy">
                <input name="txtFromDate"
                       id="txtFromDate" 
                       readonly="" class="fontNormal cursorHand text-left"  size="10"
                       style="text-align: center" type="text" alt="" width="16"  height="15" border="0"  value="{{$fromDate}}"><span class="input-group-addon"
                                                                    style="padding: 0px !important;">
                                                            <img src="/images/Calendar_scheduleHS.png" align="absbottom"
                                                                 style="    height: 88%;"> </span>
            </div>
                </td>
            </tr>
            <tr>
                <td class="fontNormal" height="26" align="right" nowrap width="4%">

                    To:
                </td>
                <td class="fontNormal" height="26" nowrap width="83%"><div id="ToDate"
                 class="input-group date my-datepicker"
                 data-date-format="dd-mm-yyyy">
                <input name="txtToDate"
                       id="txtToDate" 
                       readonly="" class="fontNormal cursorHand text-left"  size="10"
                       style="text-align: center" type="text"  value="{{$toDate}}" alt="" width="16" height="15" border="0" ><span class="input-group-addon"
                                                                    style="padding: 0px !important;">
                                                            <img src="/images/Calendar_scheduleHS.png" align="absbottom"
                                                                 style="    height: 88%;"> </span>
            </div>                </td>
            </tr>
            <tr>
                <td class="fontNormal" height="61" align="center" nowrap colspan="3" bgcolor="#D5E0FF" valign="middle">

                    &nbsp;
                    <button type="button" onclick="myform_submit();" class="fontNormal" style="width:90px; height:24px">
                        <img border="0" src="/images/Preview.gif" width="15" height="15" align="absmiddle"> Preview
                    </button>
                    <button type="button" onclick="
		parent.close()
		" class="fontNormal" style="width:90px; height:24px">
                        <img border="0" src="/images/close_small.JPG" width="16" height="14" align="absmiddle"> Close
                    </button>
                </td>
            </tr>
        </table>
    </form>

    <script type="text/javascript">

        function myform_submit() {

            var rptName
            var year = ById("cmbYear").value

            switch (year) {
                case "2013":
                    rptName = "/ngo/report/summary/summary_disbursement_listing_by_ngo_2015";
                    break;
                case "2014":
                    rptName = "/ngo/report/summary/summary_disbursement_listing_by_ngo_2015";
                    break;
                case "2015":
                    rptName = "/ngo/report/summary/summary_disbursement_listing_by_ngo_2015";
                    break;

                case "2016":
                    rptName = "/ngo/report/summary/summary_disbursement_listing_by_ngo_2015";
                    break;
                case "2017":
                    rptName = "/ngo/report/summary/summary_disbursement_listing_by_ngo_2015";
                    break;
                default:
                    alert("Report of " + year + " is under construction!")
                    return
                    break;

            }

            parent.main.location = rptName;
            myform.action = rptName;
            myform.submit()


        }
        
            $(function () {
                $('#FromDate').datepicker({
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
            $('#ToDate').datepicker({
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
        function body_onLoad() {
            ById("cmbNGO").selectedIndex = 0
            myform_submit()
        }
    </script>
@endsection