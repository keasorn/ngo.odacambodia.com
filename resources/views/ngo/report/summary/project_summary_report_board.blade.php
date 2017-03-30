      @extends("ngo.layout.report_popup")

@section("content")
    <form method="POST" action="" id="myform" name="myform" target="_blank">

    {!! csrf_field() !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div align="center">

            <table border="1" width="98%" id="table1" cellspacing="1" height="98%" style="border-collapse: collapse"
                   bordercolor="#C0C0C0">
                <tr>
                    <td>
                        <table border="0" width="100%" id="table2" cellspacing="2" class="fontNormal" cellpadding="2">
                            <tr>
                                <td align="right" class="fontNormal" bgcolor="#E6F0FF"><b>NGOs:</b></td>
                                <td>
                                    <select size="1" name="cmbRID" id="cmbRID" class="fontNormal">
                                        <option value="0">- - - All NGOs - - -</option>
                                        @foreach($RIDlist as $row)
                                        <option value="{{$row->RID}}"
                                                title="{{$row->Org_Name_E}}">{{$row->Acronym}}</option>
										@endforeach                                       
                                    </select></td>
                            </tr>
                            <tr>
                                <td align="right" class="fontNormal" bgcolor="#E6F0FF"><b>Project Status:</b></td>
                                <td><select size="1" name="cmbStatus" id="cmbStatus" class="fontnormal">
                                        <option selected value="0">- - - All Status - - -</option>
                                        <option value="1">On-going</option>
                                        <option value="2">Completed</option>
                                        <option value="3">Suspended</option>
                                        <option value="4">Pipeline</option>
                                        <option value="5">(Not Reported)</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <td align="right" height="10" colspan="2"></td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2">
                                    <input type="button" value="OK" name="bntSubmit" class="fontNormal" style="width:60"
                                           onclick="submitform()">
                                    <input type="button" value="Close" name="bntClose" class="fontNormal"
                                           style="width:60" onclick="window.close()"></td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2" height="51">
                                    <input type="checkbox" name="chkClose" id="chkClose" value="ON"><label
                                            for="chkClose">Close this windows after
                                        I click OK.</label></td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>

        </div>


<p>

    &nbsp;</p>
<p>

    <script type="text/javascript" language="javascript"> 
       
        function submitform()
        {
        	
            var RID = ById('cmbRID').value;
            var status = ById('cmbStatus').value;
             var data = "?RID="+RID
            	data += "&ProjectStatusName=" + status
            	
        	 var n = Ajax_getResult('/ngo/report/summary/function/dcount',data)
        	if (n == 0)
            {
                alert('No Project(s) found!');
                return;
            }else{
            

            if (ById('chkClose').checked) window.close();
          
            myform.action =data;
            myform.submit();
            }
        }

    </script>
@endsection
</p>
