var xmlHttp
var pubControlID
var hiddenid
var result=""
var browser
var progressId
function showResult(url, val, id){ 
	pubControlID=id
		
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request")
		return
	} 

	url=url + val
	
	xmlHttp.onreadystatechange=stateChanged
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
	


}

function showResultAsync(url, val, id, hideid){ 
	pubControlID=id
	hiddenid=hideid
	
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request")
		return
	} 

	if (pubControlID!=''){							
		document.getElementById(pubControlID).innerHTML ="<center><br><img src='../images/small_loading.gif' align='absbottom'> Loading . . .	<br></center>";					
	}

	url=url + val
	var sync
	sync = true
	xmlHttp.onreadystatechange=stateChangedAsync
	xmlHttp.open("GET",url,sync)
	xmlHttp.send(null)
	
	

}
function showResultSync(url, val, id, hideid){ 
	pubControlID=id
	hiddenid=hideid
	
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request")
		return
	} 

	url=url + val
	var sync
	sync = false
	xmlHttp.onreadystatechange=stateChangedSync(sync)
	xmlHttp.open("GET",url,sync)
	xmlHttp.send(null)
	
	

}

function showResultWithProgress(url, val, id, progressid){ 
	pubControlID=id
	progressId=progressid
	
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request")
		return
	} 

	url=url + val
	var sync
	sync = true
	
	var yPost = window.event.clientY +  document.body.scrollTop
	setVisibleLoading(progressId, 'visible', yPost)

	xmlHttp.onreadystatechange=stateChangedWithProgress
	xmlHttp.open("GET",url,sync)

	xmlHttp.send(null)
}



function setVisibleLoading(progressid, v, YPost){
	var loading = document.getElementById(progressid)
	
	if (YPost == '') YPost = 0
	loading.style.top = YPost + "px"

	loading.style.left = ((window.screen.width/2)-(parseInt(loading.style.width)/2)) + "px"
	
	loading.style.visibility = v
}

function GetXmlHttpObject(){ 

	try { 
		browser = "Other";
		return new ActiveXObject("Msxml2.XMLHTTP"); } catch (e) {}
    try { 
    	browser = "IE"
    	return new ActiveXObject("Microsoft.XMLHTTP"); } catch (e) {}
    try { 
    	browser = "FF"
    	return new XMLHttpRequest(); } catch(e) {}
    alert("XMLHttpRequest not supported");
    return null;

} // End GetXmlHttpObject()

function stateChanged(){ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
			
				if (pubControlID!=''){
					document.getElementById(pubControlID).innerHTML=xmlHttp.responseText; 						
					
				}
	} 
}  
function stateChangedAsync(){ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
			
				if (pubControlID!=''){
					document.getElementById(pubControlID).innerHTML=xmlHttp.responseText
					
				}
			
				if (hiddenid!=''){
					document.getElementById(hiddenid).value=xmlHttp.responseText
				}		
	} 
	
}

function stateChangedSync(Sync){ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
			
				if (pubControlID!=''){
					if (Sync == false) { 
						document.getElementById(pubControlID).innerHTML=xmlHttp.responseText; 						
					} 					
				}
			
				if (hiddenid!=''){
					document.getElementById(hiddenid).value=xmlHttp.responseText; 								
				}
			
	} 
	else {
			if (pubControlID!=''){

						document.getElementById(pubControlID).innerHTML ="<br><img src=../images/loading.gif><br>";					

				}

	}
}


function stateChangedWithProgress(){ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
			
				if (pubControlID!=''){
					document.getElementById(pubControlID).innerHTML=xmlHttp.responseText; 
					setVisibleLoading(progressId, 'hidden','')
				}
	} 
	
}
  
function getResult(url, val){ 
	 
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request")
		return false
	} 

	sync = false
	xmlHttp.onreadystatechange=statusGetResult
	result=""
	url += val
	xmlHttp.open("GET",url,sync) // false = synchronously
	xmlHttp.send(null)
		
	if (sync == false) {
		result = xmlHttp.responseText
	}
	return result;
}

function statusGetResult(){ 
		var ready = xmlHttp.readyState;
		
		if ((ready==4) || (ready=="complete")){ 
			result = xmlHttp.responseText			 		
		} 	
		
}  



function UpdateSmallPanel(url, val, id, loading){ 
	var doc = document.getElementById(id)
	if (doc == null){
		alert("UpdateSubPanel - Error: "+ id + " is not found in document!")
		return
	}

	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request")
		return
	} 

	url=url + val
	var sync
	sync = true
	xmlHttp.onreadystatechange= function(){
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
					document.getElementById(id).innerHTML=xmlHttp.responseText;				
				
			}
			else {
				if (loading) {
					document.getElementById(id).innerHTML ="<img src='../images/small_loading.gif' align='absbottom'> Loading...";					
				}
			}
		
		
	};
	xmlHttp.open("GET",url,sync)
	xmlHttp.send(null)
	
}
function UpdateSmallPanelSync(url, val, id, loading){ 
	var doc = document.getElementById(id)
	if (doc == null){
		alert("UpdateSubPanel - Error: "+ id + " is not found in document!")
		return
	}

	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
		alert ("Browser does not support HTTP Request")
		return
	} 

	if (loading) {
		document.getElementById(id).innerHTML ="<img src='../images/small_loading.gif' align='absbottom'> Loading...";					
	}

	url=url + val
	var sync
	sync = false
	xmlHttp.onreadystatechange= function(){
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
					document.getElementById(id).innerHTML=xmlHttp.responseText;									
			}
			else {
			}
		
	};
	xmlHttp.open("GET",url,sync)
	xmlHttp.send(null)
	if (sync == false) {
		document.getElementById(id).innerHTML=xmlHttp.responseText;									
	}
}