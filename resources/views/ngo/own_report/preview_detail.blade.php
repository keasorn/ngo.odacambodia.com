@extends('ngo.layout.report')
<?php
$PRNs = Session::get("PRNs");

?>
@section('content') 
    <div align="center">
    <h4><font color="#0000FF">Project Summary Report</font></h4>
    
        <a href="#none" onclick="first()">First</a> | <a href="#none" onclick="previous()">Previous</a>
        <select id="PRN1" onchange="paging()">
            <?php
            $i = 1;
            ?>
            @foreach($PRNs as $PRN)
                <option value="{{$PRN}}" title="{{$PRN}}">{{$i++}} of {{count($PRNs)}}</option>
            @endforeach
        </select> <a href="#none" onclick="next()">Next</a> | <a href="#none" onclick="last()">Last</a>

        <table border="0" width="770" cellpadding="2">
			<tr>
				<td id="divProject" align="center"></td>
			</tr>
		</table>

        <p></p>
        <a href="#none" onclick="first()">First</a> | <a href="#none" onclick="previous()">Previous</a>
        <select id="PRN2" onchange="paging()">
            <?php
            $i = 1;
            ?>
            @foreach($PRNs as $PRN)
                <option value="{{$PRN}}">{{$i++}} of {{count($PRNs)}}</option>
            @endforeach
        </select> <a href="#none" onclick="next()">Next</a> | <a href="#none" onclick="last()">Last</a>

        <p><br></p>

    </div>

    <script type="text/javascript">

        function paging() {
            var data = "?PRN=" + encodeURIComponent(ById("PRN1").value)
            Ajax_UpdatePanel("/report/preview_project", data, "divProject", true)
        }

        var n = $('#PRN1 option').size();

        function first() {
            ById("PRN1").selectedIndex = 0;
            ById("PRN2").selectedIndex = 0;
            paging()
        }

        function previous() {
            var index = ById('PRN1').selectedIndex
            var index = ById('PRN2').selectedIndex

            if (index > 0) {
                index--;


                ById("PRN1").selectedIndex = index;
                ById("PRN2").selectedIndex = index;
                paging()
            }
        }

        function next() {
            var index = ById('PRN1').selectedIndex
            var index = ById('PRN2').selectedIndex

            if (index < n - 1) {
                index++;


                ById("PRN1").selectedIndex = index;
                ById("PRN2").selectedIndex = index;
                paging()
            }
        }

        function last() {
            ById("PRN1").selectedIndex = n - 1;
            ById("PRN2").selectedIndex = n - 1;
            paging()
        }

        function initDetail() {
            paging(ById("PRN1").value)
        }
        initDetail()

    </script>
@endsection
