	function checkAllPart(o){
		
    var boxes = document.getElementsByClassName("checkbox_part");
    for (var x=0;x<boxes.length;x++){	
    var obj = boxes[x];
    if (obj.type == "radio"){
    if (obj.name!="checkAllPart") obj.checked = o.checked;
    }
    }
	
	var boxes = document.getElementsByClassName("checkbox_srv");
    for (var x=0;x<boxes.length;x++){	
    var obj = boxes[x];
    if (obj.type == "radio"){
    if (obj.name!="checkAllSrv") obj.checked = o.unchecked;
    }
    }
	
    }
	
	function checkAllSrv(o){
		
    var boxes = document.getElementsByClassName("checkbox_srv");
    for (var x=0;x<boxes.length;x++){	
    var obj = boxes[x];
    if (obj.type == "radio"){
    if (obj.name!="checkAllSrv") obj.checked = o.checked;
    }
    }
	
	var boxes = document.getElementsByClassName("checkbox_part");
    for (var x=0;x<boxes.length;x++){	
    var obj = boxes[x];
    if (obj.type == "radio"){
    if (obj.name!="checkAllPart") obj.checked = o.unchecked;
    }
    }
	
    }
	
