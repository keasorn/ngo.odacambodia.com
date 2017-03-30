<?php
        use App\Models\ngo\NgoProjectDocModel;
$pro_doc = NgoProjectDocModel::where("PRN", $PRN)->get();
 

?>

<table class="fontNormal" id="tblImp" cellpadding="2" style="border-collapse: collapse" border="1" bordercolor="#C0C0C0" width="600">

    <thead>

    <tr>

        <td class="text-center" bgcolor="#ECE9D8" width="75" height="30" align="center">
		<b>No</b></td>

        <td class="text-center" bgcolor="#ECE9D8" colspan="2" height="30" align="center">
		<b>PDF Document</b></td>

    </tr>

    </thead>

    <tbody>

    <?php

    $numDoc = 0;

    ?>

    @foreach($pro_doc as $doc)

        <tr id="trDoc{{++$numDoc}}">

            <td  align="center" width="75" height="29"><input type="checkbox" name="imp_agc[]" value="{{$doc->projectDocId}}"

                                           id="doc_link{{$numDoc}}"

                                           onclick="selectDocLink(this,'{{$numDoc}}');"></td>

            <td>

                <a href="/assets/ngo_attachment/{{$PRN}}/{{$doc->pdfDoc}}" target="_blank">{{$doc->pdfDoc}}</a>

            </td>

                     

        </tr>

    @endforeach

    <tr id="trUploadPdfDoc">

        <td align="center" width="75"><input type="button" id="btnDeletePdfDoc"

                                   title="Delete" onclick="deleteDocLink();" value="Delete"></td>

        <td width="441" td="pdfDoc">



            <input type="file" id="file_obj" name="file_obj" style="width: 90%" accept=".pdf">



        </td>



        <td width="67">

            <input type="button" class="fontNormal"

               onclick="proDocInsert()" id="btnInserPdfDoc" title="Upload" value="Upload"></td>



    </tr>

    <tr id="trProgressPdfDoc" style="display:none">

        <td align="center" colspan="3">

            Uploading <img src="/images/loading6.gif">

        </td>

    </tr>

    </tbody>

    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

</table>

<script type="text/javascript">

    function proDocInsert() {

        // var file_obj = $("#file_name").prop('files')[0];

        //  var file_name = $("#file_name").val().split('\\').pop();

        // alert(file_name)



        var file_data = $('#file_obj').prop('files')[0];
        if (file_data == null) {
        } else {

                var file_name = file_data['name']

                var ext = file_name.split('.').pop().toLowerCase();

                if (ext != "pdf") {

                    alert("Only PDF file is allowed to upload");

                    return;

                }
                var url = "/dp/data_entry/project_03/countProjectDoc"

                var data = "?PRN={{$PRN}}"

                data += "&pdfDoc="+ encodeURIComponent(file_name)

                var isFileExist = (Ajax_getResult(url, data) == "1");    

                

                if (isFileExist) {

                    var id = "file_obj";

                    byId(id).title = "Selected file already exists";

                    $("#"+ id).tooltip('show')

                    byId(id).focus()    

                    return;

                }

                

                

                // end file exist



                /// ---- size limit -----------

                var limit_size = 8388608 * 3 ; // 24MB

                var file_size = file_data['size'];



             //   alert(file_size)



                if (file_size >= limit_size) {

                    alert("File size is larger than " + parseInt(limit_size / 1000000) + "MB");

                    return;

                }

                //------- end of size limit ---------



                byId("trUploadPdfDoc").style.display = "none" 

                byId("trProgressPdfDoc").style.display = "" 



                var form_data = new FormData();

                form_data.append('file', file_data);

                form_data.append('PRN', "{{$PRN}}");

                $.ajax({
                    url: '/ngo/project/project_03/pro_doc/upload',
                    dataType: 'text',  // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    async: true,
                    success: function (response, status) {
                        $('#project_doc').html(response);
                    },

                    error: function (xhr, status, error) {

                        alert(error)

                    }

                });

            

        }

    }

    function selectDocLink(chk, tr_no) {

        if (chk.checked) {

            byId("trDoc" + (tr_no)).style.backgroundColor = "red";

        } else {

            byId("trDoc" + (tr_no)).style.backgroundColor =  "white";

        }

    }

    function deleteDocLink() {

        var total_row = "{{$numDoc}}"

        var act_ids = getCheckBoxValues("doc_link", {{$numDoc}})


        if (act_ids != "") {
            var answer = confirm("Are you sure to delete?");
        }

        if (answer) {



            var data = 'PRN=' + "{{$PRN}}";

            data += "&act_ids=" + act_ids;

            $.ajax({

                url: '/ngo/project/project_03/doc_link/delete',

                method: 'get',

                data: data,

                async: false,

                success: function (response, status) {

                    $('#project_doc').html(response);

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