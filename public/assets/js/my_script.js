function getFirstChildData(id) {

    var fc = ById(id).firstChild
    if (fc == null) {
        return ""
    } else {
        return fc.data
    }
}

function strRev(str) {
    var mystr = new String()
    var tmpStr = ""
    mystr = str

    for (i = mystr.length; i >= 0; i--) {
        tmpStr += mystr.charAt(i)
    }
    return tmpStr
}


function getFileName(fileName) {
    var str = new String()

    str = strRev(document.getElementById(fileName).value)


    var fSlash = str.indexOf("/", 0)

    var bSlash = str.indexOf("\\", 0)

    if (fSlash > 0) str = str.substr(0, fSlash)
    if (bSlash > 0) str = str.substr(0, bSlash)


    str = strRev(str)

    return str

}

function getFileExt(fileName) {

    var str = new String()
    str = strRev(ById(fileName).value)
    var n = str.indexOf(".", 0)

    str = str.substr(0, n)
    str = strRev(str)

    return str

}

function goto(url) {
    window.location.href = url
}

function isEmpty(obj, obj_name) {
    if (trim(obj.value) == "") {
        alert(obj_name + " could not be blank!")
        obj.focus();
        return true;
    }
    else {
        return false
    }
}

function jsIsBlank(id) {
    if (trim(ById("id").value) == "") {
        return false
    }
    return true
}

function jSum(a, b) {
    return parseFloat(jsNZ(a)) + parseFloat(jsNZ(b))


}

function popup(url, w, h) {
    var opt = ''
    if ((w == "") || (h == ""))    opt = 'scrollbars, resizable'

    if (w == "") w = window.screen.width
    if (h == "") h = window.screen.height


    left_pos = ((window.screen.width / 2) - (w / 2));
    top_pos = ((window.screen.height / 2) - (h / 2)) - 50;
    window.open(url, '', 'width=' + w + ',height=' + h + ',left=' + left_pos + ',top=' + top_pos + ',' + opt)

}


function preview(url, w, h) {

    if (w == '') w = window.screen.width
    if (h == '') h = window.screen.height

    window.open(url, '', 'width=' + w + ',height=' + h + ',left=0,top=0,menubar=yes,scrollbars=yes,resizable=yes')

}
function isNotMax(obj) {
    return obj.value.length != obj.getAttribute("maxlength")
}

function toDatePickerDate(d) {
    var myDate = new Date(d);
    dateString = myDate.getMonth() + 1 + '/' + myDate.getDate() + '/' + myDate.getFullYear();
    return dateString;
}
function MouseOverRow(color, id) {
    if (color == '') color = '#FFFF66';
    setRowColor(color, id)
//	document.getElementById(id).style.fontWeight = 'bold'
}
function editRow(id) {

    document.getElementById(id).style.backgroundColor = '#FFC06F'
    //document.getElementById(id).style.fontWeight = 'Bold'
}

function jsNZ(a) {
    if ((a == "") || (a == null)) {
        return 0
    }
    else
        return toNumber(a)
}
function checkPercent(obj) {

    if (checkDecimals(obj)) {
        if ((obj.value > 100) || (obj.value < 0)) {
            alert("Percentage must be bigger than 0 and less than 100!")
            obj.select
            return false;
        }
        else {
            return true;
        }
    }
}
function isDecimal(num) {

    var reg = new RegExp()
    reg = /^\$?\-?([1-9]{1}[0-9]{0,2}(\,\d{3})*(\.\d{0,2})?|[1-9]{1}\d{0,}(\.\d{0,2})?|0(\.\d{0,2})?|(\.\d{1,2}))$|^\-?\$?([1-9]{1}\d{0,2}(\,\d{3})*(\.\d{0,2})?|[1-9]{1}\d{0,}(\.\d{0,2})?|0(\.\d{0,2})?|(\.\d{1,2}))$|^\(\$?([1-9]{1}\d{0,2}(\,\d{3})*(\.\d{0,2})?|[1-9]{1}\d{0,}(\.\d{0,2})?|0(\.\d{0,2})?|(\.\d{1,2}))\)$/

    var test;
    if (num != "") {
        test = reg.test(num)
        if (!test) {
            return false
        }
        else {
            return true
        }
    }
    else {
        return true
    }

}

function URLEncode(val) {
    var tmp = new String();
    tmp = val;
    return tmp;
}


function toCurrency(str) {
    var t = '';
    var tmp = '';
    for (var i = 0; i <= str.length - 1; i++) {
        t = str.substr(i, 1);
        if ((t == '$') || (t == ',')) {
            continue;
        }
        else {
            tmp += t;
        }
    }
    if (tmp == '') tmp = 0;
    return tmp;
}

function MM_openBrWindow(theURL, winName, features) { //v2.0
    if (!features) {
        features = "menubar=yes,scrollbars=yes,resizable=yes"
    }
    window.open(theURL, winName, features);
}

function checkDecimal(num) {
    //   num = trim(num)
    //   alert(num)
    var reg = new RegExp()
    reg = /^\$?\-?([1-9]{1}[0-9]{0,2}(\,\d{3})*(\.\d{0,2})?|[1-9]{1}\d{0,}(\.\d{0,2})?|0(\.\d{0,2})?|(\.\d{1,2}))$|^\-?\$?([1-9]{1}\d{0,2}(\,\d{3})*(\.\d{0,2})?|[1-9]{1}\d{0,}(\.\d{0,2})?|0(\.\d{0,2})?|(\.\d{1,2}))$|^\(\$?([1-9]{1}\d{0,2}(\,\d{3})*(\.\d{0,2})?|[1-9]{1}\d{0,}(\.\d{0,2})?|0(\.\d{0,2})?|(\.\d{1,2}))\)$/
    if (num.value != "") {
        test = reg.test(num.value)
        if (!test) {
            alert("\"" + num.value + "\" is invalid number!\n\nOnly two decimal number are allowed. Please try again\nExample: 1,234,567.90")
            num.select()
            num.focus()
            return false
        }
        else {
            return true
        }
    }
    else {
        return true
    }
}
function checkDecimals(num) {
    //   num = trim(num)
    //   alert(num)
    var reg = new RegExp()
    reg = /^\$?\-?([1-9]{1}[0-9]{0,2}(\,\d{3})*(\.\d{0,2})?|[1-9]{1}\d{0,}(\.\d{0,2})?|0(\.\d{0,2})?|(\.\d{1,2}))$|^\-?\$?([1-9]{1}\d{0,2}(\,\d{3})*(\.\d{0,2})?|[1-9]{1}\d{0,}(\.\d{0,2})?|0(\.\d{0,2})?|(\.\d{1,2}))$|^\(\$?([1-9]{1}\d{0,2}(\,\d{3})*(\.\d{0,2})?|[1-9]{1}\d{0,}(\.\d{0,2})?|0(\.\d{0,2})?|(\.\d{1,2}))\)$/
    if (num.value != "") {
        test = reg.test(num.value)
        if (!test) {
            alert("\"" + num.value + "\" is invalid number!\n\nOnly two decimal number are allowed. Please try again\nExample: 1,234,567.90")
            num.select()
            num.focus()
            return false
        }
        else {
            return true
        }
    }
    else {
        return true
    }
}

function checkNum(id) {
    var getNumber = toNumber($('#' + id).val());
    if (isNaN(getNumber)) {
        $("#" + id).val("");
        $("#" + id).focus();
    } else {
        $("#" + id).formatCurrency();
    }
}

function getvalueCheckGroup(chName) {
    var values = new Array();
    $.each($("input[name='" + chName + "[]']:checked"), function () {
        values.push($(this).val());
    });
    return values;
}

function trim(str, chars) {
    return ltrim(rtrim(str, chars), chars);
}

function ltrim(str, chars) {
    chars = chars || "\\s";
    str = new String(str)
    return str.replace(new RegExp("^[" + chars + "]+", "g"), "");
}

function rtrim(str, chars) {
    chars = chars || "\\s";
    str = new String(str);
    return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}
function SelectedRow(color, id) {
    setRowColor(color, id)
    document.getElementById(id).style.fontWeight = 'bold'
}
function byid(id) {
    return ById(id);
}

function byId(id) {
    return ById(id);
}


function setRowColor(rowId, color) {
    ById(rowId).style.backgroundColor = color;
}

function FormatNumber(num, decimalNum, bolLeadingZero, bolParens, bolCommas)
/**********************************************************************
 IN:
 NUM - the number to format
 decimalNum - the number of decimal places to format the number to
 bolLeadingZero - true / false - display a leading zero for
 numbers between -1 and 1
 bolParens - true / false - use parenthesis around negative numbers
 bolCommas - put commas as number separators.

 RETVAL:
 The formatted number!
 **********************************************************************/ {
    if (isNaN(parseFloat(num))) return "";

    var tmpNum = num;
    var iSign = num < 0 ? -1 : 1;		// Get sign of number

    // Adjust number so only the specified number of numbers after
    // the decimal point are shown.
    tmpNum *= Math.pow(10, decimalNum);
    tmpNum = Math.round(Math.abs(tmpNum))
    tmpNum /= Math.pow(10, decimalNum);
    tmpNum *= iSign;					// Readjust for sign


    // Create a string object to do our formatting on
    var tmpNumStr = new String(tmpNum);

    // See if we need to strip out the leading zero or not.
    if (!bolLeadingZero && num < 1 && num > -1 && num != 0)
        if (num > 0)
            tmpNumStr = tmpNumStr.substring(1, tmpNumStr.length);
        else
            tmpNumStr = "-" + tmpNumStr.substring(2, tmpNumStr.length);

    // See if we need to put in the commas
    if (bolCommas && (num >= 1000 || num <= -1000)) {
        var iStart = tmpNumStr.indexOf(".");
        if (iStart < 0)
            iStart = tmpNumStr.length;

        iStart -= 3;
        while (iStart >= 1) {
            tmpNumStr = tmpNumStr.substring(0, iStart) + "," + tmpNumStr.substring(iStart, tmpNumStr.length)
            iStart -= 3;
        }
    }

    // See if we need to use parenthesis
    if (bolParens && num < 0)
        tmpNumStr = "(" + tmpNumStr.substring(1, tmpNumStr.length) + ")";

    return tmpNumStr;		// Return our formatted string!
}

function toStandard(num, decimalNum) {

    if (decimalNum == null) {
        decimalNum = 2
    }
    return FormatNumber(num, decimalNum, false, false, true)
}

function ClearSelectionRow(tableID) {
    var tbl = document.getElementById(tableID);
    n = tbl.rows.length;
    for (i = 0; i < n; i++) {
        tbl.rows[i].style.backgroundColor = 'white';
    }
}

function toNumber(str){
    var t = new String()
    t = str
    for (i = 1; i<t.length ; i++)
        t = t.replace(/,/,"")
    return t
}

function isNumeric(str) {
    str = toNumber(str);
    return !(isNaN(str));
}

function searchListIndexByValue(lstId, searchValue) {
    var lst = document.getElementById(lstId)
    var i
    var result = -1
    for (i = 0; i < lst.options.length; i++) {
        if (trim(searchValue.toString()) == trim(lst.options[i].value.toString())) {
            result = i
            break
        }
    }
    return result
}


function ClearListBox(lst) {
    for (var i = lst.options.length - 1; i >= 0; i--) {
        lst.remove(i)
    }
}

function searchListIndexByText(lstId, str) {
    var lst = document.getElementById(lstId)
    var i
    var result = -1
    for (i = 0; i < lst.options.length; i++) {
        // alert(str.toString() +"=="+ lst.options[i].text.toString())
        if (str.toString().trim() == lst.options[i].text.toString().trim()) {
            result = i
            break
        }
    }
    return result

}

function ClearListBoxById(lstId) {
    var lst = document.getElementById(lstId)
    for (var i = lst.options.length - 1; i >= 0; i--) {
        lst.remove(i)
    }
}
function selectListItemByText(lstId, searchValue) {
    var t = searchListIndexByText(lstId, searchValue)
    if (t > -1) {
        document.getElementById(lstId).selectedIndex = t

    }
    return t;
}
function checkAll(obj, numChk, tblID, tRID,chkid) {
    var i
    var n = parseInt(numChk)

    ClearSelectionRow(tblID)
    for (i = 1; i <= n; i++) {
        try {
            ById(chkid + i).checked = obj.checked
            if (obj.checked) {
                byId(tRID + i).style.backgroundColor = 'red';
            }else {

                byId(tRID + i).style.backgroundColor = '#fff';
            }
        } catch (e) {
        }
    }
}

function getCheckBoxValues(chkId, totalRow) {
    var values = "";
    for (var i = 1; i <= totalRow; i++) {
        var chk = ById(chkId + "" + i)
        if (chk.checked) {
            if (values != "") {
                values += ",";
            }
            values += chk.value;
        }
    }

    return values
}

function jNZ(str){
    var t = toNumber(str)
    if (t=="") {
        t = 0
    }
    return t
}
function jsNZ(a){
    if ((a == "") || (a == null)) {
        return 0
    }
    else
        return toNumber(a)
}
function myPoint(iX, iY){
    this.x = iX;
    this.y = iY;
}

function myGetXY(aTag){
    var oTmp = aTag;
    var pt = new myPoint(0,0);
    do {
        pt.x += oTmp.offsetLeft;
        pt.y += oTmp.offsetTop;
        oTmp = oTmp.offsetParent;
    } while(oTmp.tagName!="BODY");
    return pt;
}

function CheckInt(obj){

    if (obj.value !=""){
        if (isNaN(obj.value)){
            alert("\""+ obj.value + "\" is invalid number!  Please try again\n")
            obj.select()
            return false
        }
        else {
            return true
        }
    }
    else {
        return true
    }

}
function ClearListBox(lst){
    for (var i = lst.options.length-1; i>=0; i --){
        lst.remove(i)
    }
}
function ClearListBoxById(lstId){
    var lst = document.getElementById(lstId)
    for (var i = lst.options.length-1; i>=0; i --){
        lst.remove(i)
    }
}
function searchListIndexByText(lstId, str){
    var lst = document.getElementById(lstId)
    var i
    var result = -1
    for (i = 0; i < lst.options.length; i++){
        if (str.toString() == lst.options[i].text.toString()){
            result = i
            break
        }
    }
    return result

}

function searchListIndexByValue(lstId, searchValue){
    var lst = document.getElementById(lstId)
    var i
    var result = -1
    for (i = 0; i < lst.options.length; i++){
        if (trim(searchValue.toString()) == trim(lst.options[i].value.toString())){
            result = i
            break
        }
    }
    return result
}

function jsFormatNumber (num, decimal) {
    //decimal  - the number of decimals after the digit from 0 to 3
//-- Returns the passed number as a string in the xxx,xxx.xx format.


    //anynum=eval(obj.value);

    anynum = num
    divider =10;
    switch(decimal){
        case 0:
            divider =1;
            break;
        case 1:
            divider =10;
            break;
        case 2:
            divider =100;
            break;
        default:  	 //for 3 decimal places
            divider =1000;
    }

    workNum=Math.abs((Math.round(anynum*divider)/divider));

    workStr=""+workNum

    if (workStr.indexOf(".")==-1){workStr+="."}

    dStr=workStr.substr(0,workStr.indexOf("."));dNum=dStr-0
    pStr=workStr.substr(workStr.indexOf("."))

    while (pStr.length-1< decimal){pStr+="0"}

    if(pStr =='.') pStr ='';

    //--- Adds a comma in the thousands place.
    if (dNum>=1000) {
        dLen=dStr.length
        dStr=parseInt(""+(dNum/1000))+","+dStr.substring(dLen-3,dLen)
    }

    //-- Adds a comma in the millions place.
    if (dNum>=1000000) {
        dLen=dStr.length
        dStr=parseInt(""+(dNum/1000000))+","+dStr.substring(dLen-7,dLen)
    }
    retval = dStr + pStr
    //-- Put numbers in parentheses if negative.
    if (anynum<0) {retval="("+retval+")";}


    //You could include a dollar sign in the return value.
    //retval =  "$"+retval

//	  obj.value = retval;
    return retval;

}

function selectListItemByText(lstId, searchValue){
    var t = searchListIndexByText(lstId, searchValue)
    if (t > -1){
        document.getElementById(lstId).selectedIndex = t
    }
}

function jsSumRound(a, b, round)
{
    a = jsNZ(a)
    b = jsNZ(b)

    var aValue = new Number(toNumber(a))
    var bValue = new Number(toNumber(b))

    aValue = aValue.toFixed(round)
    bValue =  bValue.toFixed(round)
    var result = parseFloat(aValue) + parseFloat(bValue)
    return result

}
var pubNumOfrow
var pubName
var pubi=1
var display
var interval

function ById(id)
{
    return document.getElementById(id)
}
function CloseOpen(n,img, name)
{
    pubi = 1
    pubNumOfrow = n
    pubName = name


    if (img.title == 'Close') {
        display = 'none'
        img.src = '/images/plus_sign.JPG'
        img.title = 'Open'
    }
    else
    {
        display = ''
        img.src = '/images/minus_sign.JPG'
        img.title = 'Close'
    }

    for (pubi=0; pubi<pubNumOfrow ; pubi++){
        ById(pubName +''+ pubi).style.display = display
    }

}

function toKhDate(date, separator) {

    var monthNames = [
        "Jan", "Feb", "Mar",
        "Apr", "May", "Jun", "Jul",
        "Aug", "Sep", "Oct",
        "Nov", "Dec"
    ];

    var date = new Date(date);
    var day = date.getDate();
    var month = monthNames[date.getMonth()];
    var year = date.getFullYear();

    return day + separator + month + separator + year;

}


