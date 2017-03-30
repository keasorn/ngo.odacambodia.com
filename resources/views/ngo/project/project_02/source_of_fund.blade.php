@extends('ngo.layout.with_menu')
<?php
use App\Http\Controllers\MyUtility;
use App\Models\oda\odaadmin\MinistryModel;
$min_list = DB::table('tbl_ministry')->select("Min_ID", "Min_Name_E")->get();
$RID = "";
$Acronym = "";
$Org_Name_E = "";
$PRN = "<New PRN>";
$ProjectStatusName = "";
$PName_E = "";
$PName_K = "";
$ProjectAim = "";
$DateQCompleted = "";
$idpNumber = "";
$isFundProvider = "";
$StatusPdate = "";
$Remark = "";
$Dateline = "";
$AgencyE = "";
$AgencyK = "";
$PDateStart = "";
$PDateFinish = "";
$MinCode = "";
$MDateExpire = "";
$MDateStart = "";
$MinRef = "";
$isDocSigned = "";
$Docs = "";
$user = session('ngouser');
$RID = $user->RID;


if (count($project) > 0) {
    $RID = $project->RID;
    $Acronym = $project->Acronym;
    $Org_Name_E = $project->Org_Name_E;
    $PRN = $project->PRN;
    $ProjectStatusName = $project->ProjectStatusName;
    $PName_E = $project->PName_E;
    $PName_K = $project->PName_K;
    $ProjectAim = $project->ProjectAim;
    $DateQCompleted = $project->DateQCompleted;
    $idpNumber = $project->idpNumber;
    $isFundProvider = $project->isFundProvider;
    $StatusPdate = $project->StatusPdate;
    $Remark = $project->Remark;
    $Dateline = $project->Dateline;
    $AgencyE = $project->AgencyE;
    $AgencyK = $project->AgencyK;
    $PDateStart = $project->PDateStart;
    $PDateFinish = $project->PDateFinish;
    $MinCode = $project->MinCode;
    $MDateExpire = $project->MDateExpire;
    $MDateStart = $project->MDateStart;
    $MinRef = $project->MinRef;
    $Docs = $project->Docs;
    $isDocSigned = $project->isDocSigned;
}
?>
@section('content')
    <form method="POST" name="myform" id="myform" action="/ngo/project/project_02/source_of_fund">

        <input type="hidden" name="txtRID" id="txtRID" value="{{$RID}}">

        <div align="center">

        <table border="0" width="99%" cellpadding="2" style="border-collapse: collapse">
        <tr><td colspan="2" bgcolor="#CCCCFF"><b>
				<a href="/ngo/project/project_01/project_main?isNewProject=false&PRN={{$PRN}}">
				<font color="#333333">
                            Project Information</font></a> &gt;
                    <font color="#FF0066">
                        Source Of Funds </font>
                    <font color="#333333">
                        &gt;
                        <a href="/ngo/project/project_03/project_disbursement?PRN={{$PRN}}">
                            <font color="#333333">
                                Disbursements</font></a></font></b></td></tr>
        		</td>
			</tr>
			<tr>
				<td width="3%" height="27" align="left" style="padding:2px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium">&nbsp;</td>
				<td width="96%" height="27" style="padding:2px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium">
				<p align="right">
                    <a href="/ngo/report/individual_project_preview?PRN={{$PRN}}" target="_blank">
                        <img border="0" src="/images/Preview.gif" width="15" height="15" align="absmiddle"> Preview</a>	</td>
			</tr>	
			
<tr>
				<td width="3%" align="center" style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
				<b>(7).</b></td>
				<td width="96%" id="" style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:1px solid #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
				<b>If your
                                                    NGO provide fund to another NGOs to implement the
                                                    project?</b></td>
			</tr>
			<tr>
				<td width="3%" align="center" style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
				<td width="96%" id="" style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                                            <input type="radio" value="1" name="rdisFundProvider" id="isFundProvider"
                                                   onclick="
                                                           var submitValue = '?PRN={{$PRN}}'
                                                           var isFundProvider = (this.value)
                                                           submitValue += '&isFundProvider=' + isFundProvider
                                                           Ajax_getResult('/ngo/project/project_02/implementing_ngo_save_isFundProvider',submitValue)
                                                           Ajax_UpdatePanel('/ngo/project/project_02/listing_imp',submitValue,'spanImplementingNgo',true)
                                                           "><label for="isFundProvider">If
                                                YES</label>
                                            <input type="radio" name="rdisFundProvider" value="0" id="isNotFundProvider"
                                                   onclick="
                                                           var answer = confirm('Are you sure to select NO?\nIf so, the data of Receipient NGOs will be deleted and can not be undone.')
                                                           if (answer) {
                                                           var submitValue = '?PRN={{$PRN}}'
                                                           var isFundProvider = (this.value)
                                                           submitValue += '&isFundProvider=' + isFundProvider;
                                                           Ajax_getResult('/ngo/project/project_02/implementing_ngo_save_isFundProvider',submitValue)
                                                           ById('spanImplementingNgo').innerHTML = ''
                                                           } else {
                                                           ById('isFundProvider').checked = true;
                                                           }" checked><label for="isNotFundProvider">If NO</label></td>
			</tr>
			<tr>
				<td width="3%" align="center" style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">&nbsp;</td>
				<td width="96%" id="" style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; border-bottom:medium none #CCCCCC; padding:2px; ">
                                            &nbsp;If yes, please specify the name of 
											the NGO(s) with whom the fund was 
											provided:</td>
			</tr>
			<tr>
				<td width="3%" align="center" style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; padding:2px; border-bottom-color:#CCCCCC">&nbsp;</td>
				<td width="96%" id="spanImplementingNgo" style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; padding:2px; border-bottom-color:#CCCCCC">@include('/ngo/project/project_02/implementing_ngo') </td>
			</tr>
			<tr>
				<td width="3%" align="center" style="border-left:1px solid #CCCCCC; border-right:medium none #CCCCCC; border-top:medium none #CCCCCC; padding:2px; border-bottom-color:#CCCCCC">&nbsp;</td>
				<td width="96%"  style="border-left:medium none #CCCCCC; border-right:1px solid #CCCCCC; border-top:medium none #CCCCCC; padding:2px; border-bottom-color:#CCCCCC">&nbsp;</td>
			</tr>
			<tr>
				<td width="3%" align="left" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; padding: 2px; border-bottom-color:#CCCCCC">&nbsp;</td>
				<td width="96%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; padding: 2px; border-bottom-color:#CCCCCC">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="3%" align="left" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"><b>(8).</b></td>
				<td width="96%" id="" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
				<span style="color: rgb(0, 0, 0); font-family: Verdana, Tahoma; font-size: 11px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 700; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255)">
				List all the Technical Working Group that play some coordinating 
				function in the management of this project/program, or in which 
				this project/program otherwise participates or is represented.&nbsp;</span></td>
			</tr>
			<tr>
				<td width="3%" align="left" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
				<td width="96%" id="tdProjectTwg" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">@include('ngo.project.project_02.projecttwg')
                                        </td>
			</tr>
			<tr>
				<td width="3%" align="left" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; padding: 2px; border-bottom-color:#CCCCCC">&nbsp;</td>
				<td width="96%" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; padding: 2px; border-bottom-color:#CCCCCC">&nbsp;</td>
			</tr>
			<tr>
				<td width="3%" align="left" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; padding: 2px; border-bottom-color:#CCCCCC">&nbsp;</td>
				<td width="96%" style="border-left: medium none #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; padding: 2px; border-bottom-color:#CCCCCC">&nbsp;</td>
			</tr>
			<tr>
				<td width="3%" align="left" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px"><b>(9).</b></td>
				<td width="96%" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: 1px solid #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
				<span style="color: rgb(0, 0, 0); font-family: Verdana, Tahoma; font-size: 11px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 700; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255)">
				Planned budget allocation/expenditure for each year of the 
				Program/Project duration (based on Project Document)</span></td>
			</tr>
			<tr>
				<td width="3%" align="left" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
				<td width="96%" id="" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
			<b>(a). From Development Partner</b></td>
			</tr>
			<tr>
				<td width="3%" align="left" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
				<td width="96%" id="spanMultiBilateralCommitment" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">@include("/ngo/project/project_02/MultiBilateralCommitment")</td>
			</tr>
			<tr>
				<td width="3%" align="left" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
				<td width="96%" id="" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
			&nbsp;</td>
			</tr>
			<tr>
				<td width="3%" align="left" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
				<td width="96%" id="" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
			<b>(b). From NGO(s)/CSO</b></td>
			</tr>
			<tr>
				<td width="3%" align="left" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
				<td width="96%" id="spanNGOProvider" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">@include('ngo.project.project_02.ngo_source')</td>
			</tr>
			<tr>
				<td width="3%" align="left" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
				<td width="96%" id="" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="3%" align="left" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
				<td width="96%" id="" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
			</tr>
			<tr>
				<td width="3%" align="left" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">&nbsp;</td>
				<td width="96%" id="" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: medium none #CCCCCC; padding: 2px">
				<font color="#0066FF"><b>(C). Total Planned Budget
                                                    Allocation</b></font></td>
			</tr>
			<tr>
				<td width="3%" align="left" style="border-left: 1px solid #CCCCCC; border-right: medium none #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">&nbsp;</td>
				<td width="96%" id="spanActualCommitment" style="border-left: medium none #CCCCCC; border-right: 1px solid #CCCCCC; border-top: medium none #CCCCCC; border-bottom: 1px solid #CCCCCC; padding: 2px">@include('/ngo/project/project_02/ActualCommitment') </td>
			</tr>
			<tr>
				<td width="3%" align="left" style="padding: 2px">&nbsp;</td>
				<td width="96%" id="" style="padding: 2px">&nbsp;</td>
			</tr>
			<tr>
				<td width="99%" colspan="2" align="left" style="padding: 2px">
				<p align="center">
                                <button type="button" name="bntNext1" class="fontNormal"
                                        onClick="window.location='/ngo/project/project_01/project_main?PRN={{$PRN}}'">
                                    <img src="/images/back-alt.png" name="imgSaveAll" align="absmiddle" width="16"
                                         height="16"> Back
                                </button>
                                <button type="button" name="bntSave" class="fontNormal" disabled="disabled"><img
                                            src="/images/save_all.gif" name="imgSaveAll" align="absmiddle"> Save
                                </button>
                                <button type="button" name="bntCancel" class="fontNormal"
                                        onclick="window.document.location='/list/list_of_project'" id="bntCancel">
                                    <img src="/images/finish.png" name="imgSaveAll" align="absmiddle" width="16"
                                         height="16"> Finish
                                </button>
                                <button type="button" name="bntNext" class="fontNormal"
                                        onClick="window.location='/ngo/project/project_03/project_disbursement?PRN={{$PRN}}'">
                                    <img src="/images/forward-alt.png" name="imgSaveAll" align="absmiddle" width="16"
                                         height="16"> Next
                                </button>
                            </td>
			</tr>
		</table>


    	</div>


    </form>
    <div style="position: absolute;display:none; width: 100px; height: 100px; z-index: 1; left: 219px; top: 607px"
         id="LayerCounterName">
    </div>

    <div style="position: absolute;display:none; width: 100px; height: 100px; z-index: 1; left: 219px; top: 607px"
         id="LayerOdaProjectName">
    </div>
    <div style="position: absolute;display:none; width: 100px; height: 100px; z-index: 1; left: 219px; top: 607px"
         id="LayerNgoProjectName">
    </div>


    <div style="display:none; position: absolute; width: 570px; height: 89px; z-index: 1; left: 351px; top: 665px;margin-top:2px;"
         id="ngoSourceNameLayer">
        @include("ngo.project/project_02/ngoSourceName")
    </div>


    <div style="display:none; position: absolute; width: 243px; height: 65px; z-index: 1; left: 731px; top: 651px; "
         id="implementingNgoLayer">
        @include("ngo.project/project_02/implementingNgo")
    </div>


    <script type="text/javascript">
        function getFundProvider(id) {
            if (id == 1) {
                byId("isFundProvider").checked = true;
                //   $("#isFundProvider").click();
            } else {
                byId("isNotFundProvider").checked = true
                ById('spanImplementingNgo').innerHTML = ''
            }
        }

		function QueryOrg(value) {
			var SourceType = value
			var submitValue = '?SourceType=' + SourceType
			Ajax_UpdatePanelAsync('/ngo/project/project_02/query_sourceName', submitValue, 'tdSourceName', true  )
		}
        function sourceOfFundInit() {
            var isFundProvider = {{$isFundProvider}}
        getFundProvider(isFundProvider)
            //	alert(isFundProvider)
             QueryOrg(1); 
        }

        sourceOfFundInit()
    </script>
@endsection
