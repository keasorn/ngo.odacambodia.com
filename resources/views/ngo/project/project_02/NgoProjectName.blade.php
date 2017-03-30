@if(count($ds)>0)
    <select size="10" class="fontNormal" name="cmbNgoSourceName" id="cmbNgoSourceName" style="width:350px"
            onclick="
	ById('NgoProjectName').value = this.value
	ById('LayerNgoProjectName').style.display = 'none'
">
        @foreach($ds as $project)
            <option value="{{$project->PName_E}}">{{$project->PName_E}}</option>
        @endforeach
    </select>
@else
@endif
