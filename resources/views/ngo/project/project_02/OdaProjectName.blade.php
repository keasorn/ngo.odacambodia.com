@if(count($QuestionnaireModel)>0)
    <select size="10" class="fontNormal" name="cmbNgoSourceName" id="cmbNgoSourceName" style="width:400px;"
            onclick="
	ById('OdaProjectName').value = this.value
	ById('LayerOdaProjectName').style.display = 'none'
">
        @foreach($QuestionnaireModel as $Questionnaire)
            <option value="{{$Questionnaire->OfficialTitle}}">{{$Questionnaire->OfficialTitle}}</option>
        @endforeach
    </select>
@endif