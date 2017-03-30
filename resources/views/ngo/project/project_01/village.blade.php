<?php
use App\Models\ngo\VillageModel;

$VillageData = VillageModel::select("VillageID", "Village")->where("Commune", $communeId)->orderBy("Village")->get();

?>
<select class="fontNormal" id="cmbVillageLocation" name="cmbVillageLocation" size="1" style="width: 98%">

    <option value="90909090"> -</option>
    <option value="91919191">All</option>
    @foreach($VillageData as $vil)
        <option value="{{$vil->VillageID}}">{{$vil->Village}}</option>
    @endforeach
</select>