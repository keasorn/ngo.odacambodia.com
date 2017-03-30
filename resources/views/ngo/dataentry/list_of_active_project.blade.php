@extends('ngo.layout.with_menu')
<?php
use App\Models\ngo\CoreDetailModel;
$list_core = CoreDetailModel::select("RID")->addSelect("Acronym")->orderBy("Acronym")->get();
$topMenuId="coreDetail";
?>
@section('content')

    <form id="myform" name="myform" method="POST">
    <div align="center">
		<table border="0" width="99%" cellpadding="2">
			<tr>
				<td>
				<p align="right">Quick Jump:
        <select style="visibility:visible;" id="cmbAcronymTop" name="cmbAcronymTop"
                class="fontNormal"
                size="1" onchange="QuickJumpChange(this.value)">
            @foreach($list_core as $core)
                <option value="{{$core->RID}}">{{$core->Acronym}}</option>
            @endforeach
        </select></td>
			</tr>
		</table>
</div>
    <div id="list_active_project">
        @include("ngo.dataentry.active_project")
    </div>


    {!! csrf_field() !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    </form>
    <script type="text/javascript">
        function QuickJumpChange(val){
            var data="?RID="+val;
            Ajax_UpdatePanel("/dataentry/list_active_project", data, "list_active_project", false);

        }
        function coreInit(){
            $("#cmbAcronymTop").val('{{$RID}}');
        }
        coreInit();
    </script>

@endsection