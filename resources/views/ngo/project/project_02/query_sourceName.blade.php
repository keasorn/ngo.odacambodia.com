<?php
use App\Models\oda\odaadmin\OrganizationModel;
$orgModel = OrganizationModel::select('Acronym', 'Ag_ID')->where("Ag_ID","<>",85)->where('MajorDonor',$SourceType)->orderBy("Acronym")->get();
?>

<select size="1" class="fontNormal" name="SourceName" id="SourceName" style="width: 98%" onchange="QueryOdaProject(this.value);
        $('#OdaProjectName').val('')">
        @foreach($orgModel as $org)
            <option value="{{$org->Ag_ID}}">{{$org->Acronym}}</option>
        @endforeach
</select>
