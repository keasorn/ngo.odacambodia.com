<?php
$topMenuId="listOfNgo";

?>
@extends('ngo.layout.with_menu')
@section('content')
        <tr>
            <td height="20">
                <div align="center">
                <table id="table2" style="border-collapse: collapse;" width="99%" cellpadding="2" border="0">
                    <tbody>
                    <tr>
                        <td>
                            &nbsp;<table id="table3" style="border-collapse: collapse;" width="100%"
                                   cellpadding="2"
                                   border="0">
                                <tbody>

                                <tr>
                                    <td valign="top" nowrap="" width="188" colspan="2" rowspan="2">
												<fieldset style="padding: 2; width:153px; height:131px;
    border: 2px solid #C0C0C0 !important;">
                                            <legend><b>
                                                    <font color="#3399FF">NGO Type</font></b></legend>
                                            <input value="0" name="rdNgoType" id="rdAllNgoType" checked=""
                                                   type="radio"><label for="rdAllNgoType">ALL</label><br>
                                            <input value="1" name="rdNgoType" id="rdForeignNgoType" type="radio"><label
                                                    for="rdForeignNgoType">Foreign NGOs</label><br>
                                            <input value="2" name="rdNgoType" id="rdCambodianNgoType"
                                                   type="radio"><label
                                                    for="rdCambodianNgoType">Cambodian NGOs</label></fieldset></td>
                                    <td valign="top" nowrap="" width="153">
												<fieldset style="padding: 2; width:153px; height:131px;
    border: 2px solid #C0C0C0 !important;">
												<legend><b>
												<font color="#3399FF">NGO Status</font></b></legend>
												<input type="radio" value="0" name="rdNgoStatus" id="rdAllNgoStatus"><label for="rdAllNgoStatus">ALL</label><br>
												<input type="radio" value="1" name="rdNgoStatus" id="rdActiveNgoStatus" checked=""><label for="rdActiveNgoStatus">Active</label><br>
												<input type="radio" value="2" name="rdNgoStatus" id="rdCloseNgoStatus"><label for="rdCloseNgoStatus">Close</label><br>
												<input type="radio" value="3" name="rdNgoStatus" id="rdNotReportedNgoStatus"><label for="rdNotReportedNgoStatus">Not Reported</label><br>
												</fieldset></td>
                                    <td valign="top" nowrap="" width="100%">
                                        <fieldset style="border: 2px solid #C0C0C0 !important;">
                                            <legend><b>
                                                    <font color="#3399FF">Select one letter to search</font></b>
                                            </legend>
                                            <table id="table4" style="border-collapse: collapse" width="100%"
                                                   cellpadding="2" border="0">
                                                <tbody>
                                                <tr>
                                                    <td height="23" style="padding: 2px">
                                                        <a href="#none"><span id="bntA"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">A</span></a>
                                                        <a href="#none"><span id="bntB"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">B</span></a>
                                                        <a href="#none"><span id="bntC"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">C</span></a>
                                                        <a href="#none"><span id="bntD"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">D</span></a>
                                                        <a href="#none"><span id="bntE"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">E</span></a>
                                                        <a href="#none"><span id="bntF"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">F</span></a>
                                                        <a href="#none"><span id="bntG"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">G</span></a>
                                                        <a href="#none"><span id="bntH"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">H</span></a>
                                                        <a href="#none"><span id="bntI"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">I</span></a>
                                                        <a href="#none"><span id="bntJ"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">J</span></a>
                                                        <a href="#none"><span id="bntK"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">K</span></a>
                                                        <a href="#none"><span id="bntL"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">L</span></a>
                                                        <a href="#none"><span id="bntM"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">M</span></a>
                                                        <a href="#none"><span id="bntN"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">N</span></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="fontBig" style="padding: 2px">
                                                        <a href="#none"><span id="bntO"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">O</span></a>
                                                        <a href="#none"><span id="bntP"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">P</span></a>
                                                        <a href="#none"><span id="bntQ"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">Q</span></a>
                                                        <a href="#none"><span id="bntR"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">R</span></a>
                                                        <a href="#none"><span id="bntS"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">S</span></a>
                                                        <a href="#none"><span id="bntT"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">T</span></a>
                                                        <a href="#none"><span id="bntU"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">U</span></a>
                                                        <a href="#none"><span id="bntV"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">V</span></a>
                                                        <a href="#none"><span id="bntW"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">W</span></a>
                                                        <a href="#none"><span id="bntX"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">X</span></a>
                                                        <a href="#none"><span id="bntY"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">Y</span></a>
                                                        <a href="#none"><span id="bntZ"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">Z</span></a>
                                                        <a href="#none"><span id="bntALL"
                                                                              onclick="setLetterBgColor(this,'Yellow')"
                                                                              style="background-color:Yellow; border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">ALL</span></a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </fieldset>
                                        <fieldset style="border: 2px solid #C0C0C0 !important;">
                                            <legend ><b>
                                                    <font color="#0000FF">Search By</font></b></legend>
                                            <input value="Acronym" checked="" name="rdSearchBy" id="rdSearchByAcronym"
                                                   type="radio"><label for="rdSearchByAcronym">Acronym</label>
                                            <input value="NGOName" name="rdSearchBy" id="rdSearchByNGOName"
                                                   type="radio"><label for="rdSearchByNGOName">NGO Name</label>
                                        </fieldset>
                                        <input name="hiddenSubmitVAlue" id="hiddenSubmitVAlue" size="10"
                                               value="&amp;NgoStatusId=1&amp;Acronym=%" type="hidden">
                                        <input name="hiddenWhere" id="hiddenWhere" size="10"
                                               value="([NGO Status].NGOStatusID=1) and  ([tbl_ngo_core_details].Acronym Like '%')"
                                               type="hidden">
                                        <input name="hiddenLetter" id="hiddenLetter" size="10" value="ALL"
                                               type="hidden">
                                    </td>
                                    <td valign="top" nowrap="">

                                        <br>

                                        <button name="bntSearch" id="bntSearch" onclick="search()" type="button"><font
                                                    color="#0066FF">
                                                <b>
                                                    <img src="/images/search_16.png" width="16" border="0"
                                                         align="absmiddle" height="16">
                                                </b>Search</font></button>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="center"><br>
						<span id="spanNgoListing">
                                @include('ngo.list.list_form_ngo')
                                {!! csrf_field() !!}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            </td>
        </tr>
    <script type="text/javascript">

        function search() {
            var data = 'RID=' + {{$RID}};
            data += "&Status=" + $("input[name='rdNgoStatus']:checked").val();
            data += "&NgoType=" + $("input[name='rdNgoType']:checked").val();
            data += "&orderBy=" + $("input[name='rdSearchBy']:checked").val();
            data += "&ap=" + $("#hiddenLetter").val();
            Ajax_UpdatePanelAsync("/search/list_of_ngo?",data,"spanNgoListing",true);

        }

        function setLetterBgColor(obj, color) {
            clearBntBgColor()
            obj.style.backgroundColor = color
            ById("hiddenLetter").value = obj.innerHTML

        }
        function clearBntBgColor() {
            var color = "white"
            ById("bntA").style.backgroundColor = color

            ById("bntB").style.backgroundColor = color
            ById("bntC").style.backgroundColor = color
            ById("bntD").style.backgroundColor = color
            ById("bntE").style.backgroundColor = color
            ById("bntF").style.backgroundColor = color
            ById("bntG").style.backgroundColor = color
            ById("bntH").style.backgroundColor = color
            ById("bntI").style.backgroundColor = color
            ById("bntJ").style.backgroundColor = color
            ById("bntK").style.backgroundColor = color
            ById("bntL").style.backgroundColor = color
            ById("bntM").style.backgroundColor = color
            ById("bntN").style.backgroundColor = color
            ById("bntO").style.backgroundColor = color
            ById("bntP").style.backgroundColor = color
            ById("bntQ").style.backgroundColor = color
            ById("bntR").style.backgroundColor = color
            ById("bntS").style.backgroundColor = color
            ById("bntT").style.backgroundColor = color
            ById("bntU").style.backgroundColor = color
            ById("bntV").style.backgroundColor = color
            ById("bntW").style.backgroundColor = color
            ById("bntX").style.backgroundColor = color
            ById("bntY").style.backgroundColor = color
            ById("bntZ").style.backgroundColor = color
            ById("bntALL").style.backgroundColor = color
        }
    </script>
@endsection