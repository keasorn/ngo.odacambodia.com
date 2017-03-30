var control
var calendar
function DatePicker(txt)	{
	
	if (control != ById(txt)){
		control = ById(txt)
		calendar = new Epoch('dp_cal','popup',control);
	}
	else if (calendar == null) {			
		calendar = new Epoch('dp_cal','popup',control);
	}
	calendar.toggle();
}