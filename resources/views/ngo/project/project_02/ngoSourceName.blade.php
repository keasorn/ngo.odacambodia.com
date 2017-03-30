<?php
use App\Models\ngo\CoreDetailModel;
$coreDetailList = CoreDetailModel::select('RID', 'Acronym', 'Org_Name_E')->orderBy('Acronym')->get();
?>


<select size="10" class="fontNormal" name="cmbNgoSourceName" id="cmbNgoSourceName" style="width:450px;"
        onclick="
        ById('ngoSourceNameLayer').style.display = 'none'
        ById('LayerNgoProjectName').style.display = ''
      ById('NgoProjectName').value = ''
        ById('NgoSourceName').value=this.value
//	QueryNgoProjectName(this.value)"

>
    @foreach($coreDetailList as $org)
        <option value="{{$org->Acronym}}"> {{$org->Acronym}} - {{$org->Org_Name_E}}</option>
    @endforeach
</select>

