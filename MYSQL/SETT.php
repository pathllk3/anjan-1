<?php
$_SESSION["PNAME"] = "AFTER LOGIN";
require 'LAYOUT.php';
?>
<body>
<script type="text/javascript">
$(function () {
window.indexedDB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;
         
         //prefixes of window.IDB objects
         window.IDBTransaction = window.IDBTransaction || window.webkitIDBTransaction || window.msIDBTransaction;
         window.IDBKeyRange = window.IDBKeyRange || window.webkitIDBKeyRange || window.msIDBKeyRange
         
         if (!window.indexedDB) {
            window.alert("Your browser doesn't support a stable version of IndexedDB.")
         }
         
         var db;
         var request = window.indexedDB.open("ANJAN", 1);
         
         request.onerror = function(event) {
            console.log("error: ");
         };
         
         request.onsuccess = function(event) {
            db = request.result;
            console.log("success: "+ db);
         };
         
         request.onupgradeneeded = function(event) {
            var db = event.target.result;
            var objectStore = db.createObjectStore("SETTINGS", {keyPath: "id"});
         }
		 $("#sv").click(function(e){
            var request = db.transaction(["SETTINGS"], "readwrite")
            .objectStore("SETTINGS")
            .add({ id: "00-01",
			ONAME: $("#ONAME").val(),
			ADDR: $("#ADDR").val(),
			VNO: $("#VNO").val(),
			CST: $("#CST").val(),
			PH: $("#PH").val(),
			MAIL: $("#MAIL").val(),
			PAN: $("#PAN").val(),
			STAX: $("#STAX").val()});
            
            request.onsuccess = function(event) {
               alert("RECORD has been added to your database.");
            };
            
            request.onerror = function(event) {
               
            }
			
			var dataObject = {
				ONAME: $("#ONAME").val(),
				ADDR: $("#ADDR").val(),
				VNO: $("#VNO").val(),
				CST: $("#CST").val(),
				PH: $("#PH").val(),
				MAIL: $("#MAIL").val(),
				PAN: $("#PAN").val(),
				STAX: $("#STAX").val()
			};
			$.ajax({
                url: "INCLUDES/ADD_SETT.php",
                type: "POST",
                data: dataObject,
				cache: false,
				success: function (data) {
					if (data.toString() != "Successfully Saved!") {
                        alert(data);
                    }
				}
				,
                error: function OnErrorCall(response) {
                    alert(response.status + " " + response.responseText);
                }
			});
		 });
		 
		 $('#ad').click(function(e){
			 var transaction = db.transaction(["SETTINGS"]);
            var objectStore = transaction.objectStore("SETTINGS");
            var request = objectStore.get("00-01");
            
            request.onerror = function(event) {
               alert("Unable to retrieve data from database!");
            };
            
            request.onsuccess = function(event) {
               if(request.result) {
					$("#ONAME").val(request.result.ONAME);
					$("#ADDR").val(request.result.ADDR);
					$("#VNO").val(request.result.VNO);
					$("#CST").val(request.result.CST);
					$("#PH").val(request.result.PH);
					$("#MAIL").val(request.result.MAIL);
					$("#PAN").val(request.result.PAN);
					$("#STAX").val(request.result.STAX);
               }
               
               else {
                  alert("NO SETTINGS FOUND! PLASE UPDATE YOUR PROFILE");
               }
            };
		 });
		 
		 $(document).ready(function () {
			 $('#sv').jqxButton({ template: "warning", width: '49.5%' });
			 $('#ad').jqxButton({ template: "success", width: '49.5%' });
			 $("#ONAME").jqxInput({ height: 23, width: '98%', minLength: 1, theme: 'orange' });
			 $("#ADDR").jqxInput({ height: 23, width: '98%', minLength: 1, theme: 'orange' });
			 $("#VNO").jqxInput({ height: 23, width: '98%', minLength: 1, theme: 'orange' });
			 $("#CST").jqxInput({ height: 23, width: '98%', minLength: 1, theme: 'orange' });
			 $("#PH").jqxInput({ height: 23, width: '98%', minLength: 1, theme: 'orange' });
			 $("#MAIL").jqxInput({ height: 23, width: '98%', minLength: 1, theme: 'orange' });
			 $("#PAN").jqxInput({ height: 23, width: '98%', minLength: 1, theme: 'orange' });
			 $("#STAX").jqxInput({ height: 23, width: '98%', minLength: 1, theme: 'orange' });
			 
			 $.ajax({
                    type: "GET",
                    url: "INCLUDES/GT_SETT.php",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function (data) {
						$("#ONAME").val(data[1]);
						$("#ADDR").val(data[2]);
						$("#VNO").val(data[5]);
						$("#CST").val(data[6]);
						$("#PH").val(data[3]);
						$("#MAIL").val(data[4]);
						$("#PAN").val(data[7]);
						$("#STAX").val(data[8]);
					}
					,
                    error: function OnErrorCall(response) {
                        alert(response.status + " " + response.responseText);
                    }
			 });
		 });
});
</script>
<div style="margin-left:1%;margin-right:1%; border: 2px solid blue">
<table class="table table-hover table-responsive ui-front" style="font-size:x-small;margin-left:1%;margin-right:1%;margin-top:1%;width:98%" bordercolor="green" border="2">
<tr>
<td>
<table class="table table-hover table-responsive ui-front" bordercolor="red" border="2" style="font-size:x-small;">
<tr>
<td><label for="ONAME">COMPANY NAME</label></td>
<td><input id="ONAME" name="ONAME" style="text-transform:uppercase" type="text" value="" /></td>
</tr>
<tr>
<td><label for="ADDR">ADDRESS</label></td>
<td><input id="ADDR" name="ADDR" style="text-transform:uppercase" type="text" value="" /></td>
</tr>
<tr>
<td><label for="PH">PHONE</label></td>
<td><input id="PH" name="PH" type="tel" /></td>
</tr>
<tr>
<td><label for="MAIL">E-MAIL</label></td>
<td><input id="MAIL" name="MAIL" type="email" /></td>
</tr>
</table>
</td>
<td>
<table class="table table-hover table-responsive ui-front" style="font-size:x-small;" bordercolor="red" border="2">
<tr>
<td><label for="VNO">VAT NO</label></td>
<td><input id="VNO" name="VNO" style="text-transform:uppercase" type="number" value="" /></td>
</tr>
<tr>
<td><label for="CST">CST NO</label></td>
<td><input id="CST" name="CST" style="text-transform:uppercase" type="number" value="" /></td>
</tr>
<tr>
<td><label for="PAN">PAN NO</label></td>
<td><input id="PAN" name="PAN" style="text-transform:uppercase" type="text" value="" /></td>
</tr>
<tr>
<td><label for="STAX">SERVICE TAX NO</label></td>
<td><input id="STAX" name="STAX" style="text-transform:uppercase" type="text" value="" /></td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="4"><input type="button" value="Save" id="sv" />&nbsp; <input type="button" value="Get" id="ad" /></td>
</tr>
</table>
</div>
</body>