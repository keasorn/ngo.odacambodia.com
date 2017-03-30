<?php

use App\Models\oda\project\ProvinceModel;



$provoce = ProvinceModel::where("ProvinceID", "<>", 90)->get();

$tag = DB::table("v_ngo_sub_project_new_targetlocatoin")->where("PRN", $PRN)->get();

$tag_sum = DB::table("v_ngo_sub_project_new_targetlocatoin")->where("PRN", $PRN)->sum("Percent2016");

?>

<table border="0" width="400" cellpadding="2" style="border-collapse: collapse">

    <tr>

        <td colspan="2">

            <table id="tblTargetLocation" bordercolor="#C0C0C0" class="fontNormal" cellpadding="2"
                   style="border-collapse: collapse; " border="1" width="100%">


                <tr>

                    <td bgcolor="#ECE9D8" align="center" height="25"><b>No</b></td>

                    <td bgcolor="#ECE9D8" align="center" height="25"><b>Province</b></td>

                    <td class="text-center" bgcolor="#ECE9D8" align="center" height="25"><b>%</b></td>

                </tr>

                <?php

                $tar_num = 1;

                ?>

                @foreach($tag as $g)

                    <tr id="tar_tr{{++$tar_num}}">

                        <td align="center" class="fontNormal">

                            <input type="checkbox" name="Province"

                                   value="{{$g->ProjectProvinceId}}"

                                   id="tar_check{{$tar_num}}"

                                   onclick="selectRowtar(this,'{{$tar_num}}')"> {{$tar_num}}. 

                        </td>

                        <td align="left" id="percent{{$tar_num}}" class="fontNormal" style="width: 80%">

                            <a href="#NONE" id="pro_name{{$tar_num}}"

                               onclick="editTarget('{{$g->ProjectProvinceId}}','{{$tar_num}}')">{{$g->Province}}</a>

                        </td>

                        <td align="right" class="fontNormal text-center"

                            id="percent2016{{$tar_num}}">{{$g->Percent2016}}</td>

                    </tr>@endforeach

                @if(count($tag)>0)

                    <tr>

                        <td width="34" class="fontNormal" height="20" nowrap="" bgcolor="#ECE9D8" align="center">
                            &nbsp;</td>

                        <td width="317" class="fontNormal" height="20" nowrap="" bgcolor="#ECE9D8" align="center">

                            <font color="#000080"><b>TOTAL: </b></font></td>

                        <td class="fontNormal" height="20" bgcolor="#ECE9D8" align="center">

                            <b>{{$tag_sum}}</b></td>

                    </tr>@endif

                <tr>

                    <td></td>

                    <td width="100%">

                        <select name="Province" id="Province" class="fontNormal" >

                            <option value="0">- - - Select Province - - -</option>@foreach($provoce as $prov)

                                <option value="{{$prov->ProvinceID}}">{{$prov->Province}}

                                </option>@endforeach

                        </select></td>

                    <td>

                        <input name="ProvincePercent2016" type="text" id="ProvincePercent2016"

                               class="text-center fontNormal" maxlength="3"></td>

                </tr>


            </table>
        </td>

    </tr>

    <tr>

        <td>

            <input type="button" class="fontNormal" title="Delete" onclick="deleteTarget();" value="Delete">

            </a>&nbsp;</td>

        <td align="right">

            <input type="button" class="fontNormal" title="Add" value="Add" onclick="insertTarget(this.title);"

                   id="tarInsert">

            <input type="button" class="fontNormal" value="Update" style="display: none"

                   onclick="insertTarget(this.title);" id="tarUpdate" title="Update"></a>

            <input type="button" class="fontNormal" title="Cancel"

                   onclick="clearTar();" value="Cancel"></td>

    </tr>

</table>


<input type="hidden" id="ProjectProvinceId">

<input type="hidden" id="provinceId">
<input type="hidden" id="oldPercent">

<script type="text/javascript">
    function tooltipTar(v, oldPercent) {
        var lastTotal ={{$tag_sum}};
        var newPer = parseFloat($("#ProvincePercent2016").val());
        num = (lastTotal + newPer) - oldPercent;
        if (num > 100) {
            byId('ProvincePercent2016').title = 'Total Maximum 100%';
            $('#ProvincePercent2016').tooltip('show')
            $('#ProvincePercent2016').focus()
            return false
        } else {
            return true
        }
    }
    function checkFillTar() {
        if ($('#Province').val() == 0) {
            byId('Province').title = 'Province could not be blank';
            $('#Province').tooltip('show')
            $('#Province').focus()
            return false
        }
        if ($('#ProvincePercent2016').val() == "") {

            byId('ProvincePercent2016').title = 'Province Percent could not be blank';
            $('#ProvincePercent2016').tooltip('show')
            $('#ProvincePercent2016').focus()
            return false
        }
        return true

    }

    function editTarget(tar_id, i) {
        ClearSelectionRow("tblTargetLocation")

        byId("tarInsert").style.display = "none"

        byId("tarUpdate").style.display = ""

        editRow('tar_tr' + i);

        $("#ProjectProvinceId").val(tar_id);

        Province = ($("#pro_name" + i).text()).trim();

        Per2016 = ($("#percent2016" + i).text()).trim();

        selectListItemByText("Province", Province) 
       $("#ProvincePercent2016").val(Per2016);
        $("#oldPercent").val(Per2016);

        pro_id = $("#Province").val();
        $("#provinceId").val(pro_id);
        value = Per2016 ;

        $('#Province').tooltip('destroy');

        $('#ProvincePercent2016').tooltip('destroy');

    }


    function deleteTarget() {
        var act_ids = getCheckBoxValues("tar_check", {{$tar_num}})
        if (act_ids != "") {
            var answer = confirm("Are you sure to delete?")
            if (answer) {
                var data = '?PRN=' + "{{$PRN}}";
                data += "&act_ids=" + act_ids;
                Ajax_UpdatePanel("/dp/data_entry/project_03//target_location/delete", data, "target_location", true);

            } else {
                // do nothing
            }
        }
    }

    function clearTar() {
        ClearSelectionRow("tblTargetLocation")
        $("#Province").val("0")
        $("#ProvincePercent2016").val("")
        byId("tarInsert").style.display = ""
        byId("tarUpdate").style.display = "none"

    }

    function insertTarget(title) {
        value = 0;
        var oldProvinceId = $("#provinceId").val();
        var newProvinceId = $("#Province").val();
        var percent = $("#ProvincePercent2016").val()
        var oldPercent = $("#oldPercent").val()
        canUpdate = true;
        var data = '?PRN=' + "{{$PRN}}";
        data += "&Province=" + $("#Province").val();
        data += "&idPro=" + $("#provinceId").val();
        data += "&Percent2016=" + $("#ProvincePercent2016").val();
        data += "&target_id=" + $("#ProjectProvinceId").val();
        if (oldProvinceId != newProvinceId) {
            isProvince = Ajax_getResult("/ngo/project/project_03/target_location/province_exist", data) == "1";
            if (isProvince) {
                byId('Province').title = 'Province already exist!';
                $('#Province').tooltip('show')
                $('#Province').focus()
                canUpdate = false
            } else {
                canUpdate = true
            }
        }

        if (checkFillTar() && tooltipTar(percent, oldPercent) && canUpdate) {

            if (title == "Add") {
                Ajax_UpdatePanel("/ngo/project/project_03/target_location/insert", data, "target_location", true);

            } else {
                Ajax_UpdatePanel("/dp/data_entry/project_03//target_location/update", data, "target_location", true);
            }

        }
    }

    function selectRowtar(chk, tr_no) {

        if (chk.checked) {

            byId("tar_tr" + (tr_no - 1)).style.backgroundColor = "red";

        } else {

            byId("tar_tr" + (tr_no - 1)).style.backgroundColor = "white";

        }

    }

</script>