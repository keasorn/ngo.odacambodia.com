function setSumFTC(aValue, bValue, cValue, resultControl){
	

	var a = jsSumRound(aValue,bValue,0)
	var result = jsSumRound(a, cValue, 0)
	if (result == 0) resultControl.value = ""
	else resultControl.value = jsFormatNumber(result,0)
	
}

function setSum(aValue, bValue, resultControl){
		
		var result = jsSumRound(aValue,bValue,0)

		if (result == 0) resultControl.value = ""
		else resultControl.value = jsFormatNumber(result,0)	


}

function refreshFTC(obj) {

		if (!checkDecimals(obj)) {
			obj.select()
			obj.focus()
			return;			
		}	



	var aValue = byId("Own2014FTC").value
	var bValue = byId("Other2014FTC").value
	var cValue = byId("Ngo2014FTC").value
	resultControl = byId("Total2014FTC")
	setSumFTC(aValue, bValue, cValue, resultControl)

	aValue = byId("Own2015FTC").value
	bValue = byId("Other2015FTC").value
	cValue = byId("Ngo2015FTC").value
	resultControl = byId("Total2015FTC")
	setSumFTC(aValue, bValue, cValue, resultControl)

	aValue = byId("Own2016FTC").value
	bValue = byId("Other2016FTC").value
	cValue = byId("Ngo2016FTC").value
	resultControl = byId("Total2016FTC")
	setSumFTC(aValue, bValue, cValue, resultControl)
}


function refreshITC(obj) {
	
	if (!checkDecimals(obj)) {
			obj.select()
			obj.focus()
			return;			
	}	

	var aValue = byId("Own2014ITC").value
	var bValue = byId("Other2014ITC").value
	var cValue = byId("Ngo2014ITC").value			
	resultControl = byId("Total2014ITC")
	setSumFTC(aValue, bValue, cValue, resultControl)

	aValue = byId("Own2015ITC").value
	bValue = byId("Other2015ITC").value
	cValue = byId("Ngo2015ITC").value			
	resultControl = byId("Total2015ITC")
	setSumFTC(aValue, bValue, cValue, resultControl)

	aValue = byId("Own2016ITC").value
	bValue = byId("Other2016ITC").value
	cValue = byId("Ngo2016ITC").value			
	resultControl = byId("Total2016ITC")
	setSumFTC(aValue, bValue, cValue, resultControl)

}

function refreshIPA(obj) {
	
	if (!checkDecimals(obj)) {
			obj.select()
			obj.focus()
			return;			
	}	

	var aValue = byId("Own2014IPA").value
	var bValue = byId("Other2014IPA").value
	var cValue = byId("Ngo2014IPA").value			
	resultControl = byId("Total2014IPA")
	setSumFTC(aValue, bValue, cValue, resultControl)

	aValue = byId("Own2015IPA").value
	bValue = byId("Other2015IPA").value
	cValue = byId("Ngo2015IPA").value			
	resultControl = byId("Total2015IPA")
	setSumFTC(aValue, bValue, cValue, resultControl)

	aValue = byId("Own2016IPA").value
	bValue = byId("Other2016IPA").value
	cValue = byId("Ngo2016IPA").value			
	resultControl = byId("Total2016IPA")
	setSumFTC(aValue, bValue, cValue, resultControl)

}

function refreshFOA(obj) {
	
	if (!checkDecimals(obj)) {
			obj.select()
			obj.focus()
			return;			
	}	

	var aValue = byId("Own2014FOA").value
	var bValue = byId("Other2014FOA").value
	var cValue = byId("Ngo2014FOA").value			
	resultControl = byId("Total2014FOA")
	setSumFTC(aValue, bValue, cValue, resultControl)

	aValue = byId("Own2015FOA").value
	bValue = byId("Other2015FOA").value
	cValue = byId("Ngo2015FOA").value			
	resultControl = byId("Total2015FOA")
	setSumFTC(aValue, bValue, cValue, resultControl)

	aValue = byId("Own2016FOA").value
	bValue = byId("Other2016FOA").value
	cValue = byId("Ngo2016FOA").value			
	resultControl = byId("Total2016FOA")
	setSumFTC(aValue, bValue, cValue, resultControl)

}

function refreshERA(obj) {
	
	if (!checkDecimals(obj)) {
			obj.select()
			obj.focus()
			return;			
	}	

	var aValue = byId("Own2014ERA").value
	var bValue = byId("Other2014ERA").value
	var cValue = byId("Ngo2014ERA").value			
	resultControl = byId("Total2014ERA")
	setSumFTC(aValue, bValue, cValue, resultControl)

	aValue = byId("Own2015ERA").value
	bValue = byId("Other2015ERA").value
	cValue = byId("Ngo2015ERA").value			
	resultControl = byId("Total2015ERA")
	setSumFTC(aValue, bValue, cValue, resultControl)

	aValue = byId("Own2016ERA").value
	bValue = byId("Other2016ERA").value
	cValue = byId("Ngo2016ERA").value			
	resultControl = byId("Total2016ERA")
	setSumFTC(aValue, bValue, cValue, resultControl)

}

function refreshNOT(obj) {
	
	if (!checkDecimals(obj)) {
			obj.select()
			obj.focus()
			return;			
	}	

	var aValue = byId("Own2014NOT").value
	var bValue = byId("Other2014NOT").value
	var cValue = byId("Ngo2014NOT").value			
	resultControl = byId("Total2014NOT")
	setSumFTC(aValue, bValue, cValue, resultControl)

	aValue = byId("Own2015NOT").value
	bValue = byId("Other2015NOT").value
	cValue = byId("Ngo2015NOT").value			
	resultControl = byId("Total2015NOT")
	setSumFTC(aValue, bValue, cValue, resultControl)

	aValue = byId("Own2016NOT").value
	bValue = byId("Other2016NOT").value
	cValue = byId("Ngo2016NOT").value			
	resultControl = byId("Total2016NOT")
	setSumFTC(aValue, bValue, cValue, resultControl)

}