<?php
use App\Http\Controllers\MyUtility;
?>
<table width="100%" border="1" cellpadding="2" cellspacing="1" bordercolor="#0066FF" style="border-collapse:collapse">
  <tr bgcolor="#C8D5E4">
    <td width="4%" height="25" style="padding: 2px" align="center">
	<span style="color: #0066FF; font-weight:700">No</span></td>
    <td width="21%" height="25" style="padding: 2px" align="center">
	<span style="color: #0066FF; font-weight:700">Acronym</span></td>
    <td width="65%" height="25" style="padding: 2px" align="center">
	<span style="color: #0066FF; font-weight:700">NGO Name</span></td>
    <td width="9%" height="25" style="padding: 2px" align="center">
	<span style="color: #0066FF; font-weight:700">Number of Project</span></td>
  </tr>
   @if(($ForeignNGOsDs != null) && (MyUtility::getDictData("1",$CountPRNByTypeCode) > 0))
  <tr valign="middle" bgcolor="#FFFFFF">
    <td align="left" colspan="3" bgcolor="#ECF5FF" height="25" style="padding: 2px"><b><font color="#008000">
          <img border="0" src="/images/arrow_red.gif" width="8" height="9"> Foreign NGOs
        </font></b>
    </td>
    <td align="center" bgcolor="#ECF5FF" style="padding: 2px"><b>{{MyUtility::formatThousand(MyUtility::getDictData("1",$CountPRNByTypeCode))}}</b></td>
  </tr>

  <?php
  $No = 0;
  ?>

  @foreach($ForeignNGOsDs as $row)
    @if(MyUtility::getDictData($row->RID ,$CountPRNByLastUpdate)>0)
      <tr valign="middle" bgcolor="#FFFFFF">
        <td align="center" style="padding: 2px">{{++$No}}.</td>
        <td style="padding: 2px">
          <a href="#none" style="color: #000000; font-weight: bold" onclick="
                  showListing('{{$row->RID}}','{{$No}}')
                  "><img src="/images/plus_sign.JPG" id="img{{$No}}" width="9" height="9" border="0" align="absmiddle" /> {{$row->Acronym}} </a>    </td>
        <td align="left" style="padding: 2px">  
		<a href="#none" style="color: #000000; font-weight: bold" onclick="
                  showListing('{{$row->RID}}','{{$No}}')
                  ">&nbsp;{{$row->Org_Name_E}}</a></td>
        <td align="center" style="padding: 2px">{{MyUtility::formatThousand(MyUtility::getDictData($row->RID ,$CountPRNByLastUpdate)) }}</td>
      </tr>



      <tr id="tr{{$No}}" style="display:none">
        <td style="padding: 2px">&nbsp;</td>
        <td colspan="3" bgcolor="#F7F7F7" style="padding: 2px"><div id="div{{$No}}" style="overflow:auto; height:180px">&nbsp;</div></td>
      </tr>
    @endif
  @endforeach
  @endif
  @if(($CambodianNGOsDs != null)  && (MyUtility::getDictData("2",$CountPRNByTypeCode) > 0))
  <tr valign="middle" bgcolor="#FFFFFF">
    <td align="left" colspan="3" bgcolor="#ECF5FF" height="25" style="padding: 2px"><b><font color="#008000">
          <img border="0" src="/images/arrow_red.gif" width="8" height="9"> Cambodian NGOs
        </font></b>
    </td>
    <td align="center" bgcolor="#ECF5FF" style="padding: 2px"><b>{{MyUtility::formatThousand(MyUtility::getDictData("2",$CountPRNByTypeCode))}}</b></td>
  </tr>

  <?php
  $No = 0;
  ?>


  @foreach($CambodianNGOsDs as $row)

    @if(MyUtility::getDictData($row->RID ,$CountPRNByLastUpdate)>0)
      <tr>
        <td align="center" style="padding: 2px">{{++$No}}.</td>
        <td style="padding: 2px">
          <a href="#none" style="color: #000000; font-weight: bold" onclick="
                  showListing('{{$row->RID}}','{{$No}}')
                  ">
            <img src="/images/plus_sign.JPG" id="img{{$No}}0" width="9" height="9" border="0" align="absmiddle" /> {{$row->Acronym}} </a>    </td>
        <td align="left" style="padding: 2px"><a href="#none" style="color: #000000; font-weight: bold" onclick="
                  showListing('{{$row->RID}}','{{$No}}')
                  ">{{$row->Org_Name_E}}</a></td>
        <td align="center" style="padding: 2px">{{MyUtility::formatThousand(MyUtility::getDictData($row->RID ,$CountPRNByLastUpdate)) }}</td>
      </tr>
    @endif
  @endforeach
  @endif
  @if(($associationDs != null ) && (MyUtility::getDictData("3",$CountPRNByTypeCode) > 0))
  <tr id="tr<%=Id%>" style="display:none">
    <td style="padding: 2px">&nbsp;</td>
    <td colspan="3" bgcolor="#F7F7F7" style="padding: 2px"><div id="div<%=RID%>" style="overflow:auto; height:180px">&nbsp;</div></td>
  </tr>


  <tr>
    <td align="left" colspan="3" bgcolor="#ECF5FF" height="25" style="padding: 2px"><b><font color="#008000">
          <img border="0" src="/images/arrow_red.gif" width="8" height="9">
          Association
        </font></b>
    </td>
    <td align="center" bgcolor="#ECF5FF" style="padding: 2px"><b>{{MyUtility::formatThousand(MyUtility::getDictData("3",$CountPRNByTypeCode))}}</b></td>
  </tr>
  <?php

  $No=0
  ?>


    @foreach($associationDs as $row)

      @if(MyUtility::getDictData($row->RID ,$CountPRNByLastUpdate)>0)
        <tr>
          <td align="center" style="padding: 2px">{{++$No}}.</td>
          <td style="padding: 2px">
            <a href="#none" style="color: #000000; font-weight: bold" onclick="
                    showListing('{{$row->RID}}','{{$No}}')
                    ">
              <img src="/images/plus_sign.JPG" id="img{{$No}}1" width="9" height="9" border="0" align="absmiddle" /> {{$row->Acronym}} </a>    </td>
          <td align="left" style="padding: 2px"><a href="#none" style="color: #000000; font-weight: bold" onclick="
                    showListing('{{$row->RID}}','{{$No}}')
                    ">{{$row->Org_Name_E}}</a></td>
          <td align="center" style="padding: 2px">{{MyUtility::formatThousand(MyUtility::getDictData($row->RID ,$CountPRNByLastUpdate)) }}</td>
        </tr>
      @endif
    @endforeach
    <tr>
      <td style="padding: 2px">&nbsp;</td>
      <td colspan="3" bgcolor="#F7F7F7" style="padding: 2px">
        <div id="div<%=RID%>0" style="overflow:auto; height:180px;">&nbsp;</div></td>
    </tr>
  @endif


</table>