<?php
/*******************************************************************************
opyright 2001, 2004 Wedge Community Co-op

    This file is part of IS4C.

    IS4C is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    IS4C is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    in the file license.txt along with IS4C; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*********************************************************************************/
?>
<BODY onLoad='document.form.reginput.focus();'>
<TABLE background='graphics/is4c_login.gif' border='0' cellpadding='0' cellspacing='0'>
<TR><TD height='40' width='100' valign='center' bgcolor='#96C8ED' align='center'>
<FONT face='arial' color='white' size='-1'><B>I S 4 C</B></FONT>
</TD>
<TD height='40' width='540' valign='bottom' align='right'>
<FONT face='arial' size='-2'>
&nbsp; P F C &nbsp; D E V E L O P M E N T &nbsp; V E R S I O N &nbsp; 0.314a</B></FONT>
</TD>
</TR>

<TR><TD height='1' width='640' colspan='2' bgcolor='black'></TD></TR>
<TR>
<TD height='20' width='100' align='center' bgcolor='#FFCC00'>
<FONT face='arial' size='-1' color='black'><B>L O G I N</B></FONT>
</TD>
<TD></TD>
</TR>

<TR>
<TD height='300' width='640' align='center' colspan='2' valign='center'>
	<TABLE border='0' cellpadding='0' cellspacing='0'>
		<TR>
		<TD height='150' width='260' valign='center' align='center'>
			<CENTER>
			<FORM name='form' method='post' autocomplete='off' action='authenticate.php'>
			<INPUT Type='password' name='reginput' size='20' tabindex='0' onblur='document.form.reginput.focus();'>

			<P><FONT face='arial' color='red'>
			<b>INVALID PASSWORD</b></FONT>
			</FORM>
			</B></FONT></CENTER>
		</TD>
		</TR>
	</TABLE>
</TD></TR>

<TR><TD width='640' height='50' colspan='2' align='right'>
	&nbsp;
</TD></TR>
</TABLE>
<FORM name='hidden'>
<INPUT Type='hidden' name='alert' value='noScan'>
</FORM>

</BODY>
