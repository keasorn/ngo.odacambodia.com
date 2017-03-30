<?php
use App\Models\ngo\CommuneModel;

$dis = CommuneModel::where('District', $districtId )->orderBy("Commune")->get();

?>

<select class="fontNormal"
        id="cmbCommuneCode"
        name="cmbCommuneCode"
        size="1" style="width: 150px">


@foreach($dis as $d)
    <option value="{{$d->CommuneID}}">{{$d->Commune}}</option>
@endforeach

</select>