		<input type="text" name="Receipient" id="Receipient" size="12" style="width:85%" maxlength="100" class="fontNormal">
						<input type="button" value="..." name="btnMoreImpNgoName" id="btnMoreImpNgoName" class="fontTiny"
				onclick="
				 	var layer = document.getElementById('implementingNgoLayer')
				 	if (layer.style.display == ''){
					 	layer.style.display = 'none'
					 	return 
				 	}
				 	layer.style.display = ''
				 	var strTop = ''
				 	var point = myGetXY(Receipient)
				 	layer.style.left =  point.x + 2  + 'px'
				 	layer.style.top =  point.y + this.offsetHeight + 'px'				 	
				 	layer.style.width =  this.offsetWidth  + 'px'
				 
					">
	
