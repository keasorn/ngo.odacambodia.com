<?php
use App\Http\Controllers\MyUtility;

if (!isset($topMenuId)) {
    $topMenuId = "";
}
?>
<table border="0" width="99%">
    <tr>
        <td>
            <p align="right">
                <b>Welcome to <font color="#0000FF">{{Session::get('ngouser')->uid}}</font> /

                    <a href="/logout"><font color="#008000">
                            Exit</font></a>
                </b></td>
    </tr>
    <tr>
        <td>

            <table style="border-collapse: collapse" class="fontBig" width="100%" cellpadding="0"
                   bordercolor="#3366FF" border="1">
                <tbody>
                <tr>
                    <th bgcolor="#FFFFCC" height="22"
                        class="{!! MyUtility::selectTopMenu("coreDetail",$topMenuId) !!} center">

                        <a href="/dataentry/core_detail">
							<span style="letter-spacing: normal; background-position: 0% 0%">
							<font color="#0000FF">
							<span style="font-family: Verdana, Tahoma; font-size: 12px; text-decoration: none">
							C</span></font></span></a><a
                                style="box-sizing: border-box; color: blue !important; text-decoration: none; background-size: initial !important; background-origin: initial !important; background-clip: initial !important; font-family: Verdana, Tahoma; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: bold; letter-spacing: normal; orphans: 2; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background:"
                                href="/dataentry/core_detail"><font color="#0000FF" style="box-sizing: border-box;">ore
                                Details</font></a><img src="/images/tick.png"></th>
                    <th bgcolor="#FFFFCC" height="22"
                        class="{!! MyUtility::selectTopMenu("report",$topMenuId) !!} center">
                        <a href="/ngo/report/report_core">
                            <font color="#0000FF">Reports</font><img src="/images/tick.png">
                        </a>
                    </th>

                    <th bgcolor="#FFFFCC" height="22"
                        class="{!! MyUtility::selectTopMenu("listOfNgo",$topMenuId) !!} center">
                        <a href="/list/list_of_ngo">
                            <font color="#0000FF"><b>List Of NGOs</b></font></a><img src="/images/tick.png">
                    </th>

                    <th bgcolor="#ffffcc" height="22"
                        class="{!! MyUtility::selectTopMenu("listOfProject",$topMenuId) !!} center">
                        <a href="/list/list_of_project">
                            <font>List Of Projects</font>
                        </a><img src="/images/tick.png">
                    </th>


                    <th bgcolor="#FFFFCC" height="22"
                        class="{!! MyUtility::selectTopMenu("summary",$topMenuId) !!} center">
                        <a href="/summary">
                            <font color="#0000FF">Summary</font>
                        </a>
                    </th>

                    <th bgcolor="#FFFFCC" height="22"
                        class="{!! MyUtility::selectTopMenu("document",$topMenuId) !!} center">
                        <a href="/documents" title="Documents">
                            <font color="#0000FF">Document</font>
                        </a>
                    </th>
                    <th bgcolor="#FFFFCC" height="22"
                        class="{!! MyUtility::selectTopMenu("user_guide",$topMenuId) !!} center">
                        <a href="/user_guide" title="User Guide">
                            <font color="#0000FF">User Guide</font>
                        </a>
                    </th>

                    <th bgcolor="#FFFFCC" height="22" class="@yield('about_us') center">
                        <a href="javascript:popup('/ngo/aboutus/aboutus','400','200')">
                            <font color="#0000FF">About Us</font></a></th>

                    @if(session('ngouser')->uid!="Visitor")
                        <th bgcolor="#FFFFCC" height="22"
                            class="{!! MyUtility::selectTopMenu("utilities",$topMenuId) !!} center">
                            <a href="/utilities">
                                <font color="#0000FF">Utilities</font>
                            </a>
                        </th>
                    @endif

                </tr>
                </tbody>
            </table>

            @if(session('ngouser')->uid!="Visitor")
                <table style="border-collapse: collapse; border-top-width:0px" id="table5" width="100%"
                       cellpadding="0" bordercolor="#3366FF" border="1">
                    <tbody>
                    <tr class="fontSmall">
                    <th align="left" bgcolor="#FFD9FF" height="20" style="border-top-style: none; border-top-width: medium"> 
		@if(session('ngouser')->IsAdmin==1)
			<img border="0" src="/images/emoticon-1.png" width="16" height="16" align="absmiddle"> <a href="/dataentry/core_detail?isNewNGO=true">New NGO</a>&nbsp;&nbsp;&nbsp;
		@endif
                            <img src="/images/info.png" width="16" border="0" align="absmiddle" height="16"> <a
                                    href="/ngo/project/project_01/project_main?isNewProject=true">New
                                Project</a></th>

                    </tr>

                    </tbody>
                </table>
            @endif
        </td>
    </tr>
</table>
 