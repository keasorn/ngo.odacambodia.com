<input type="text" name="NgoSourceName" id="NgoSourceName" size="12" style="width:85%" maxlength="100" class="fontNormal">
<input type="button" value="..." name="btnMoreSourceName" id="btnMoreSourceName" class="fontTiny"
       onclick="
				 	var layer = document.getElementById('ngoSourceNameLayer')
				 	if (layer.style.display == ''){
					 	layer.style.display = 'none'
					 	return
				 	}
				 	layer.style.display = ''
				 	var strTop = ''
				 	var point = myGetXY(NgoSourceName)
				 	layer.style.left =  point.x + 2  + 'px'
				 	layer.style.top =  point.y + this.offsetHeight + 'px'
				 	layer.style.width =  this.offsetWidth  + 'px'

					">