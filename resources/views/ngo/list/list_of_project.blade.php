@extends('ngo.layout.with_menu')
<?php
use App\Models\ngo\CoreDetailModel;
use App\Http\Controllers\MyUtility;
$list_core = CoreDetailModel::select("RID", "Acronym")->orderBy("Acronym")->get();
$topMenuId="listOfProject";
?>
@section('content')
    <form action="/list/list_of_project" id="myForm" name="myForm" method="post">
        <td style="border-top-style: none; border-top-width: medium" height="20">
            <div align="center">
               
<p> </p>
<table style="border-collapse: collapse" id="table2" width="99%" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                        <td style="padding:4px; " width="64%" nowrap="" align="center">
                            <fieldset style="
    margin: 0px !important;
    padding: 0px !important; width:841px; height:57px">
                                <legend align="center"><b>Project Status</b>
                                </legend>
                                <table id="table3" width="100%" cellpadding="2" border="0">
                                    <tbody>
                                    <tr>
                                        <td align="left">
                                            &nbsp;</td>
                                        <td align="left">
                                            <input name="chStatus" id="chkStatusAll" value="ON"
                                                   onclick="status_all(this)" type="checkbox" checked><label
                                                    for="chkStatusAll">&nbsp; All</label>
                                        </td>
                                        <td align="left">
                                            <input name="chStatus[]" id="chkStatusOnging" value="1"
                                                   onclick="ProjectStatusChanged()" type="checkbox" checked><label
                                                    for="chkStatusOnging">&nbsp; Onging</label></td>
                                        <td bgcolor="#FF6600" align="left" style="margin:4px;">
                                            &nbsp;
                                            <input name="chStatus[]" id="chkStatusCompleted" value="2"

                                                   onclick="ProjectStatusChanged()" type="checkbox" checked><label
                                                    for="chkStatusCompleted">&nbsp; Completed</label></td>
                                                                                      <td>&nbsp;</td>
                                        <td bgcolor="#FFFF99" align="left">
                                            &nbsp;
                                            <input name="chStatus[]" id="chkStatusSuspended" value="3"

                                                   onclick="ProjectStatusChanged()" type="checkbox" checked><label
                                                    for="chkStatusSuspended">&nbsp; Suspended</label>
                                        </td>                                        <td>&nbsp;</td>
                                        <td bgcolor="#99FF99" align="left">
                                            &nbsp;
                                            <input name="chStatus[]" id="chkStatusPipeline" value="4"
                                                   onclick="ProjectStatusChanged()" type="checkbox" checked><label
                                                    for="chkStatusPipeline">&nbsp; Pipeline</label>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td bgcolor="#CC99FF" align="left">
                                            &nbsp;
                                            <input name="chStatus[]" id="chkStatusNotReported" value="5"
                                                   onclick="ProjectStatusChanged()" type="checkbox" checked><label
                                                    for="chkStatusNotReported">&nbsp; (Not 
											Reported)</label>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                        </td>
                        <td style="padding-left: 0; padding-right: 0; padding-top: 0; padding-bottom: -1px; border-right-style:none; border-right-width:medium"
                            width="17%" nowrap="" align="left">
                            &nbsp;
                            <button type="button" name="bntSearch" onclick="QuickJump()">
                                <img src="/images/search_16.png" width="16" border="0" align="absmiddle" height="16">
                                Search
                            </button>
                        </td>
                        <td style="border-style:none; border-width:medium; padding-left: 0; padding-right: 0; padding-top: 0; padding-bottom: -1px"
                            width="25%" nowrap="" align="right">Quick Jump:

                            <select style="visibility:visible;" id="cmbAcronymTop" name="cmbAcronymTop"
                                    class="fontNormal"
                                    size="1" onchange="QuickJump()">
                                <option value="0" style="color:#0000FF;">ALL NGOs</option>


                                @foreach($list_core as $core)
                                    <option value="{{$core->RID}}">{{$core->Acronym}}</option>
                                @endforeach
                            </select></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 0; padding-right: 0; padding-top: 0; padding-bottom: -1px" colspan="3">
								<span id="spanListOfProject">



<table id="table2" style="border-collapse: collapse" width="100%" cellpadding="2" border="0">
    <tbody>
    <br>
    <tr>
        <td style="text-align: center">
            <img src="/images/loading.gif" alt="" height="50px" id="pro_loading" style="display:none"></td>
    </tr>
    <tr>
        <td id="list_ngo_project" style="text-align: center">
            @include('ngo.list.list_form_project')

        </td>
    </tr>

    </tbody>
</table>



<br>

<div style="position: absolute; display: none; width: 100px; height: 67px; z-index: 1; left: 514px; top: 182px"
     id="layer_editProjectStatus">
    <table id="table5" style="border-collapse: collapse" width="200" cellspacing="3" cellpadding="3"
           bordercolor="#FF0066" border="2" bgcolor="#FFFFB7">
        <tbody>
        <tr>
            <td>
                <table id="table6" style="border-collapse: collapse" width="200" cellpadding="2" border="0">
                    <tbody>
                    <tr>
                        <td style="border-right-style: none; border-right-width: medium" nowrap="" align="left">
                            <input id="rdOngingStatus" name="rdEditProjectStatus" value="1"
                                   onclick="selectNewStatusId(this.value)" type="radio"><label for="rdOngingStatus"
                                                                                               checked>On-going</label>

                        </td>
                        <td style="border-style: none; border-width: medium" align="center">
                            <b><a href="#none" onclick="

				UpdateProjectStatus();
				ById('layer_editProjectStatus').style.display = 'none'
			">Update</a></b></td>
                    </tr>
                    <tr>
                        <td nowrap="" align="left">
                            <input id="rdCompletedStatus" name="rdEditProjectStatus" value="2"
                                   onclick="selectNewStatusId(this.value)" type="radio"><label for="rdCompletedStatus">Completed</label>

                        </td>
                        <td style="border-top-style: none; border-top-width: medium" align="center">
                            <b><a href="#none" onclick="
				var doc = document
				doc.getElementById('layer_editProjectStatus').style.display = 'none'
			">Cancel</a></b></td>
                    </tr>
                    <tr>
                        <td nowrap="" align="left">
                            <input id="rdSuspendedStatus" name="rdEditProjectStatus" value="3"
                                   onclick="selectNewStatusId(this.value)" type="radio"><label for="rdSuspendedStatus">Suspended</label>

                        </td>
                        <td style="border-top-style: none; border-top-width: medium" align="center">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td nowrap="" align="left">
                            <input id="rdPipelineStatus" name="rdEditProjectStatus" value="4"
                                   onclick="selectNewStatusId(this.value)" type="radio"><label for="rdPipelineStatus">Pipeline</label>

                        </td>
                        <td style="border-top-style: none; border-top-width: medium" align="center">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td nowrap="" align="left">
                            <input id="rdNotReportedStatus" name="rdEditProjectStatus" value="5"
                                   onclick="selectNewStatusId(this.value)" type="radio"><label
                                    for="rdNotReportedStatus">(Not Reported)</label>

                        </td>
                        <td style="border-top-style: none; border-top-width: medium" align="center">
                            &nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</span>
                        </td>
                    </tr>

                    </tbody>
                </table>


            </div>
        </td>
    </form>
    <script type="text/javascript">

        function init() {
            $("#cmbAcronymTop").val({{$RID}});
            $("#cmbAcronymTop").change();

        }
        init();
        function status_all(ch) {

            var t = ch.checked
            byId("chkStatusSuspended").checked = t;
            byId("chkStatusPipeline").checked = t;
            byId("chkStatusNotReported").checked = t;
            byId("chkStatusCompleted").checked = t;
            byId("chkStatusOnging").checked = t;

        }
        function QuickJump() {
            byId("pro_loading").style.display = "inline";
            var data = '?RID=' + $("#cmbAcronymTop").val();
            data += "&status=" + getvalueCheckGroup('chStatus');
            Ajax_UpdatePanel('/ajax/list_of_project',data,'list_ngo_project',true)

            byId("pro_loading").style.display = "none";
        }
        function ProjectStatusChanged() {
            var allCh = getvalueCheckGroup('chStatus').length;
            if (allCh == 5) {
                byId("chkStatusAll").checked = true;
            } else {
                byId("chkStatusAll").checked = false;
            }
        }

    </script>


@endsection