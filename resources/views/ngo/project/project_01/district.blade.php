<?php
use App\Models\ngo\DistrictModel;

$districtData = DistrictModel::select("DistrictID", "District")->where("Province", $provinceID)->orderBy("District")->get();
?>

<select class="fontNormal" id="cmbDistrictLocation" name="cmbDistrictLocation" size="1" style="width: 98%"
        onchange="QueryCommune(this.value)">
    <option value="9090">-</option>
    <option value="9191">All</option>
    @foreach($districtData as $dis)
        <option value="{{$dis->DistrictID}}">{{$dis->District}}</option>
    @endforeach
</select>
