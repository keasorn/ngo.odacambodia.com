<?php
$sub_sector=DB::table("aid sub-sector")->select("SubSectorCode","SubSectorName_E")->where("SectorCode",$sectorCode)->get();
?>



<select size="1" class="fontNormal" name="cmbSubSector" id="cmbSubSector" style="width: 98%">
    <option selected=""></option>
@foreach($sub_sector as $sub)
    <option value="{{$sub->SubSectorCode}}">{{$sub->SubSectorName_E}}</option>
 @endforeach

</select>