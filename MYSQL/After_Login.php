<?php
$_SESSION["PNAME"] = "AFTER LOGIN";
require_once 'INCLUDES/CHK_SETT.php';
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
		 function myFunction() {
			 var transaction = db.transaction(["SETTINGS"]);
            var objectStore = transaction.objectStore("SETTINGS");
            var request = objectStore.get("00-01");
            
            request.onerror = function(event) {
               alert("Unable to retrieve data from database!");
            };
            
            request.onsuccess = function(event) {
               if(request.result) {
                  
               }
               
               else {
                  alert("NO SETTINGS FOUND! PLASE UPDATE YOUR PROFILE");
				  window.location.href = "SETT.php";
               }
            };
		 };

$(window).bind('beforeunload', function(){
     var x = myFunction();
	 return x;
 });
 $(document).ready(function () {
			 $.ajax({
                    type: "GET",
                    url: "INCLUDES/GT_SETT.php",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function (data) {
						$.session("ONAME", data[1]);
						$.session("ADDR", data[2]);
						$.session("VNO", data[5]);
						$.session("CST", data[6]);
						$.session("PH", data[3]);
						$.session("MAIL", data[4]);
						$.session("PAN", data[7]);
						$.session("STAX", data[8]);
					}
					,
                    error: function OnErrorCall(response) {
                        alert(response.status + " " + response.responseText);
                    }
			 });
		 });
});
</script>
</body>