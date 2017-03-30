<?php
use App\Models\ngo\CommuneModel;

$communeData = CommuneModel::select("CommuneID", "Commune")->where("District", $districtId)->orderBy("Commune")->get();
?>


<select class="fontNormal" id="cmbCommuneLocation" name="cmbCommuneLocation" size="1" style="width: 98%"
        onchange="QueryVillage(this.value)">

    <option value="909090"> -</option>
    <option value="919191">All</option>
    @foreach($communeData as $com)
        <option value="{{$com->CommuneID}}">{{$com->Commune}}</option>
    @endforeach
</select>
