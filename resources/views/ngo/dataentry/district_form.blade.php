<?php
use App\Models\ngo\DistrictModel;

$dis = DistrictModel::where('Province', $provinceId )->orderBy("District")->get();

?>

<select class="fontNormal"
        id="cmbDistrictCode"
        name="cmbDistrictCode"
        size="1" style="width: 150px" onchange="refreshCommune(this.value)">


@foreach($dis as $d)
    <option value="{{$d->DistrictID}}">{{$d->District}}</option>
@endforeach

</select>