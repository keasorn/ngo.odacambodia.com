<?php
use App\Models\ngo\PrimaryAidSectorModel;
use App\Http\Controllers\MyUtility;
$primaryAidSectorList = PrimaryAidSectorModel::select("SectorCode", "SectorName_E")->get();

if (count($project) > 0) {
    $PRN = $project->PRN;
    $project_sector = DB::table("v_ngo_sub_project_of_sector")->where("PRN", $PRN);
    $project_sector = $project_sector->paginate(5);
} else {
    $project_sector = null;
}
$trNumSector=0;
?>

<table border="0" width="90%" cellpadding="2" style="border-collapse: collapse">
    <tr>
        <td align="center">

            {!!MyUtility::ajaxPaging($project_sector, "pagingSector")!!}

        </td>
    </tr>
    <tr>
        <td>

            <table id="tblProjectSector"
                   style="border-collapse: collapse"
                   class="fontNormal" width="100%"
                   cellspacing="1"
                   bordercolor="#C0C0C0" border="1">
                <tbody>
                <tr>

                    <td class="fontNormal" width="2%" nowrap=""
                        bgcolor="#ECE9D8" align="center"
                        height="18" style="padding: 2px">
                        <font color="#000080">
                            <input id="chkSecDeleteAll"
                                   name="chkSecDeleteAll" onclick="checkSector(this)" style="font-weight: 700"
                                   type="checkbox"></font><b> </b>
                    </td>

                    <td class="fontNormal" width="2%" nowrap=""
                        bgcolor="#ECE9D8" align="center"
                        height="18" style="padding: 2px">
                        <b>No</b></td>
                    <td class="fontNormal" width="25%" nowrap=""
                        bgcolor="#ECE9D8" align="center" style="padding: 2px">
                        <b>
                            <font color="#000000">Sector</font>
                        </b></td>
                    <td class="fontNormal" width="20%" nowrap=""
                        bgcolor="#ECE9D8" align="center" style="padding: 2px">
                        <b>
                            <font color="#000000">Sub-Sector</font>
                        </b></td>

                    <td class="fontNormal" nowrap=""
                        bgcolor="#ECE9D8" align="center" style="padding: 2px">
                        <b>
                            <font color="#000000">2014</font>
                        </b></td>

                    <td class="fontNormal" nowrap=""
                        bgcolor="#ECE9D8" align="center" style="padding: 2px">
                        <b>
                            <font color="#000000">2015</font>
                        </b></td>

                    <td class="fontNormal" nowrap=""
                        bgcolor="#ECE9D8" align="center" style="padding: 2px">
                        <b>
                            <font color="#000000">2016</font>
                        </b></td>

                    <td class="fontNormal" nowrap=""
                        bgcolor="#ECE9D8" align="center" style="padding: 2px">
                        <b>
                            <font color="#000000">2017</font>
                        </b></td>

                    <td class="fontNormal" nowrap=""
                        bgcolor="#ECE9D8" align="center" style="padding: 2px">
                        <b>
                            <font color="#000000">2018</font>
                        </b></td>

                    <td class="fontNormal" nowrap=""
                        bgcolor="#ECE9D8" align="center" style="padding: 2px">
                        <b>
                            <font color="#000000">2019</font>
                        </b></td>

                    <td class="fontNormal" width="10%" nowrap=""
                        bgcolor="#ECE9D8" align="center" style="padding: 2px">
                    </td>

                </tr>

                @if(count($project_sector)>0)
                    <?php
                    $pageSize = $project_sector->perPage();
                    $currentPage = $project_sector->currentPage();
                    $trNumSector = 0;
                    $trSectorNo = $currentPage * ($pageSize) - $pageSize;
                    ?>
                    @foreach($project_sector as $pro_sector)

                        <tr id="tblProjectSectorRow{{++$trNumSector}}" class="fontNormal" bgcolor="#FFFFFF">


                            <td width="2%" valign="middle" nowrap="" align="center" style="padding: 2px">
                                <input id="chktblProjectSector{{$trNumSector}}"
                                       name="chktblProjectSector[]" value="{{$pro_sector->SubSectorCode}}"
                                       type="checkbox" onclick="chkSector(this,{{$trNumSector}})"></td>

                            <td width="2%" valign="middle" nowrap="" align="center" style="padding: 2px">{{++$trSectorNo }}.</td>
                            <td id="SectorName_E{{$trNumSector}}" style="padding:2px; " width="25%"
                                valign="middle"
                                align="left">{{$pro_sector->SectorName_E}}</td>
                            <td id="SubSectorName_E{{$trNumSector}}" width="20%" valign="middle" align="left" style="padding: 2px">
                                {{$pro_sector->SubSectorName_E}}
                            </td>

                            <td id="Amount2014{{$trNumSector}}" style="padding:2px; " width="9%"
                                align="right">
                                {{MyUtility::formatThousand($pro_sector->y2014)}}
                            </td>

                            <td id="Amount2015{{$trNumSector}}" style="padding:2px; " width="9%"
                                align="right">   {{MyUtility::formatThousand($pro_sector->y2015)}}
                            </td>

                            <td id="Amount2016{{$trNumSector}}" style="padding:2px; " width="9%"
                                align="right">   {{MyUtility::formatThousand($pro_sector->y2016)}}
                            </td>

                            <td id="Amount2017{{$trNumSector}}" style="padding:2px; " width="9%"
                                align="right"> {{MyUtility::formatThousand($pro_sector->y2017)}}
                            </td>

                            <td id="Amount2018{{$trNumSector}}" style="padding:2px; " width="9%"
                                align="right">
                                {{MyUtility::formatThousand($pro_sector->y2018)}}
                            </td>

                            <td id="Amount2019{{$trNumSector}}" style="padding:2px; " width="9%"
                                align="right">
                                {{MyUtility::formatThousand($pro_sector->y2019)}}
                            </td>

                            <td id="tblProjectSectorCmd{{$trNumSector}}" width="10%" valign="top" nowrap=""
                                align="center" style="padding: 2px">
                                <a href="#none" id="1" onclick="editProjectSector({{$trNumSector}})"><img
                                            src="/images/file-edit.png" title="Edit Record" width="16"
                                            height="16" border="0"
                                            align="absmiddle"></a>
                                <a href="#none" onclick="deleteProjectSector({{$trNumSector}})">
                                    <img src="/images/delete.png" title="Delete Record" width="16"
                                         height="16" border="0" align="middle"></a>&nbsp; </td>

                        </tr>

                    @endforeach
                @endif
                <tr class="fontNormal">

                    <td class="fontNormal" width="2%" nowrap=""
                        bgcolor="#ECE9D8" align="right" style="padding: 2px">
                        &nbsp;</td>

                    <td colspan="3" class="fontNormal" nowrap=""
                        bgcolor="#ECE9D8" align="right" style="padding: 2px">
                        <b><font color="#0066FF">
                                <?php
                                $total2014 = DB::table("v_ngo_sub_project_of_sector")->where("PRN", $PRN)->sum("y2014");
                                $total2015 = DB::table("v_ngo_sub_project_of_sector")->where("PRN", $PRN)->sum("y2015");
                                $total2016 = DB::table("v_ngo_sub_project_of_sector")->where("PRN", $PRN)->sum("y2016");
                                $total2017 = DB::table("v_ngo_sub_project_of_sector")->where("PRN", $PRN)->sum("y2017");
                                $total2018 = DB::table("v_ngo_sub_project_of_sector")->where("PRN", $PRN)->sum("y2018");
                                $total2019 = DB::table("v_ngo_sub_project_of_sector")->where("PRN", $PRN)->sum("y2019");
                                ?>
                                TOTAL:&nbsp;&nbsp; </font></b>
                    </td>
                    <td style="padding:2px; "
                        class="fontNormal" width="9%"
                        bgcolor="#ECE9D8" align="right">
                        <b><font color="#0066FF"> {{MyUtility::formatThousand($total2014)}}
                            </font></b>
                    </td>

                    <td style="padding:2px; "
                        class="fontNormal" width="9%"
                        bgcolor="#ECE9D8" align="right">
                        <b><font color="#0066FF">{{MyUtility::formatThousand($total2015)}}
                            </font></b>
                    </td>

                    <td style="padding:2px; "
                        class="fontNormal" width="9%"
                        bgcolor="#ECE9D8" align="right">
                        <b><font color="#0066FF">{{MyUtility::formatThousand($total2016)}}
                            </font></b>
                    </td>

                    <td style="padding:2px; "
                        class="fontNormal" width="9%"
                        bgcolor="#ECE9D8" align="right">
                        <b><font color="#0066FF">{{MyUtility::formatThousand($total2017)}}
                            </font></b>
                    </td>

                    <td style="padding:2px; "
                        class="fontNormal" width="9%"
                        bgcolor="#ECE9D8" align="right">
                        <b><font color="#0066FF">{{MyUtility::formatThousand($total2018)}}
                            </font></b>
                    </td>

                    <td style="padding:2px; "
                        class="fontNormal" width="9%"
                        bgcolor="#ECE9D8" align="right">
                        <b><font color="#0066FF">{{MyUtility::formatThousand($total2019)}}
                            </font></b>
                    </td>

                    <td width="10%" nowrap="" bgcolor="#ECE9D8"
                        align="right" style="padding: 2px">


                    </td>

                </tr>

                @if (count($project) > 0)
                    <tr>
                        <td colspan="2"
                            style="padding:2px; "
                            class="fontNormal" nowrap=""
                            bgcolor="#ECE9D8" align="center">
                            <b>
                                <a href="#none"
                                   name="DeleteAlltblProjectSector"
                                   id="DeleteAlltblProjectSector"
                                   onclick="deleteAllSector({{$trNumSector}})"
                                >
                                    Delete All</a></b></td>
                        <td width="25%" bgcolor="#ECE9D8"
                            align="center" style="padding: 2px">

                            <select size="1" name="cmdSector"
                                    id="cmbSector"
                                    class="fontNormal"
                                    onchange="QuerySubSector(this.value)"
                                    style="width:98%">

                                @foreach($primaryAidSectorList as $primarySec)
                                    <option value="{{$primarySec->SectorCode}}">{{$primarySec->SectorName_E}}</option>
                                @endforeach
                            </select></td>
                        <td width="20%" bgcolor="#ECE9D8"
                            align="center" style="padding: 2px">
				<span id="spanSubSector">
								</span>
                        </td>
                        <td bgcolor="#ECE9D8" align="center" style="padding: 2px">
					<span id="spanCommuneLocation">
					<input name="amount2014" id="amount2014" size="10" class="fontNormal"
                           style="text-align: right; width:90%" maxlength="12" type="text" onblur="checkDecimal(this)"></span>
                        </td>
                        <td bgcolor="#ECE9D8" align="center" style="padding: 2px">
					<span id="spanCommuneLocation">
					<input name="amount2015" id="amount2015" size="10" class="fontNormal" style="text-align: right"
                           maxlength="12" type="text" onblur="checkDecimal(this)"></span></td>
                        <td bgcolor="#ECE9D8" align="center" style="padding: 2px">
					<span id="spanCommuneLocation">
					<input name="amount2016" id="amount2016" size="10" class="fontNormal" style="text-align: right"
                           maxlength="12" type="text" onblur="checkDecimal(this)"></span></td>
                        <td bgcolor="#ECE9D8" align="center" style="padding: 2px">
					<span id="spanCommuneLocation0">
					<input name="amount2017" id="amount2017" size="10" class="fontNormal" style="text-align: right"
                           maxlength="12" type="text" onblur="checkDecimal(this)"></span></td>
                        <td bgcolor="#ECE9D8" align="center" style="padding: 2px">
					<span id="spanCommuneLocation">
					<input name="amount2018" id="amount2018" size="10" class="fontNormal"
                           style="text-align: right; width:90%" maxlength="12" type="text" onblur="checkDecimal(this)"></span>
                        </td>

                        <td bgcolor="#ECE9D8" align="center" style="padding: 2px">
                                        <span id="spanCommuneLocation">
                                      <input name="amount2019" id="amount2019" size="10" class="fontNormal"
                                             style="text-align: right; width:90%" maxlength="12" type="text"
                                             onblur="checkDecimal(this)"></span>
                        </td>
                        <td width="10%" nowrap="" bgcolor="#ECE9D8"
                            align="center" style="padding: 2px">
                            <a href="#none"
                               id="bntAddtblProjectSector"
                               name="bntAddtblProjectSector"
                               class="fontNormal" title="Add"
                               onclick="insertProjectSector(this.title)">
                                <img src="/images/add.png"
                                     id="imgAddtblProjectSector"
                                     width="16" border="0"
                                     height="16"></a>&nbsp;<a
                                    href="#none"
                                    id="bntCanceltblProjectSector"
                                    name="bntCanceltblProjectSector"
                                    class="fontNormal"
                                    title="Cancel"
                                    onclick="cancelProjectSector()"><img
                                        src="/images/reload.png"
                                        title="Cancel"
                                        width="16" border="0"
                                        height="16"></a>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>


        </td>
    </tr>
    <tr>
        <td>

        </td>
    </tr>
</table>


&nbsp;</p>

<input id="hiddenSectorRecNumber" name="hiddenSectorRecNumber" value="{{$trNumSector}}" type="hidden">
<input id="hiddenOldSectorCode" name="hiddenOldSectorCode" value="" type="hidden">
<input id="hiddenOldSubSectorCode" name="hiddenOldSubSectorCode" value="" type="hidden">
<script type="text/javascript">

    function checkSector(obj) {

        var i
        var n = parseInt(ById('hiddenSectorRecNumber').value);
        for (i = 1; i <= n; i++) {
            try {
                if (obj.checked) {
                    byId("tblProjectSectorRow" + i).style.backgroundColor = "red";
                } else {
                    byId("tblProjectSectorRow" + i).style.backgroundColor = "white";
                }
                ById('chktblProjectSector' + i).checked = obj.checked;

            } catch (e) {
            }
        }

    }

    function chkSector(chk, tr_no) {

        var allCh = getvalueCheckGroup('chktblProjectSector').length;
        var n = parseInt(ById('hiddenSectorRecNumber').value);
        if (allCh == n) {
            byId("chkSecDeleteAll").checked = true;
        } else {

            ById('chkSecDeleteAll').checked = false;
        }
        if (chk.checked) {
            byId("tblProjectSectorRow" + tr_no).style.backgroundColor = "red";
        } else {
            byId("tblProjectSectorRow" + tr_no).style.backgroundColor = "white";
        }
    }
    function deleteProjectSector(row) {
        try {
            var SectorName_E = ($('#SectorName_E' + row).text()).trim();
            var SubSectorName_E = ($('#SubSectorName_E' + row).text()).trim();
            selectListItemByText('cmbSector', SectorName_E);

            ClearSelectionRow('tblProjectSector')
            $('#cmbSector').change();
            selectListItemByText('cmbSubSector', SubSectorName_E);
            var sectoRID = $("#cmbSector").val();
            var subSectoRID = $("#cmbSubSector").val();
            $("#hiddenOldSectorCode").val(sectoRID);
            $("#hiddenOldSubSectorCode").val(subSectoRID);
            ClearSelectionRow('tblProjectSector');
            setRowColor('tblProjectSectorRow' + row, 'red');

            if (confirm('Are you sure to delete?')) {
                var data = '?PRN=' + '{{$PRN}}}';
                data += '&hiddenOldSectorCode=' + $("#hiddenOldSectorCode").val();
                data += '&hiddenOldSubSectorCode=' + $("#hiddenOldSubSectorCode").val();
                Ajax_UpdatePanel("/ngo/project/project_01/project_location/delete", data, "project_sector_form", true);


            }
            else {
                ClearSelectionRow('tblProjectSector')
            }


        }
        catch (e) {
            alert(e.message)
        }


    }

    function editProjectSector(row) {
        try {
            var amount2018 = ($('#Amount2018' + row).text()).trim();
            var amount2014 = ($('#Amount2014' + row).text()).trim();
            var amount2015 = ($('#Amount2015' + row).text()).trim();
            var amount2016 = ($('#Amount2016' + row).text()).trim();
            var amount2017 = ($('#Amount2017' + row).text()).trim();
            var amount2019 = ($('#Amount2019' + row).text()).trim();

            ById('amount2019').value = amount2019;
            ById('amount2018').value = amount2018;
            ById('amount2014').value = amount2014;
            ById('amount2015').value = amount2015;
            ById('amount2016').value = amount2016;
            ById('amount2017').value = amount2017;

            var SectorName_E = ($('#SectorName_E' + row).text()).trim();
            var SubSectorName_E = ($('#SubSectorName_E' + row).text()).trim();
            selectListItemByText('cmbSector', SectorName_E);

            ClearSelectionRow('tblProjectSector')
            editRow('tblProjectSectorRow' + row)

            $('#cmbSector').change();
            selectListItemByText('cmbSubSector', SubSectorName_E);
            var sectoRID = $("#cmbSector").val();
            var subSectoRID = $("#cmbSubSector").val();
            $("#hiddenOldSectorCode").val(sectoRID);
            $("#hiddenOldSubSectorCode").val(subSectoRID);


            ById('bntAddtblProjectSector').title = 'Update';
            ById('imgAddtblProjectSector').src = '/images/save-alt.png';
        }
        catch (e) {
            alert(e.message)
        }

    }

    function QuerySubSector(sectorCode) {
        var data = '?sectorCode=' + sectorCode;
        Ajax_UpdatePanelAsync("/ngo/project/project_01/project_location/get_sub_sector", data, "spanSubSector", true);
    }


    function checkFillProejctSector() {
        var sectoRID = $("#cmbSector").val();
        var subSectoRID = $("#cmbSubSector").val();
        if (sectoRID == "") {
            return false;
        }

        if (subSectoRID == "") {

            byId('cmbSubSector').title = 'Please, select sub-sector';
            $('#cmbSubSector').tooltip('show')
            $('#cmbSubSector').focus()
            return false;
        }

        var Amount2014 = $("#amount2014").val();
        var Amount2015 = $("#amount2015").val();
        var Amount2016 = $("#amount2016").val();
        var Amount2017 = $("#amount2017").val();
        var Amount2018 = $("#amount2018").val();
        var Amount2019 = $("#amount2019").val();

        if (Amount2014 == "" && Amount2015 == "" && Amount2016 == "" && Amount2017 == "" && Amount2018 == "" && Amount2019 == "") {
            alert("Please input amount!")
            return false;
        }

        return true;

    }

    function cancelProjectSector() {
        ById('amount2019').value = "";
        ById('amount2018').value = "";
        ById('amount2014').value = "";
        ById('amount2015').value = "";
        ById('amount2016').value = "";
        ById('amount2017').value = "";

        $("#hiddenOldSectorCode").val("");
        $("#hiddenOldSubSectorCode").val("");

        ById('bntAddtblProjectSector').title = 'Add';
        ById('imgAddtblProjectSector').src = '/images/Add.png';
        ClearSelectionRow('tblProjectSector')
    }
    function insertProjectSector(title) {

        var oldSubSector=$("#hiddenOldSubSectorCode").val();
        var subSector=$("#cmbSubSector").val()
        var data = '?PRN={{$PRN}}';
        data += '&SectorName_E=' + $("#cmbSector").val();
        data += '&SubSectorName_E=' + subSector;
        data += '&Amount2014=' + $("#amount2014").val();
        data += '&Amount2015=' + $("#amount2015").val();
        data += '&Amount2016=' + $("#amount2016").val();
        data += '&Amount2017=' + $("#amount2017").val();
        data += '&Amount2018=' + $("#amount2018").val();
        data += '&Amount2019=' + $("#amount2019").val();
        data += '&hiddenOldSectorCode=' + $("#hiddenOldSectorCode").val();
        data += '&hiddenOldSubSectorCode=' + $("#hiddenOldSubSectorCode").val();



        canUpdate = true;
        if (oldSubSector != subSector) {
            isSubSectorExist = Ajax_getResult("/ngo/project/project_01/project_sector/exist", data) == "true";

            if (isSubSectorExist) {
                byId('cmbSubSector').title = 'Selected Sub-Sector already exist';
                $('#cmbSubSector').tooltip('show')
                $('#cmbSubSector').focus()
                return;

            } else {
                // update
                canUpdate = true;
            }
        }
        if ((checkFillProejctSector()) && (canUpdate)) {
            if (title == "Add") {
                Ajax_UpdatePanel("/ngo/project/project_01/project_location/insert", data, "project_sector_form", true);
            } else {
                Ajax_UpdatePanel("/ngo/project/project_01/project_location/update", data, "project_sector_form", true);
            }

        }
    }

    function pagingSector(page) {
//
        var data = '?PRN=' + $("#PRN").val();
        data += '&page=' + page;
        Ajax_UpdatePanel("/ngo/project/project_01/project_sector/listing", data, "project_sector_form", true);

    }


    function getCheckBoxValues(chkId, totalRow) {
        var values = "";
        for (var i = 1; i <= totalRow; i++) {
            var chk = ById(chkId + "" + i)
            if (chk.checked) {
                if (values != "") {
                    values += ",";
                }
                values += chk.value;
            }
        }

        return values
    }

    function deleteAllSector(totalRow) {
        var subSectors = getCheckBoxValues("chktblProjectSector", totalRow)
        if (subSectors != "") {
            var answer = confirm("Are you sure to delete?")
            if (answer) {
                // ajax to delete
                var data = "?PRN=" + {{$PRN}};
                data += "&SubSectorName_E=" + subSectors;
                Ajax_UpdatePanel("/ngo/project/project_01/project_location/delete_checked", data, "project_sector_form", true);

            } else {
                // do nothing
            }
        }
    }


    function initProjectSector() {
        QuerySubSector(ById("cmbSector").value)
    }

    initProjectSector();

</script>