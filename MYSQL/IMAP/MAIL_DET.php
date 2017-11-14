<style type="text/css">
    .input-xs {
        height: 22px;
        padding: 2px 5px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
    }

    .focus {
        border: 2px solid red;
        background-color: #FEFED5;
    }

    .custom-date-style {
        background-color: red !important;
    }
</style>
<script>
$(document).ready(function () {
        $('INPUT[type="text"]').focus(function () {
            $(this).addClass("focus");
        });

        $('INPUT[type="text"]').blur(function () {
            $(this).removeClass("focus");
        });
});
</script>
  <div id="load_popup_modal_contant" class="" role="dialog">
  <div class="modal-dialog" style="width:100%;background-color:lightcyan">
	<form role="form" id="form_load_content_id">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Show Popup Title Here</h4>
      </div>
	    <div id="validation-error"></div>
  <div class="cl"></div>
	    <div class="modal-body">
		<?php
$id1 = $_POST["id1"];
$m = new MongoClient();
   $db = $m->selectDB('appharbor_9spxvctt');   	
$SHEET1= $db->IMAP_INBOX;
$pops1 = $SHEET1->findOne(array("MSGNO" => $id1));
?>
<h5><?php echo $pops1['MSGNO']. "\n";?></h5>
	<table class="table table-bordered table-hover table-responsive ui-front adn" style="font-size : smaller">
		<tr>
                    <td colspan="2">
                        <h5>MSG NO:</h5>
                    </td>
                    <td>
                        <?php echo "<input class='form-control input-xs' id='adSTOT' name='STOTAL' type='text' value='".$pops1['MSGNO']."'/>";?>
                    </td>
                </tr>
		<tr>
                    <td colspan="2">
                        <h5>DATE:</h5>
                    </td>
                    <td>
                        <h5><?php echo $pops1['DATE']. "\n";?></h5>
                    </td>
                </tr>
		<tr>
                    <td colspan="2">
                        <h5>FROM:</h5>
                    </td>
                    <td>
                        <h5><?php echo $pops1['FROM']. "\n";?></h5>
                    </td>
                </tr>
		<tr>
                    <td colspan="2">
                        <h5>TO:</h5>
                    </td>
                    <td>
                        <h5><?php echo $pops1['TO']. "\n";?></h5>
                    </td>
                </tr>
		<tr>
                    <td colspan="2">
                        <h5>CC:</h5>
                    </td>
                    <td>
                        <h5><?php echo $pops1['CC']. "\n";?></h5>
                    </td>
                </tr>
		<tr>
                    <td colspan="2">
                        <h5>BCC:</h5>
                    </td>
                    <td>
                        <h5><?php echo $pops1['BCC']. "\n";?></h5>
                    </td>
                </tr>
				<tr>
                    <td colspan="2">
                        <h5>SUBJECT:</h5>
                    </td>
                    <td>
                        <h5><?php echo $pops1['SUB']. "\n";?></h5>
                    </td>
                </tr>
				<tr>
                    <td colspan="2">
                        <h5>MESSAGE DETAILS:</h5>
                    </td>
                    <td>
                        <h5><?php echo $pops1['BODY']. "\n";?></h5>
                    </td>
                </tr>
	</table>
		</form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
  </div>