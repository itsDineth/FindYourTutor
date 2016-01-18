<?php
	require_once("../template/header.php");
	require_once("../template/wrapper.php");
	if (isset($_SESSION['USERID'])) {
?>
<div class="container-fluid card" style="width:50%; min-width:500px; margin:0 auto">
	<legend><h2>Inbox</h2></legend>

	<table cellpadding="10" style="width:100%" class="table table-striped">
		<thead>
    	<tr class="clickableRow" href='#'>
        	<td style="width:20%">Dineth Hettiarachchi</td>
            <td style="width:60%;">This is a message</td>
            <td style="width:20%; text-align:right">Dec 4</td>
        </tr>
        </thead>
        <tbody>
        <tr>
        	<td style="width:20%">Dineth Hettiarachchi</td>
            <td style="width:60%;">This is a message</td>
            <td style="width:20%; text-align:right">Dec 4</td>
        </tr>
        <tr>
        	<td style="width:20%">Dineth Hettiarachchi</td>
            <td style="width:60%;">This is a message</td>
            <td style="width:20%; text-align:right">Dec 4</td>
        </tr>
        <tr>
        	<td style="width:20%">Dineth Hettiarachchi</td>
            <td style="width:60%;">This is a message</td>
            <td style="width:20%; text-align:right">Dec 4</td>
        </tr>
        <tr>
        	<td style="width:20%">Dineth Hettiarachchi</td>
            <td style="width:60%;">This is a message</td>
            <td style="width:20%; text-align:right">Dec 4</td>
        </tr>
      </tbody>
    </table>
</div>
<script>
jQuery(document).ready(function($) {
      $(".clickableRow").click(function() {
            window.document.location = $(this).attr("href");
      });
});
</script>
<?php
	}
	require_once("../template/footer.php");
?>