@include("ngo.layout.no-cache")
<?php

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Bootstrap\Bootstrap;
use App\Http\Controllers\MyUtility;
        use App\Http\Controllers\ngo\OwnReportController;
set_time_limit(60);
ini_set('memory_limit', '-1');


$ownReport = new OwnReportController();
$disbursementDict = $ownReport::getDisbursementDictionary();
if ($toExcel == true) {
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=query_own_report.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
}
?>
        <!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>COUNCIL FOR THE DEVELOPMENT OF CAMBODIA (CDC)</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @if($toExcel==false)
        <?php echo (new Bootstrap())->inludeCSS() ?>
        <?php echo (new Bootstrap())->inludeJS() ?>
    @endif
</head>
<body style="background-color: #FFFFFF;">
<div align="center">
    <form action="/own_report/detail" method="post" target="_blank" name="myform" id="myform">
        <table border="0" width="100%" cellpadding="4" style="border-collapse: collapse">
            @if ($toExcel == false)
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <tr>

                    <td align="left" colspan="2">
                        <input type="text" name="reportTitle" id="reportTitle" value="Report Title"
                               style="font-size:30px;text-align:center;color:red; border:none;width:100%;"></td>


                </tr>
                <tr>

                    <td align="left">
                        <p><input type="button" class="fontNormal" value="Detail" onclick="detail()"> <a
                                    href="/ngo/own_report/ngo_query_result?toExcel=true&page=0">
                                <img src="/images/excel.png"> To Excel </a>|<a
                                    href="/ngo/own_report/ngo_query_result?page=0">Show All</a>
                            | <a href="/ngo/own_report/ngo_query_result?page=1">Page</a></td>


                    <td align="right" class="fontSmall">
                        @if ($page > 0) {{$dsOwnReportMain->render()}} @endif
                    </td>
                </tr>
            @endif
            <tr>
                <td colspan="2" style="padding: 4px">
                    <table id="=tbl" border="1" cellpadding="2" bordercolor="#CCCCCC"
                           class="fontNormal" style="border-collapse:collapse" class="fontNormal" width="100%">
                        <tr align="center">
                            <td width="4%" height="25" bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                <b>No</b></td>
                            @foreach($columns as $column)
                                @if($column =="Acronym")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                        <b>NGO Name(Acronym)</b></td>
                                @elseif($column =="PName_E")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal" align="left">
                                        <b>Project Name</b></td>
                                @elseif($column =="PDateStart")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                        <b>Start Date</b></td>
                                @elseif($column =="PDateFinish")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                        <b>Completion Date</b></td>
                                @elseif($column =="ProjectStatusName")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                        <b>Project Status</b></td>
                                @elseif($column =="ProjectDateQCompleted")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                        <b>Date Project's
                                            <br>Questionaire Completed</b></td>
                                @elseif($column =="idpNumber")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                        <b>IDP Project Number</b></td>
                                @elseif($column =="Contact_Name_E")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                        <b>Contact Name</b></td>
                                @elseif($column =="Contact_Title_E")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                        <b>Contact Title</b></td>
                                @elseif($column =="Tel_No")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                        <b>Phone</b></td>
                                @elseif($column =="Fax_No")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                        <b>Fax</b></td>
                                @elseif($column =="eMail")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                        <b>Email</b></td>
                                @elseif($column =="Address_1_E")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                        <b>Address</b></td>
                                @elseif($column =="NgoDateQCompleted")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                        <b>Date NGO's Questionaire Completed</b></td>
                                @elseif($column =="DateCommenced")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                        <b>NGO's Date Commenced</b></td>
                                @elseif($column =="Min_Name_E")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                        <b>Cooperation Agreement With Ministry</b></td>
                                @elseif($column =="Province")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                        <b>Province</b></td>
                                @elseif($column =="Acronym")
                                    <td bgcolor="#ECE9D8" style="padding: 2px" class="fontNormal">
                                        <b>Sector/Sub Sector</b></td>
                                @elseif($column =="Acronym")
                                                                  
                                @elseif($column =="Own2014")
                                	<td  bgcolor="#ECE9D8"><b>Own Resources 2014</b></td>  
        	  	                @elseif($column =="Other2014")
        	  						<td  bgcolor="#ECE9D8"><b>Multilateral/Bilateral 2014</b></td> 
        	  	                @elseif($column =="Ngo2014")                                 
        	 					  	<td  bgcolor="#ECE9D8"><b>NGO 2014</b></td>  
        	 					@elseif($column =="Total2014")                 	            	           
          							<td  bgcolor="#ECE9D8"><b>Total 2014</b></td>
          							
                                @elseif($column =="Own2015")
                                	<td  bgcolor="#ECE9D8"><b>Own Resources 2015</b></td>  
        	  	                @elseif($column =="Other2015")
        	  						<td  bgcolor="#ECE9D8"><b>Multilateral/Bilateral 2015</b></td> 
        	  	                @elseif($column =="Ngo2015")                                 
        	 					  	<td  bgcolor="#ECE9D8"><b>NGO 2015</b></td>  
        	 					@elseif($column =="Total2015")                 	            	           
          							<td  bgcolor="#ECE9D8"><b>Total 2015</b></td>
          							
                                @elseif($column =="Own2016")
                                	<td  bgcolor="#ECE9D8"><b>Own Resources 2016</b></td>  
        	  	                @elseif($column =="Other2016")
        	  						<td  bgcolor="#ECE9D8"><b>Multilateral/Bilateral 2016</b></td> 
        	  	                @elseif($column =="Ngo2016")                                 
        	 					  	<td  bgcolor="#ECE9D8"><b>NGO 2016</b></td>  
        	 					@elseif($column =="Total2016")                 	            	           
          							<td  bgcolor="#ECE9D8"><b>Total 2016</b></td>
          						@elseif($column =="Plan2017")
          						<td  bgcolor="#ECE9D8"><b>Plan Total 2017</b></td>
          						          						@elseif($column =="Plan2018")
              	<td  bgcolor="#ECE9D8"><b>Plan Total 2018</b></td>                           
              	          						@elseif($column =="Plan2019") 	
            <td  bgcolor="#ECE9D8"><b>Plan Total 2019</b></td>  
 
                                @endif
                            @endforeach
                               	      
   
                        </tr>
                        <?php
                        if ($page > 0) {
                            $trNum = $dsOwnReportMain->perPage() * $dsOwnReportMain->currentPage() - $dsOwnReportMain->perPage();
                        } else {
                            $trNum = 0;
                        }
                        ?>
                        @if(count($dsOwnReportMain)>0)
                            @foreach($dsOwnReportMain as $ownReportMain)
                                <?php
                                $PRN=$ownReportMain->PRN;
                                $disbRow = MyUtility::getDictData($PRN, $disbursementDict);
                                ?>
                                @if ($trNum % 2 == 1)
                                    <tr style="background-color: #FFFFCC">
                                @else
                                    <tr>
                                        @endif
                                        <td width="4%" height="25" style="padding: 2px" class="fontNormal"
                                            align="center">
                                            {{++$trNum}}.
                                        </td>
                                        @foreach($columns as $column)
                                            @if($column =="Acronym")
                                                <td style="padding: 2px" class="fontNormal" align="center">
                                                    {{$ownReportMain->Acronym}}</td>
                                            @elseif($column =="PName_E")
                                                <td style="padding: 2px" class="fontNormal" align="left">
                                                    {{$ownReportMain->PName_E}}</td>
                                            @elseif($column =="PDateStart")
                                                <td style="padding: 2px" class="fontNormal" align="center">
                                                    {{MyUtility::formatKhDate($ownReportMain->PDateStart)}}</td>
                                            @elseif($column =="PDateFinish")
                                                <td style="padding: 2px" class="fontNormal" align="center">
                                                    {{MyUtility::formatKhDate($ownReportMain->PDateFinish)}}</td>
                                            @elseif($column =="ProjectStatusName")
                                                <td style="padding: 2px" class="fontNormal" align="center">
                                                    {{MyUtility::getProjectStatusName($ownReportMain->ProjectStatusName)}}</td>
                                            @elseif($column =="ProjectDateQCompleted")
                                                <td style="padding: 2px" class="fontNormal">
                                                    {{MyUtility::formatKhDate($ownReportMain->ProjectDateQCompleted)}}</td>
                                            @elseif($column =="idpNumber")
                                                <td style="padding: 2px" class="fontNormal">
                                                    {{$ownReportMain->idpNumber}}</td>
                                            @elseif($column =="Contact_Name_E")
                                                <td style="padding: 2px" class="fontNormal">
                                                    {{$ownReportMain->Contact_Name_E}}</td>
                                            @elseif($column =="Contact_Title_E")
                                                <td style="padding: 2px" class="fontNormal">
                                                    {{$ownReportMain->Contact_Title_E}}</td>
                                            @elseif($column =="Tel_No")
                                                <td style="padding: 2px" class="fontNormal">
                                                    <b>&nbsp;</b>{{$ownReportMain->Tel_No}}</td>
                                            @elseif($column =="Fax_No")
                                                <td style="padding: 2px" class="fontNormal">
                                                    {{$ownReportMain->Fax_No}}</td>
                                            @elseif($column =="eMail")
                                                <td style="padding: 2px" class="fontNormal">
                                                    {{$ownReportMain->eMail}}</td>
                                            @elseif($column =="Address_1_E")
                                                <td style="padding: 2px" class="fontNormal">
                                                    {{$ownReportMain->Address_1_E}}</td>
                                            @elseif($column =="NgoDateQCompleted")
                                                <td style="padding: 2px" class="fontNormal" align="center">
                                                    {{MyUtility::formatKhDate($ownReportMain->NgoDateQCompleted)}}</td>
                                            @elseif($column =="DateCommenced")
                                                <td style="padding: 2px" class="fontNormal" align="center">
                                                    {{MyUtility::formatKhDate($ownReportMain->DateCommenced)}}</td>
                                            @elseif($column =="Min_Name_E")
                                                <td style="padding: 2px" class="fontNormal">
                                                    {{$ownReportMain->Min_Name_E}}</td>
                                            @elseif($column =="Province")
                                                <td style="padding: 2px" class="fontNormal">
                                                    {{$ownReportMain->Province}}</td>
                                            @elseif($column =="Acronym")
                                                <td style="padding: 2px" class="fontNormal">
                                                    <b>Sector/Sub Sector</b></td>
                                            @elseif($column =="Acronym")
                                                @elseif($column =="Own2014")
                                	<td align="right" style="padding: 2px">  <?php
                                	if($disbRow !=null){
                                        $own2014 = $disbRow->own2014;
                                        echo MyUtility::formatThousand($own2014);
                                        }
                                    ?></td>  
        	  	                @elseif($column =="Other2014")
        	  						<td align="right" style="padding: 2px"> <?php
                                	if($disbRow !=null){
                                        $other2014 = $disbRow->other2014;
                                        echo MyUtility::formatThousand($other2014);
                                        }?></td>
        	  	                @elseif($column =="Ngo2014")                                 
        	 					  	<td align="right" style="padding: 2px"><?php
                                	if($disbRow !=null){
                                        $ngo2014 = $disbRow->ngo2014;
                                        echo MyUtility::formatThousand($ngo2014);
                                        }?></td>  
        	 					@elseif($column =="Total2014")                 	            	           
          							<td align="right" style="padding: 2px"><?php
                                	if($disbRow !=null){
                                        $total2014 = $disbRow->total2014;
                                        echo MyUtility::formatThousand($total2014);
                                        }?></td>
 											 @elseif($column =="Own2015")
                                	<td align="right" style="padding: 2px">  <?php
                                	if($disbRow !=null){
                                        $own2015 = $disbRow->own2015;
                                        echo MyUtility::formatThousand($own2015);
                                        }
                                    ?></td>  
        	  	                @elseif($column =="Other2015")
        	  						<td align="right" style="padding: 2px"> <?php
                                	if($disbRow !=null){
                                        $other2015 = $disbRow->other2015;
                                        echo MyUtility::formatThousand($other2015);
                                        }?></td>
        	  	                @elseif($column =="Ngo2015")                                 
        	 					  	<td align="right" style="padding: 2px"><?php
                                	if($disbRow !=null){
                                        $ngo2015 = $disbRow->ngo2015;
                                        echo MyUtility::formatThousand($ngo2015);
                                        }?></td>  
        	 					@elseif($column =="Total2015")                 	            	           
          							<td align="right" style="padding: 2px"><?php
                                	if($disbRow !=null){
                                        $total2015 = $disbRow->total2015;
                                        echo MyUtility::formatThousand($total2015);
                                        }?></td>
  											 @elseif($column =="Own2016")
                                	<td align="right" style="padding: 2px">  <?php
                                	if($disbRow !=null){
                                        $own2016 = $disbRow->own2016;
                                        echo MyUtility::formatThousand($own2016);
                                        }
                                    ?></td>  
        	  	                @elseif($column =="Other2016")
        	  						<td align="right" style="padding: 2px"> <?php
                                	if($disbRow !=null){
                                        $other2016 = $disbRow->other2016;
                                        echo MyUtility::formatThousand($other2016);
                                        }?></td>
        	  	                @elseif($column =="Ngo2016")                                 
        	 					  	<td align="right" style="padding: 2px"><?php
                                	if($disbRow !=null){
                                        $ngo2016 = $disbRow->ngo2016;
                                        echo MyUtility::formatThousand($ngo2016);
                                        }?></td>  
        	 					@elseif($column =="Total2016")                 	            	           
          							<td align="right" style="padding: 2px"><?php
                                	if($disbRow !=null){
                                        $total2016 = $disbRow->total2016;
                                        echo MyUtility::formatThousand($total2016);
                                        }?></td>

        	 					@elseif($column =="Plan2017")                 	            	           
          							<td align="right" style="padding: 2px"><?php
                                	if($disbRow !=null){
                                        $plan2017 = $disbRow->plan2017 ;
                                        echo MyUtility::formatThousand($plan2017);
                                        }?></td> 
        	 					@elseif($column =="Plan2018")                 	            	           
          							<td align="right" style="padding: 2px">
          							<?php
                                	if($disbRow !=null){
                                        $plan2018 = $disbRow->plan2018 ;
                                        echo MyUtility::formatThousand($plan2018);
                                        }?>
          							</td> 
        	 					@elseif($column =="Plan2019")                 	            	           
          							<td align="right" style="padding: 2px"><?php
                                	if($disbRow !=null){
                                        $plan2019 = $disbRow->plan2019 ;
                                        echo MyUtility::formatThousand($plan2019);
                                        }?></td>
          						@endif  
                                 @endforeach     
                                         
                                    </tr>
                                    @endforeach
                                    @else
                                    @endif
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding: 4px">
                    <input type="button" class="fontNormal" value="Detail" onclick="detail()"></td>
            </tr>
        </table>
    </form>

</div>

</body>

<script type="text/javascript">

    function detail() {
        ById("myform").submit();
    }

</script>
</html>