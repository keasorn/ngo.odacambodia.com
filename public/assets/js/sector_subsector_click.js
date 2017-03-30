/// Start Sector
function SelectAllSector(){
	var t = ById("AllSectors").checked ;

	ById("MainSector1").checked = t;
	ById("MainSector2").checked = t;	
	ById("MainSector3").checked = t;
	ById("MainSector4").checked = t;
	ById("sector501").checked = t;
	ById("sector601").checked = t;
	//ById("sector701").checked = t;	
	ById("sector990199").checked = t;
	
	SelectMainSector1();
	SelectMainSector2();
	SelectMainSector3();
	SelectMainSector4();
	SelectSector501();
	SelectSector601();
	//SelectSector701();

	ById("sector990199").checked = t;

}
function TestAllSector(){
 	var t = true;
 	t = (t && ById("MainSector1").checked);
 	t = (t && ById("MainSector2").checked);
 	t = (t && ById("MainSector3").checked);
 	t = (t && ById("MainSector4").checked);
 	t = (t && ById("sector501").checked);
 	t = (t && ById("sector601").checked);
 //	t = (t && ById("sector701").checked); 	
 	t = (t && ById("sector990199").checked);
 	ById("AllSectors").checked = t;
}
function SelectMainSector1(){//Social Sector
	var t = ById("MainSector1").checked;
	ById("sector101").checked=t;
	ById("sector102").checked=t;
	SelectSector101();
	SelectSector102();	
}
function TestMainSector1(){
	var t = true;
	t = (t && ById("sector101").checked);
	t = (t && ById("sector102").checked);
	ById("MainSector1").checked = t ;
	TestAllSector();
}
function SelectSector101(){// Health
	var t = ById("sector101").checked;
	ById("subsector10101").checked=t;
	ById("subsector10102").checked=t;
	ById("subsector10103").checked=t;
	ById("subsector10104").checked=t;
	ById("subsector10105").checked=t;		
	ById("subsector10106").checked=t;
	ById("subsector10107").checked=t;	
	ById("subsector10108").checked=t;		
	ById("subsector10199").checked=t;
	TestMainSector1();
}
function TestSector101(){
	var t=true;
	t = (t && ById("subsector10101").checked);
	t = (t && ById("subsector10102").checked);
	t = (t && ById("subsector10103").checked);
	t = (t && ById("subsector10104").checked);
	t = (t && ById("subsector10105").checked);
	t = (t && ById("subsector10106").checked);
	t = (t && ById("subsector10107").checked);	
	t = (t && ById("subsector10108").checked);		
	t = (t && ById("subsector10199").checked);
	ById("sector101").checked=t;
	TestMainSector1();
}
function SelectSector102(){//Eduction
	var t = ById("sector102").checked;
	ById("subsector10207").checked=t;
	ById("subsector10206").checked=t;
	ById("subsector10205").checked=t;
	ById("subsector10204").checked=t;
	ById("subsector10203").checked=t;
	ById("subsector10202").checked=t;
	ById("subsector10201").checked=t;	
	ById("subsector10299").checked=t;
	TestMainSector1();
}
function TestSector102(){
	var t = true;
	t = (t && ById("subsector10207").checked);
	t = (t && ById("subsector10206").checked);
	t = (t && ById("subsector10205").checked);
	t = (t && ById("subsector10204").checked);
	t = (t && ById("subsector10203").checked);
	t = (t && ById("subsector10202").checked);
	t = (t && ById("subsector10201").checked);
	t = (t && ById("subsector10299").checked);
	ById("sector102").checked=t;
	TestMainSector1();
}
function SelectMainSector2(){//Economic Sector
	var t = ById("MainSector2").checked ;
	ById("sector201").checked = t;
	ById("sector202").checked = t;
	ById("sector203").checked = t;
	ById("sector204").checked = t;
	ById("sector205").checked = t;
	SelectSector201();
	SelectSector202();
	SelectSector203();
	SelectSector204();
	SelectSector205();
	TestAllSector();
}
function TestMainSector2(){
	var t = true; 
	t = (t && ById("sector201").checked);
	t = (t && ById("sector202").checked);
	t = (t && ById("sector203").checked);
	t = (t && ById("sector204").checked);
	t = (t && ById("sector205").checked);
	ById("MainSector2").checked = t ;			
	TestAllSector();
}

function SelectSector201(){//Agriculture
	var t = ById("sector201").checked;
	ById("subsector20101").checked = t;
	ById("subsector20102").checked = t;
	ById("subsector20103").checked = t;
	ById("subsector20104").checked = t;
	ById("subsector20105").checked = t;
	ById("subsector20106").checked = t;
	ById("subsector20107").checked = t;
	ById("subsector20108").checked = t;
	ById("subsector20109").checked = t;
	ById("subsector20110").checked = t;
	ById("subsector20111").checked = t;
	ById("subsector20112").checked = t;
	ById("subsector20113").checked = t;	
	ById("subsector20114").checked = t;		
	ById("subsector20115").checked = t;		
	ById("subsector20199").checked = t;
	TestMainSector2();
}
function TestSector201(){
	var t = true ;
	t = (t && ById("subsector20101").checked);
	t = (t && ById("subsector20102").checked);
	t = (t && ById("subsector20103").checked);
	t = (t && ById("subsector20104").checked);
	t = (t && ById("subsector20105").checked);
	t = (t && ById("subsector20106").checked);
	t = (t && ById("subsector20107").checked);
	t = (t && ById("subsector20108").checked);
	t = (t && ById("subsector20109").checked);
	t = (t && ById("subsector20110").checked);
	t = (t && ById("subsector20111").checked);
	t = (t && ById("subsector20112").checked);
	t = (t && ById("subsector20113").checked);
	t = (t && ById("subsector20114").checked);	
	t = (t && ById("subsector20115").checked);	
	t = (t && ById("subsector20199").checked);
	ById("sector201").checked = t ;
	TestMainSector2();
}
function SelectSector202(){//Manufacturing, Minig & Trade
	var t = ById("sector202").checked ;
	ById("subsector20201").checked = t ;
	ById("subsector20202").checked = t ;
	ById("subsector20203").checked = t ;
	ById("subsector20204").checked = t ;
	ById("subsector20205").checked = t ;
	ById("subsector20206").checked = t ;
	ById("subsector20207").checked = t ;		
	ById("subsector20208").checked = t ;
	ById("subsector20299").checked = t ;
	TestMainSector2();
}
function TestSector202(){
	var t = true ;
	t = (t && ById("subsector20201").checked);
	t = (t && ById("subsector20202").checked);
	t = (t && ById("subsector20203").checked);
	t = (t && ById("subsector20204").checked);
	t = (t && ById("subsector20205").checked);
	t = (t && ById("subsector20206").checked);
	t = (t && ById("subsector20207").checked);
	t = (t && ById("subsector20208").checked);
	t = (t && ById("subsector20299").checked);
	ById("sector202").checked = t ;
	TestMainSector2();
}
function SelectSector203(){//Rural Development and Land Management
	var t = ById("sector203").checked ;
//	ById("subsector20301").checked = t ;
	ById("subsector20302").checked = t ;
	ById("subsector20303").checked = t ;
	ById("subsector20304").checked = t ;
	ById("subsector20305").checked = t ;	
	ById("subsector20306").checked = t ;		
	ById("subsector20399").checked = t ;
	TestMainSector2();
}
function TestSector203(){
	var t = true ;
//	t = (t && ById("subsector20301").checked);
	t = (t && ById("subsector20302").checked);
	t = (t && ById("subsector20303").checked);
	t = (t && ById("subsector20304").checked);
	t = (t && ById("subsector20305").checked);	
	t = (t && ById("subsector20306").checked);	
	t = (t && ById("subsector20399").checked);
	ById("sector203").checked = t ;
	TestMainSector2();
}
function SelectSector204(){//Banking and Business Services
	var t = ById("sector204").checked ;
	ById("subsector20401").checked = t ;
	ById("subsector20402").checked = t ;
	ById("subsector20403").checked = t ;
	ById("subsector20404").checked = t ;
	ById("subsector20499").checked = t ;
	TestMainSector2();
}
function TestSector204(){
	var t = true ;
	t = (t && ById("subsector20401").checked);
	t = (t && ById("subsector20402").checked);
	t = (t && ById("subsector20403").checked);
	t = (t && ById("subsector20404").checked);
	t = (t && ById("subsector20499").checked);
	ById("sector204").checked = t ;
	TestMainSector2();
}
function SelectSector205(){//Urban Planning & Managment
	var t = ById("sector205").checked ;
	ById("subsector20501").checked = t ;
	ById("subsector20502").checked = t ;	
	ById("subsector20599").checked = t ;	
	TestMainSector2();
}
function TestSector205(){
	var t = true;
	t = (t && ById("subsector20501").checked);
	t = (t && ById("subsector20502").checked);	
	t = (t && ById("subsector20599").checked);	
	ById("sector205").checked = t ;
	TestMainSector2();
}

function SelectMainSector3(){
	var t = ById("MainSector3").checked;
	ById("sector301").checked = t;
	ById("sector302").checked = t;
	ById("sector303").checked = t;
	ById("sector304").checked = t;		
	SelectSector301();
	SelectSector302();
	SelectSector303();
	SelectSector304();			
	TestAllSector();
}
function TestMainSector3(){
	var t = true;
	t = (t && ById("sector301").checked) ;	
	t = (t && ById("sector302").checked) ;	
	t = (t && ById("sector303").checked) ;	
	t = (t && ById("sector304").checked) ;				
	ById("MainSector3").checked = t;
	TestAllSector();
}

function TestSector301(){
	var t = true;
	t = (t && ById("subsector30101").checked);
	t = (t && ById("subsector30102").checked);
	t = (t && ById("subsector30103").checked);
	t = (t && ById("subsector30199").checked);
	ById("sector301").checked = t;
	TestMainSector3();
}
function SelectSector301(){ // Post & Management
	var t = ById("sector301").checked ;
	ById("subsector30101").checked = t;
	ById("subsector30102").checked = t;
	ById("subsector30103").checked = t;		
	ById("subsector30199").checked = t;	
	TestMainSector3();
}

function TestSector302(){
	var t = true;
	t = (t && ById("subsector30201").checked);
	t = (t && ById("subsector30202").checked);
	t = (t && ById("subsector30203").checked);
	t = (t && ById("subsector30204").checked);
	t = (t && ById("subsector30299").checked);				
	ById("sector302").checked = t;
	TestMainSector3();
}
function SelectSector302(){ //Power and Electricity
	var t = ById("sector302").checked;
	ById("subsector30201").checked = t ;
	ById("subsector30202").checked = t ;	
	ById("subsector30203").checked = t ;	
	ById("subsector30204").checked = t ;	
	ById("subsector30299").checked = t ;	
	TestMainSector3();
}
function TestSector303(){
	var t = true;
	t = (t && ById("subsector30301").checked);
	t = (t && ById("subsector30302").checked);
	t = (t && ById("subsector30303").checked);
	t = (t && ById("subsector30304").checked);
	t = (t && ById("subsector30305").checked);	
	t = (t && ById("subsector30399").checked);				
	ById("sector303").checked = t;
	TestMainSector3();
}
function SelectSector303(){ //Transportation
	var t = ById("sector303").checked;
	ById("subsector30301").checked = t ;
	ById("subsector30302").checked = t ;	
	ById("subsector30303").checked = t ;	
	ById("subsector30304").checked = t ;	
	ById("subsector30305").checked = t ;		
	ById("subsector30399").checked = t ;	
	TestMainSector3();
}

function TestSector304(){
	var t = true;
	t = (t && ById("subsector30401").checked);
	t = (t && ById("subsector30402").checked);
	t = (t && ById("subsector30403").checked);
	t = (t && ById("subsector30404").checked);
	t = (t && ById("subsector30405").checked);	
	t = (t && ById("subsector30499").checked);				
	ById("sector304").checked = t;
	TestMainSector3();
}
function SelectSector304(){ //Transportation
	var t = ById("sector304").checked;
	ById("subsector30401").checked = t ;
	ById("subsector30402").checked = t ;	
	ById("subsector30403").checked = t ;	
	ById("subsector30404").checked = t ;	
	ById("subsector30405").checked = t ;		
	ById("subsector30499").checked = t ;	
	TestMainSector3();
}
function SelectMainSector4(){
	var t = ById("MainSector4").checked ; 
	ById("sector401").checked = t;
	ById("sector402").checked = t;
	ById("sector403").checked = t;
	ById("sector404").checked = t;
	ById("sector405").checked = t;
	ById("sector406").checked = t;
	ById("sector407").checked = t;
	
	SelectSector401();
	SelectSector402();
	SelectSector403();
	SelectSector404();	
	SelectSector405();
	SelectSector406();	
	SelectSector407();
	
	TestAllSector();
}
function TestMainSector4(){
	var t = true; 
	t = (t && ById("sector401").checked);
	t = (t && ById("sector402").checked);
	t = (t && ById("sector403").checked);
	t = (t && ById("sector404").checked);
	t = (t && ById("sector405").checked);
	t = (t && ById("sector406").checked);
	t = (t && ById("sector407").checked);	
	ById("MainSector4").checked = t;
	TestAllSector();
}
function TestSector401(){
	var t = true;
	t = (t && ById("subsector40101").checked) ;
	t = (t && ById("subsector40199").checked) ;	
	ById("sector401").checked = t;
	TestMainSector4();
}
function SelectSector401(){
	var t = ById("sector401").checked ;
	ById("subsector40101").checked = t ;
	ById("subsector40199").checked = t ;		
	TestMainSector4();
}
function TestSector402(){
	var t = true;
	t = (t && ById("subsector40201").checked) ;
	t = (t && ById("subsector40299").checked) ;	
	ById("sector402").checked = t;
	TestMainSector4();
}
function SelectSector402(){
	var t = ById("sector402").checked ;
	ById("subsector40201").checked = t ;
	ById("subsector40299").checked = t ;		
	TestMainSector4();
}
function TestSector403(){
	var t = true;
	t = (t && ById("subsector40301").checked) ;
	t = (t && ById("subsector40302").checked) ;
	t = (t && ById("subsector40303").checked) ;
	t = (t && ById("subsector40304").checked) ;
	t = (t && ById("subsector40305").checked) ;
	t = (t && ById("subsector40306").checked) ;
	
	t = (t && ById("subsector40399").checked) ;	
	ById("sector403").checked = t;
	TestMainSector4();
}
function SelectSector403(){
	var t = ById("sector403").checked ;
	ById("subsector40301").checked = t ;
	ById("subsector40302").checked = t ;
	ById("subsector40303").checked = t ;
	ById("subsector40304").checked = t ;
	ById("subsector40305").checked = t ;
	ById("subsector40306").checked = t ;

	ById("subsector40399").checked = t ;		
	TestMainSector4();
}
function TestSector404(){
	var t = true;
	t = (t && ById("subsector40401").checked) ;
	t = (t && ById("subsector40499").checked) ;	
	ById("sector404").checked = t;
	TestMainSector4();
}
function SelectSector404(){
	var t = ById("sector404").checked ;
	ById("subsector40401").checked = t ;
	ById("subsector40499").checked = t ;		
	TestMainSector4();
}

function TestSector405(){
	var t = true;
	t = (t && ById("subsector40501").checked) ;
	t = (t && ById("subsector40599").checked) ;	
	ById("sector405").checked = t;
	TestMainSector4();
}
function SelectSector405(){
	var t = ById("sector405").checked ;
	ById("subsector40501").checked = t ;
	ById("subsector40599").checked = t ;		
	TestMainSector4();
}
function TestSector406(){
	var t = true;
	t = (t && ById("subsector40601").checked) ;
	t = (t && ById("subsector40602").checked) ;
	t = (t && ById("subsector40603").checked) ;		
	t = (t && ById("subsector40604").checked) ;	
	t = (t && ById("subsector40605").checked) ;
	t = (t && ById("subsector40606").checked) ;	
	t = (t && ById("subsector40607").checked) ;	
	t = (t && ById("subsector40608").checked) ;	
	t = (t && ById("subsector40699").checked) ;	
	ById("sector406").checked = t;
	TestMainSector4();
}
function SelectSector406(){
	var t = ById("sector406").checked ;
	ById("subsector40601").checked = t ;
	ById("subsector40602").checked = t ;
	ById("subsector40603").checked = t ;
	ById("subsector40604").checked = t ;
	ById("subsector40605").checked = t ;
	ById("subsector40606").checked = t ;
	ById("subsector40607").checked = t ;
	ById("subsector40608").checked = t ;
	ById("subsector40699").checked = t ;		
	TestMainSector4();
}


function TestSector407(){
	var t = true;
	t = (t && ById("subsector40701").checked) ;
	t = (t && ById("subsector40799").checked) ;	
	ById("sector407").checked = t;
	TestMainSector4();
}
function SelectSector407(){
	var t = ById("sector407").checked ;
	ById("subsector40701").checked = t ;
	ById("subsector40799").checked = t ;		
	TestMainSector4();
}

function TestSector501(){
	var t = true;
	t = (t && ById("subsector50101").checked)
	t = (t && ById("subsector50199").checked)
	ById("sector501").checked = t;		
	TestAllSector();
}
function SelectSector501(){
	var t = ById("sector501").checked ; 
	ById("subsector50101").checked = t;
	ById("subsector50199").checked = t;	
	TestAllSector();
}

function TestSector601(){
	var t = true;
	t = (t && ById("subsector60101").checked)
	t = (t && ById("subsector60199").checked)
	ById("sector601").checked = t;		
	TestAllSector();
}
function SelectSector601(){
	var t = ById("sector601").checked ; 
	ById("subsector60101").checked = t;
	ById("subsector60199").checked = t;	
	TestAllSector();
}

function TestSector701(){
	var t = true;
	t = (t && ById("subsector70101").checked)
	t = (t && ById("subsector70102").checked)
	t = (t && ById("subsector70103").checked)
	t = (t && ById("subsector70104").checked)
	t = (t && ById("subsector70199").checked)
	ById("sector701").checked = t;		
	TestAllSector();
}

function SelectSector701(){
	var t = ById("sector701").checked ; 
	ById("subsector70101").checked = t;
	ById("subsector70102").checked = t;
	ById("subsector70103").checked = t;
	ById("subsector70104").checked = t;
	ById("subsector70199").checked = t;	
	TestAllSector();
}

function SelectSector990199(){
	TestAllSector();
}