<table width="165" style="border:1px solid;">
	<tr>
		<td colspan="2">ยิ้มวันละนิดจิตแจ่มใส</td>
	</tr>
	<tr>
	    <td width="165" height="200" valign="top" colspan="2">
		<div style="width:160;height:200;padding:3px;overflow:auto;border:1px solid #999999;">
		<span id="mySpan"></span>
	    </div>
		
		</td>
	</tr>
	<?php
		if($_SESSION['status']=="01"){
			?>
			<form action="" method="post" name="frmMain" id="frmMain">
			<tr>
				<td colspan="2" height="22" valign="top"></td>
			</tr>
			<tr>
				<td colspan="2"><textarea name="txtMessage" id="txtMessage"style="width:99%;border:1px solid;"></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><a href="javascript:add_pic('-_-')"><img src="images/icons/blank.gif" border="0"/></a>&nbsp;<a href="javascript:add_pic('O-O')"><img src="images/icons/eek.gif" border="0"/></a>&nbsp;<a href="javascript:add_pic('^-^')"><img src="images/icons/grin.gif" border="0"/></a>&nbsp;<a href="javascript:add_pic('^<^')"><img src="images/icons/lol.gif" border="0"/></a>&nbsp;<a href="javascript:add_pic('-:-')"><img src="images/icons/roll.gif" border="0"/></a>&nbsp;<a href="javascript:add_pic('-o-')"><img src="images/icons/smile.gif" border="0"/></a>&nbsp;<br /><a href="javascript:add_pic(':@')"><img src="images/icons/evil.gif" border="0"/></a>&nbsp;<a href="javascript:add_pic('555')"><img src="images/icons/555.gif" border="0"/></a>&nbsp;<a href="javascript:add_pic('T-T')"><img src="images/icons/blue.gif" border="0"/></a>&nbsp;<a href="javascript:add_pic(':-)')"><img src="images/icons/smokin.gif" border="0"/></a>&nbsp;<a href="javascript:add_pic(':D')"><img src="images/icons/tasty.gif" border="0"/></a></td>
			</tr>
			<tr>
				<td height="22" valign="top">&nbsp;</td>
				<td><input name="btnSend" type="button" id="btnSend" value="ฝากข้อความ" onClick="JavaScript:doCallAjax();" style="border:1px solid;"></td>
			</tr>
		<?php
		}
		?>
		</form>
</table>