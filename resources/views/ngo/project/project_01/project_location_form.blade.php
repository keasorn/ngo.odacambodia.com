<?php
use App\Models\ngo\ProvinceModel;
use App\Http\Controllers\MyUtility;
$provinceData = ProvinceModel::select("ProvinceId", "Province")->orderBy("Province")->get();

if (count($project) > 0) {
    $projectLocation = DB::table("v_ngo_sub_project_of_projectlocation")->where("PRN", $project->PRN);
    $projectLocation = $projectLocation->paginate(5);
} else {
    $projectLocation = null;
}

$trNumLocat = 0;
?>

<table border="0" width="650" cellpadding="2" style="border-collapse: collapse">
    <tr>
        <td align="center">
            &nbsp;</td>
    </tr>
    <tr>
        <td align="center">

            @if(count($project)>0)
                {!!MyUtility::ajaxPaging($projectLocation , "projectLocation")!!}
            @endif</td>
    </tr>
    <tr>
        <td>

            <table id="tbl_ngo_project_locations" style="border-collapse: collapse" width="100%" cellspacing="1"
                   bordercolor="#C0C0C0" border="1">
                <tbody>
                <tr>

                    <td width="2%" height="18" nowrap="" bgcolor="#ECE9D8" align="center">
                        <input id="chkDeleteAll" name="chkDeleteAll" onclick="checkAllProvince(this)"
                               style="font-weight: 700"
                               type="checkbox"><b> </b>
                    </td>

                    <td width="2%" height="18" nowrap="" bgcolor="#ECE9D8" align="center">
                        <b>
                            No</b></td>
                    <td height="18" nowrap="" bgcolor="#ECE9D8" align="center">
                        <b>
                            <font color="#000080">
                                <a href="#none"
                                   onclick="Ajax_SubTableSort('projectlocation.asp', 'spanProjectLocation', '[Province].Province', 'tbl_ngo_project_locations', '')">
                                    <font color="#000000">Province</font></a></font> </b></td>
                    <td height="18" nowrap="" bgcolor="#ECE9D8" align="center">
                        <b>
                            <font color="#000080">
                                <a href="#none"
                                   onclick="Ajax_SubTableSort('projectlocation.asp', 'spanProjectLocation', '[District].District', 'tbl_ngo_project_locations', '')">
                                    <font color="#000000">District</font></a></font> </b></td>
                    <td height="18" nowrap="" bgcolor="#ECE9D8" align="center">
                        <b>
                            <font color="#000080">
                                <a href="#none"
                                   onclick="Ajax_SubTableSort('projectlocation.asp', 'spanProjectLocation', '[Commune].Commune', 'tbl_ngo_project_locations', '')">
                                    <font color="#000000">Commune</font></a></font> </b></td>
                    <td height="18" nowrap="" bgcolor="#ECE9D8" align="center">
                        <b>
                            <font color="#000080">
                                <a href="#none"
                                   onclick="Ajax_SubTableSort('projectlocation.asp', 'spanProjectLocation', '[Village].Village', 'tbl_ngo_project_locations', '')">
                                    <font color="#000000">Village</font></a></font> </b></td>

                    <td width="61" height="18" nowrap="" bgcolor="#ECE9D8" align="center">
                        &nbsp;</td>

                </tr>

                @if(count($projectLocation)>0)

                    <?php
                    $pageSize = $projectLocation->perPage();
                    $currentPage = $projectLocation->currentPage();
                    $trNumLocat = 0;
                    $trNo = $currentPage * ($pageSize) - $pageSize;
                    ?>
                    @foreach($projectLocation as $project)

                        <tr id="tbl_ngo_project_locationsRow{{++$trNumLocat}}" class="fontNormal" bgcolor="#FFFFFF">


                            <td valign="top" nowrap="" align="center"><input
                                        id="chktbl_ngo_project_locations{{$trNumLocat}}"
                                        name="chktbl_ngo_project_locations[]"
                                        value="{{$project->ProjectLocationId}}" type="checkbox"
                                        onclick="checkDel(this);setChecked(this,{{$trNumLocat}})">
                            </td>

                            <td valign="middle" nowrap="" align="center">{{++$trNo}}.</td>
                            <td id="ProvinceName{{$trNumLocat}}" style="padding-left: 3px" valign="middle"
                                align="left">  {{$project->Province}}
                            </td>
                            <td style="padding-right: 10px; padding-left:3px" id="DistrictName{{$trNumLocat}}"
                                valign="middle"
                                align="left">{{$project->District}}
                            </td>
                            <td id="CommuneName{{$trNumLocat}}" style="padding-left: 3px" valign="middle"
                                align="left">{{$project->Commune}}
                            </td>
                            <td id="VillageName{{$trNumLocat}}" style="padding-left: 3px" valign="middle"
                                align="left">{{$project->Village}}
                            </td>
                            <td class="TableDataE" id="ProjectLocationCmd2" width="61" valign="top"
                                nowrap=""
                                align="center">
                                &nbsp;<a href="#none" id="2"
                                         onclick="editProjectLocation({{$project->ProjectLocationId}},{{$trNumLocat}})"><img
                                            src="/images/file-edit.png"
                                            title="Edit Record" width="16"
                                            height="16" border="0"
                                            align="absmiddle"></a>
                                <a href="#none"
                                   onclick="
                                           deleteProjectLocation({{$project->ProjectLocationId}},{{$trNumLocat}})">
                                    <img src="/images/delete.png" title="Delete Record" width="16"
                                         height="16"
                                         border="0" align="middle"></a>&nbsp; </td>
                        </tr>
                    @endforeach
                @endif


                @if (count($project) > 0)

                    <tr>
                        <td colspan="2" style="padding-left: 1px; padding-right: 1px" valign="middle" nowrap=""
                            bgcolor="#ECE9D8" align="center">
                            <b>
                                <a href="#none" name="DeleteAlltbl_ngo_project_locations"
                                   id="DeleteAlltbl_ngo_project_locations"
                                   onclick="deleteProjectChecked()">
                                    Delete All</a></b></td>
                        <td valign="middle" bgcolor="#ECE9D8" align="center">
                            <select size="1" onchange="QueryDistrict(this.value)" name="cmbProvinceLocation"
                                    id="cmbProvinceLocation" class="fontNormal" style="width: 98%">
                                @foreach($provinceData as $province)
                                    <option value="{{$province->ProvinceId}}">
                                        {{$province->Province}}</option>
                                @endforeach

                            </select></td>
                        <td valign="middle" bgcolor="#ECE9D8" align="center">
				<span id="spanDistrictLocation">


<select class="fontNormal" id="cmbDistrictLocation" name="cmbDistrictLocation" size="1" style="width: 98%">
    <option value="9090"> -</option>
    <option value="9191">All</option>
</select>


				</span>
                        </td>
                        <td valign="middle" bgcolor="#ECE9D8" align="center">
					<span id="spanCommuneLocation">


<select class="fontNormal" id="cmbCommuneLocation" name="cmbCommuneLocation" size="1" style="width: 98%">
    <option value="909090"> -</option>
    <option value="919191">All</option>


</select>


				</span>
                        </td>
                        <td valign="middle" bgcolor="#ECE9D8" align="center">
				<span id="spanVillageLocation">


<select class="fontNormal" id="cmbVillageLocation" name="cmbVillageLocation" size="1" style="width: 98%">
    <option value="90909090"> -</option>
    <option value="91919191">All</option>


</select>


				</span>
                        </td>
                        <td width="61" valign="middle" nowrap="" bgcolor="#ECE9D8" align="center">
                            <a href="#none" id="bntAddtbl_ngo_project_locations" name="bntAddtbl_ngo_project_locations"
                               class="fontNormal" title="Add"
                               onclick="addProjectLocation(this.title)">
                                <img src="/images/add.png"
                                     id="imgAddtbl_ngo_project_locations"
                                     width="16" height="16"
                                     border="0"></a>&nbsp;&nbsp;<a
                                    href="#none" id="bntCanceltbl_ngo_project_locations"
                                    name="bntCanceltbl_ngo_project_locations"
                                    title="Cancel" class="fontNormal" onclick="cancelProjectLocation()">
                                <img src="/images/reload.png"
                                     title="Cancel" width="16"
                                     height="16"
                                     border="0"></a>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>

        </td>
    </tr>
</table>
<input id="hiddenProjectLocationId" name="hiddenProjectLocationId" type="hidden">
<input id="oldHiddenProjectLocationId" name="oldHiddenProjectLocationId" type="hidden">
<input id="trNumLocat" name="trNumLocat" type="hidden" value="{{$trNumLocat}}">

<script type="text/javascript">

    //delete checked project function
    function deleteProjectChecked() {
        var check = getvalueCheckGroup("chktbl_ngo_project_locations");
        var PRN = $("#PRN").val();
        var RID = $("#RID").val();
        var data = "?projectId=" + check;
        data += "&PRN=" + PRN;

        var answer = confirm("Are you sore to delete?");
        if (answer) {
            Ajax_UpdatePanel("/ngo/project/project_01/project_location/delete_checked_project_location", data, "project_location_form", true);
        } else {
            return;
        }
    }

    //end delete checked project function

    //set backgrount color on row has checked function
    function setChecked(chk, tr_no) {
        if (chk.checked) {
            byId("tbl_ngo_project_locationsRow" + tr_no).style.backgroundColor = "red";
        } else {
            byId("tbl_ngo_project_locationsRow" + tr_no).style.backgroundColor = "white";
        }
    }

    //end set backgrount color on row has checked function

    //checked all to delete function
    function checkAllProvince(ch) {
        var t = ch.checked
        var trNum=ById("trNumLocat").value;
        for (var i = 1; i <= trNum; i++) {
            byId("chktbl_ngo_project_locations" + i).checked = t;
            if (t) {
                byId("tbl_ngo_project_locationsRow" + i).style.backgroundColor = "red";
            } else {
                byId("tbl_ngo_project_locationsRow" + i).style.backgroundColor = "white";
            }
        }
    }
    //end checked all to delete function

    //set check all checkbox funtion
    function checkDel() {
        var trNum=ById("trNumLocat").value;
        var allCh = getvalueCheckGroup('chktbl_ngo_project_locations').length;
        if (allCh ==trNum) {
            byId("chkDeleteAll").checked = true;
        } else {
            byId("chkDeleteAll").checked = false;
        }
    }

    //end set check all checkbox funtion

    //delete project location
    function deleteProjectLocation(key, id) {

        byId("tbl_ngo_project_locationsRow" + id).style.backgroundColor = "red";
        var PRN = $("#PRN").val();
        var RID = $("#RID").val();
        var data = "?projectId=" + key;
        data += "&PRN=" + PRN;
        data += "&RID=" + RID;
        var answer = confirm("Are you sore to delete?");
        if (answer) {
            Ajax_UpdatePanel("/ngo/project/project_01/project_location/delete_project_location", data, "project_location_form", true);

        } else {
            ClearSelectionRow('tbl_ngo_project_locations')
            return;
        }
    }


    function addProjectLocation(title) {
        var PRN = $("#PRN").val();
        var RID = $("#RID").val();
        var canUpdate=true;
        var oldVillageID = ById('oldHiddenProjectLocationId').value;
        var cmbProvinceLocation = $("#cmbProvinceLocation").val();
        var cmbDistrictLocation = $("#cmbDistrictLocation").val();
        var cmbCommuneLocation = $("#cmbCommuneLocation").val();
        var cmbVillageLocation = $("#cmbVillageLocation").val();
        var projectLocationId = $("#hiddenProjectLocationId").val();

        var data = "?cmbProvinceLocation=" + cmbProvinceLocation;
        data += "&cmbDistrictLocation=" + cmbDistrictLocation;
        data += "&cmbCommuneLocation=" + cmbCommuneLocation;
        data += "&cmbVillageLocation=" + cmbVillageLocation;
        data += "&RID=" + RID;
        data += "&PRN=" + PRN;
        data += "&projectLocationId=" + projectLocationId;
        if ((oldVillageID != cmbVillageLocation) && (cmbVillageLocation!="91919191")) {
            isSubSectorExist = Ajax_getResult("/ngo/project/project_01/project_location/exist", data) == "true";

            if (isSubSectorExist) {
                byId('cmbVillageLocation').title = 'Selected village already exist';
                $('#cmbVillageLocation').tooltip('show')
                return;

            } else {
                // update
                canUpdate = true;
            }
        }

        if ((checkFillProjectLocation()) && (canUpdate)) {
            if (title == "Add") {
                Ajax_UpdatePanel("/ngo/project/project_01/project_location/insert_project_location", data, "project_location_form", true);
            } else {
                Ajax_UpdatePanel("/ngo/project/project_01/project_location/update_project_location", data, "project_location_form", true);
            }
        }
    }


    function cancelProjectLocation() {
        try {

            byid('cmbProvinceLocation').value="";
            byid('cmbDistrictLocation').value="";
            byid('cmbCommuneLocation').value="";
            byid('cmbVillageLocation').value="";
            ClearSelectionRow('tbl_ngo_project_locations')

            ById('bntAddtbl_ngo_project_locations').title = 'Add';
            ById('imgAddtbl_ngo_project_locations').src = '/images/Add.png';

            ById('hiddenProjectLocationId').value = key
            ById('oldHiddenProjectLocationId').value = byid('cmbVillageLocation').value;
        }
        catch (e) {
            alert(e.message)
        }
    }

    //edit project location function
    function editProjectLocation(key, id) {
        try {
            var province = ($('#ProvinceName' + id).text()).trim();
            var district = ($('#DistrictName' + id).text()).trim();
            var commune = ($('#CommuneName' + id).text()).trim();
            var village = ($('#VillageName' + id).text()).trim();

            selectListItemByText('cmbProvinceLocation', province)
            $("#cmbProvinceLocation").change();

            selectListItemByText('cmbDistrictLocation', district)
            $("#cmbDistrictLocation").change();
            selectListItemByText('cmbCommuneLocation', commune)

            $("#cmbCommuneLocation").change();

            selectListItemByText('cmbVillageLocation', village)

            ClearSelectionRow('tbl_ngo_project_locations')
            editRow('tbl_ngo_project_locationsRow' + id)

            ById('bntAddtbl_ngo_project_locations').title = 'Update';
            ById('imgAddtbl_ngo_project_locations').src = '/images/save-alt.png';

            ById('hiddenProjectLocationId').value = key
            ById('oldHiddenProjectLocationId').value = byid('cmbVillageLocation').value;
        }
        catch (e) {
            alert(e.message)
        }
    }

    function checkFillProjectLocation() {


        var PRN = $("#PRN").val();
        var RID = $("#RID").val();
        var cmbProvinceLocation = $("#cmbProvinceLocation").val();
        var cmbDistrictLocation = $("#cmbDistrictLocation").val();
        var cmbCommuneLocation = $("#cmbCommuneLocation").val();
        var cmbVillageLocation = $("#cmbVillageLocation").val();
        var projectLocationId = $("#hiddenProjectLocationId").val();

        if (cmbProvinceLocation == '90') {
            byId('cmbProvinceLocation').title = 'Please select province';
            $('#cmbProvinceLocation').tooltip('show')
            $('#cmbProvinceLocation').focus()
            return false;
        }

        if (cmbDistrictLocation == '9090') {

            byId('cmbDistrictLocation').title = 'Please select district';
            $('#cmbDistrictLocation').tooltip('show')
            $('#cmbDistrictLocation').focus()
            return false;
        }

        if (cmbCommuneLocation == '909090') {
            byId('cmbCommuneLocation').title = 'Please select commune';
            $('#cmbCommuneLocation').tooltip('show')
            $('#cmbCommuneLocation').focus()
            return false;
        }

        if (cmbVillageLocation == '90909090') {
            byId('cmbVillageLocation').title = 'Please select village';
            $('#cmbVillageLocation').tooltip('show')
            $('#cmbVillageLocation').focus()
            return false;
        }
        return true;
    }

    function QueryDistrict(provinceId) {
        var data = '?provinceId=' + provinceId;
        Ajax_UpdatePanelAsync("/project_location/get_district", data, "spanDistrictLocation", true);
    }
    function QueryCommune(districtId) {
        var data = '?districtId=' + districtId;
        Ajax_UpdatePanelAsync("/ngo/project/project_01/project_location/get_commune", data, "spanCommuneLocation", true);
    }
    function QueryVillage(communeId) {

        var data = '?communeId=' + communeId;
        Ajax_UpdatePanelAsync("/ngo/project/project_01/project_location/get_village", data, "spanVillageLocation", true);

    }


    function projectLocation(page) {
//
        var data = '?PRN=' + $("#PRN").val();
        data += '&page=' + page;
        Ajax_UpdatePanel("/ngo/project/project_01/project_location/listing", data, "project_location_form", true);

    }

    // end paginate on project location form
</script>

<p>&nbsp;</p>
<p>&nbsp;</p>