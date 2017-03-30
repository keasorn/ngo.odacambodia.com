<?php
use App\Models\oda\odaadmin\MinistryModel;
use App\Models\ngo\CoreDetailModel;

$model = "";
switch ($CounterType) {
    case 1:
        $model = MinistryModel::select('Min_Name_E as counterpart')->get();
        break;
    case 3:
        $model = MinistryModel::select('Min_Name_E') -> get();
        break;
    case 2:
        $model = MinistryModel::select('Min_Name_E') -> get();
        break;
    case 5:
        $model = CoreDetailModel::select('Org_Name_E as counterpart')->where('TypeCode',1)->orderBy('Org_Name_E')-> get();
        break;
    case 5:
        $model = CoreDetailModel::select('Org_Name_E as counterpart')->where('TypeCode',1)->orderBy('Org_Name_E')-> get();
        break;
    case 6:
        $model = CoreDetailModel::select('Org_Name_E as counterpart')->where('TypeCode',2)->orderBy('Org_Name_E')-> get();
        break;
    default:
        break;
}
//$model=DB::table("temp_foo")->select('Min_Name_E')->get();
//$productList = DB::insert( DB::raw( "CREATE TEMPORARY TABLE tempproducts" ." as " .$model) );
//$model=DB::table("tempproducts")->get();
?>


<table border="0" width="100%" id="table1" style="border-collapse: collapse">
    <tr>
        <td>
            <select size="10" class="fontNormal" name="LayerCounterName" id="LayerCounterName" style="width:400; height:166"
                    onchange="
	ById('CounterName').value = this.value
	ById('LayerCounterName').style.display = 'none'">
                @foreach($model as $mn)
                    <option value="{{$mn->counterpart}}">{{$mn->counterpart}}</option>
                @endforeach
            </select></td>
    </tr>
</table>