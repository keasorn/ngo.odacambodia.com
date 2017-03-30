<?php
use App\Models\ngo\NgoProjectLinkDocModel;
$pro_link_doc = NgoProjectLinkDocModel::where("PRN", $PRN)->get();

?>
<table class="fontNormal" id="tbl_pro_link" cellpadding="2" style="border-collapse: collapse" width="600" border="1"
       bordercolor="#C0C0C0">

    <thead>

    <tr>

        <td class="text-center" bgcolor="#ECE9D8" height="27" align="center"><b>No</b></td>

        <td class="text-center" style="width: 63%" bgcolor="#ECE9D8" height="27" align="center">
		<b>Link Document (Full path)</b></td>

        <td class="text-center" bgcolor="#ECE9D8" height="27" align="center" width="135">
		</td>

    </tr>

    </thead>

    <tbody>

    <?php

    $i = 0;

    ?>

    @foreach($pro_link_doc as $link)

        <tr id="trlink{{++$i}}">

            <td class="text-center" height="28" align="center"><input type="checkbox" name="imp_agc[]"
                                                                      value="{{$link->linkId}}" id="ch_link{{$i}}"

                                                                      onclick="selectRowLink(this,'{{$i}}');"></td>

            <td height="28">

                <a href="{{$link->link}}" id="link{{$i}}" target="_blank">{{$link->link}}</a>

            </td>

            <td class="text-center" height="28" align="left" width="135"><a href="#none"
                                                                            onclick="linkEdit('{{$i}}','{{$link->linkId}}')">Edit</a>
            </td>

        </tr>

    @endforeach

    <tr id="ministryRow0">

        <td class="text-center"><input type="button" value="Delete" class="fontNormal"

                                       title="Delete" onclick="deleteLink();"></td>

        <td align="center">

            <input type="text" class="fontNormal" id="link_in" style="width: 98%">

        </td>


        <td class="text-right" align="left" nowrap>

            <input type="button" class="fontNormal"

                   onclick="linkInsert();" id="btnlinkInsert" title="Add New" value="Add">

            <input type="button" class="fontNormal" style="display: none"

                   onclick="linkUpdata();" id="btnlinkUpdate" title="Update" value="Update">

            <input type="button" class="fontNormal" value="Cancel" title="Cancel"

                   onclick="cancelLink()">

        </td>

    </tr>

    </tbody>

</table>

<input type="hidden" id="link_id" >


<script>

    function checkFillLink() {

        if ($("#link_in").val() == "") {

            $("#link_in").focus()

            return false

        } else {

            return true

        }

    }

    function selectRowLink(chk, tr_no) {

        if (chk.checked) {

            byId("trlink" + (tr_no)).style.backgroundColor = "red";

        } else {

            byId("trlink" + (tr_no)).style.backgroundColor = "white";

        }

    }

    function cancelLink() {

        ClearSelectionRow("tbl_pro_link")

        $("#link_in").val("")

        byId("btnlinkInsert").style.display = ""

        byId("btnlinkUpdate").style.display = "none"

    }

    function deleteLink() {

        var total_row = "{{$i}}"

        var act_ids = ""

        for (var i = 1; i <= total_row; i++) {

            var chk = byId("ch_link" + i);

            if (chk.checked) {

                if (act_ids != "") act_ids += ",";

                act_ids += chk.value;

            }

        }

        if (act_ids != "") {

            var answer = confirm("Are you sure to delete?");

        }

        if (answer) {


            var data = 'PRN=' + "{{$PRN}}";

            data += "&act_ids=" + act_ids;

            $.ajax({

                url: '/ngo/project/project_03/pro_link/delete',

                method: 'get',

                data: data,

                async: false,

                success: function (response, status) {

                    $('#project_link_doc').html(response);

                },

                error: function (xhr, status, error) {

                    alert('error')

                    alert(error)

                }

            });

        } else {

            return

        }

    }

    function linkEdit(i, link_id) {

        ClearSelectionRow("tbl_pro_link")

        byId("trlink" + (i)).style.backgroundColor = "yellow";

        link = $("#link" + i).text()

        $("#link_id").val(link_id)

        $("#link_in").val(link)

        $("#link_in").focus()

        byId("btnlinkInsert").style.display = "none"

        byId("btnlinkUpdate").style.display = ""

    }


    function linkInsert() {

        if (checkFillLink() == true) {

            var data = 'PRN=' + "{{$PRN}}";

            data += "&link=" + $("#link_in").val();

            $.ajax({

                url: '/ngo/project/project_03/pro_link/insert',

                method: 'get',

                data: data,

                async: false,

                success: function (response, status) {

                    $('#project_link_doc').html(response);

                },

                error: function (xhr, status, error) {

                    alert('error')

                    alert(error)

                }

            });

        } else {

            return

        }

    }

    function linkUpdata() {

        if (checkFillLink() == true) {

            var data = 'PRN=' + "{{$PRN}}";

            data += "&linkId=" + $("#link_id").val();

            data += "&link=" + $("#link_in").val();

            $.ajax({

                url: '/ngo/project/project_03/pro_link/update',

                method: 'get',

                data: data,

                async: false,

                success: function (response, status) {

                    $('#project_link_doc').html(response);

                },

                error: function (xhr, status, error) {

                    alert('error')

                    alert(error)

                }

            });

        } else {

            return

        }

    }

</script>