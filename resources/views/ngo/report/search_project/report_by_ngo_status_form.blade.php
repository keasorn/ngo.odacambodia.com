<?php
use App\Http\Controllers\MyUtility;
$NgoStatus = array(
        "1" => "Active",
        "3" => "Not Reported",
        "4" => "No Active",
        "2" => "Close"
);
?>
<table border="0" width="100%" class="fontNormal"
       cellpadding="2" style="border-collapse: collapse">
    <tr>
        <td width="100%" valign="top" height="55">
            <img border="0"
                 src="/images/number_of_project_by_ngostatus.jpg"
                 width="257" height="40"></td>
    </tr>
    <tr>
        <td>
            <table border="1" width="100%" id="table7"
                   cellpadding="2"
                   style="border-collapse: collapse"
                   bordercolor="#0066FF" class="fontNormal">
                <tr bgcolor="#BDD6F7">
                    <td align="center" width="5%"
                        style="padding: 2px">
                        <font color="#0066FF">
                            <b>No</b></font></td>
                    <td align="center" width="386"
                        style="padding: 2px">
                        <font color="#0066FF">
                            <b>NGO
                                Status</b></font></td>
                    <td align="center" width="20%"
                        style="padding: 2px">
                        <font color="#0066FF">
                            <b>
                                Number
                                of NGOs</b></font></td>
                    <td align="center" width="21%"
                        style="padding: 2px">
                        <font color="#0066FF">
                            <b>
                                Number
                                Of
                                Projects</b></font></td>
                </tr>
                <?php
                $id = 0;
                ?>
                @foreach($NgoStatus as $key=>$value)

                    @if($id%2==1)
                        <tr bgcolor="#E2E0FE">
                    @else
                        <tr>
                            @endif
                            <td align="center" width="5%"
                                style="padding: 2px">
                                <font color="#0000FF">
                                    <b>
                                        {{++$id}} .</b></font></td>
                            <td width="386"
                                style="padding: 2px">
                                <b>
                                    <a href="/ngo/report/report_core?NgoStatusId={{$key}}">{{$value}}</a></b>
                            </td>
                            <td width="17%"
                                style="padding:2px; "
                                align="right">
															<span id="printRegion">
																		<b>
                                                                            <font color="#000080">
                                                                           <?php
                                                                            $count= MyUtility::getDictData($key,$dictRIDByStatus);
                                                                           echo MyUtility::n2z(MyUtility::formatThousand($count));
                                                                            ?></font></b></span>&nbsp;
                            </td>
                            <td width="21%"
                                style="padding:2px; "
                                align="right">
                                <b>
                                    <font color="#000080"><span
                                                id="printRegion">
																		 <?php
                                                                            $count= MyUtility::getDictData($key,$dictPRNByStatus);
                                                                           echo MyUtility::n2z(MyUtility::formatThousand($count));
                                                                            ?></span></font></b>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td align="center" colspan="2"
                                bgcolor="#BDD6F7"
                                style="padding: 2px">
                                <font color="#0066FF">
                                    <b>
                                        TOTAL:</b></font>
                            </td>
                            <td width="17%"
                                bgcolor="#BDD6F7"
                                style="padding:2px; "
                                align="right">
                                <font color="#000080">
                                    <b>
																		<span id="printRegion">
																		{{MyUtility::n2z(MyUtility::formatThousand($totalAllRID))}}</span></b></font>
                            </td>
                            <td width="21%"
                                bgcolor="#BDD6F7"
                                style="padding:2px; "
                                align="right">
                                <font color="#000080">
                                    <b><span id="printRegion">{{MyUtility::n2z(MyUtility::formatThousand($totalAllPRN))}}</span></b></font>
                            </td>
                        </tr>
            </table>
        </td>
    </tr>
</table>