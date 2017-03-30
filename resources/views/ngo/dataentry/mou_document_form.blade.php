<?php
use App\Models\ngo\MouDocumentModel;
$mouDocModel=MouDocumentModel::where("RID",$RID)->get();
?>
<table class="fontNormal" style="width: 500; border-collapse:collapse"
       id="tblMouDocument" cellpadding="2" border="1" bordercolor="#C0C0C0">
    <thead>
    <tr>
        <th class="text-center" bgcolor="#F7F7F7" height="28" width="80" colspan="2">No</th>
        <th class="text-center" style="width: 450px" bgcolor="#F7F7F7" height="28">PDF
            Document
        </th>
        <th class="text-center" bgcolor="#F7F7F7" height="28"></th>
    </tr>
    </thead>
    <tbody>

    <?php
    $numtr=0;
    ?>
    @foreach($mouDocModel as $m)
    <tr id="trDoc{{++$numtr}}">
        <td class="text-center" height="30" align="center" width="40"><input type="checkbox" name="imp_agc[]" value="{{$m->pdfId}}" id="mou_doc{{$numtr}}" onclick="selectDocLink(this,{{$numtr}});"> </td>
        <td class="text-center" height="30" align="center" width="40">{{$numtr}}.</td>
        <td height="30" style="padding-left: 4px; padding-right: 4px" width="450">
		<a href="/assets/ngo_attachment/{{urlencode($RID)}}/{{$m->MOU_PDF}}" target="_blank">{{$m->MOU_PDF}}</a></td>
        <td height="30"></td>
    </tr>
    @endforeach

    <tr id="upload_form">
        <td class="text-center" align="center" width="80" colspan="2"><button type="button" id="btnDeleteDocLink" class="fontNormal"   onclick="deleteDocLink();">Delete</button>
        </td>
        <td width="450">

            <input type="file" id="file_obj" class="fontNormal"
                   name="file_obj" style="width: 90%" accept=".pdf">

        </td>
        <td class="text-right">
            <button type="button"
               class="fontNormal"
               onclick="mouDocInsert()" id="btnAddDocLink"
               title="Add New">Add</button>
        </td>
    </tr>
    </tbody>
    <input name="_token" type="hidden"
           value="NRpUq7A1bjIiNlODAevkshYh3ims1OKMO2ZiTp8w">
</table>


<script>
    function mouDocInsert() {
        var file_data = $('#file_obj').prop('files')[0];
        if (file_data == null) {
        } else {
            // pdf only
            var file_name = file_data['name']
            var ext = file_name.split('.').pop().toLowerCase();
            if (ext != "pdf") {
                alert("Only PDF file is allowed to upload");
                return;
            }
            // --- end of pdf only

            /// ---- size limit -----------
            var limit_size = 8388608; // 8MB
            var file_size = file_data['size'];
            var pat = file_data['path'];

            if (file_size >= limit_size) {
                alert("File size is larger than " + parseInt(limit_size / 1000000) + "MB");
                return;
            }
            //------- end of size limit ---------

            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('RID', "{{$RID}}");

            $.ajax({
                url: '/dataentry/mou_doc/upload',
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                async: true,
                success: function (response, status) {
                    if(response == 1){
                        alert("File is already exist");
                    }else {
                        $('#mou_document').html(response);
                    }
                },
                error: function (xhr, status, error) {
                    alert(error)
                }
            });
        }
    }
    function selectDocLink(chk, tr_no) {
        if (chk.checked) {
            setRowColor("trDoc" + (tr_no), "red");
        } else {
            setRowColor("trDoc" + (tr_no), "white");
        }
    }
    function deleteDocLink() {
        var total_row = "{{$numtr}}";
        var act_ids = ""
        for (var i = 1; i <= total_row; i++) {
            var chk = document.getElementById("mou_doc" + i);
            if (chk.checked) {
                if (act_ids != "") act_ids += ",";
                act_ids += chk.value;
            }
        }
        if (act_ids != "") {
            var answer = confirm("Are you sure to delete?");
        }
        if (answer) {

            var data = '?RID=' + "{{$RID}}";
            data += "&act_ids=" + act_ids;
            Ajax_UpdatePanelAsync('/dataentry/mou_doc/delete',data,'mou_document',true);

        } else {
            return
        }
    }
</script>