<?php
use App\Models\ngo\CoreDetailModel;

$coreDetailList = CoreDetailModel::select('Acronym', 'Org_Name_E')->orderBy('Acronym')->get()

?>

<select size="10" class="fontNormal" name="cmbImplementingNgo" id="cmbImplementingNgo" style="width:450px;"
        onclick="
        ById('implementingNgoLayer').style.display = 'none'
     //   ById('LayerNgoReceipientProjectName').style.display = 'none'
      ById('ReceipientNgoProjectName').value = ''
        ById('Receipient').value=this.value

     //   $('#btnMoreReceipientNgoProjectName').click()
	//QueryNgoReceipientProjectName(this.value)"

>
    @foreach($coreDetailList as $org)
        <option value="{{$org->Acronym}}"> {{$org->Acronym}} - {{$org->Org_Name_E}}</option>
    @endforeach
</select>

