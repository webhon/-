<html> 
<head> 
<meta http-equiv="content-type" content="text/html; charset=euc-kr"> 
<title>ȸ���α���</title> 
<link rel="stylesheet" type="text/css" href="bbs.css">
<script language="javascript">
	function goLite(FRM,BTN){
	   window.document.forms[FRM].elements[BTN].style.backgroundColor = "#AAAAAA";
	}

	function goDim(FRM,BTN){
	   window.document.forms[FRM].elements[BTN].style.backgroundColor = "#EEEEEE";
	}
</script>
<script language="javascript">
	// ��Ű�� ���� �����ϴ� �Լ�
	function setCookie (name, value, expires) {
		document.cookie = name + "=" + escape (value) + "; path=/; expires=" + expires.toGMTString();
	}

	// ��Ű���� ���� �о���� �Լ�
	function getCookie(Name) {
		var search = Name + "="
		if (document.cookie.length > 0) {
			// ��Ű�� �����Ǿ� �ִٸ�
			offset = document.cookie.indexOf(search)
			if (offset != -1) {
				// ��Ű�� �����ϸ�
				offset += search.length
				// set index of beginning of value
				end = document.cookie.indexOf(";", offset)
				// ��Ű ���� ������ ��ġ �ε��� ��ȣ ����
				if (end == -1)
					end = document.cookie.length
				return unescape(document.cookie.substring(offset, end))
			}
		}
		return "";
	}

	// ��Ű�� ������ ȸ�� ID�� �غ��ϴ� �Լ�
	// save_flag�� true�̸� ��Ű�� �����ϰ�
	// save_flag�� false�̸� ��Ű���� �����Ѵ�.
	function saveid(memberid, save_flag){
		var expdate = new Date();
		// �⺻������ 30�ϵ��� ����ϰ� ��. �ϼ��� �����Ϸ��� * 30���� ���ڸ� �����ϸ� ��
		if (save_flag){
			expdate.setTime(expdate.getTime() + 1000 * 3600 * 24 * 30); // 30��
		}else{
			expdate.setTime(expdate.getTime() - 1);      // ��Ű ��������
		}
		setCookie("memberid", memberid, expdate);
	}

	// ��Ű�� ����� ȸ�� ID�� �����´�.
	function getid(){
		return getCookie("memberid");
	}

	function initializeMemberID(){
		var memberid = getid();
		// ��Ű�� ����� ȸ�� ID�� ������ �����Ѵ�.
		if(memberid=="") return;

		document.forms['edit_form'].memberid.value = memberid;
		document.forms['edit_form'].rememberme.checked = true;
	}
</script>
<script language="javascript"> 
	function check_submit() { 
		if (document.edit_form.memberid.value == "") { 
			alert('ȸ�� ID�� �ݵ�� �Է��ϼž� �մϴ�.'); 
			document.edit_form.memberid.focus(); 
			return; 
		}else if (document.edit_form.memberpass.value == "") { 
			alert('ȸ�� ��й�ȣ�� �ݵ�� �Է��ϼž� �մϴ�.'); 
			document.edit_form.memberpass.focus(); 
			return;
		} else { 
			document.edit_form.action = "member_verify.php"; 
			document.edit_form.submit(); 
		} 
	} 
</script> 
</head> 
  
<body onLoad="initializeMemberID()" bgcolor="white" text="black" link="blue" vlink="purple" alink="red"> 
<table align="center" border="0" cellspacing="0" cellpadding="5" width="400">
<tr><th align="center">
	<font size="2">ȸ�� �α���</font>
	<hr size="1" color="gray" width="100%">
</td></tr>
</table>
<table align="center" border="1" cellspacing="0" cellpadding="5" width="400" bordercolordark="white" bordercolorlight="#CCCCCC"> 
<form name="edit_form" method="post"> 
	<tr> 
		<th bgcolor="#EEEEEE"><p align="center">ȸ�� ID</p></th> 
		<td><input type="text" name="memberid" maxlength="8" style="width:100px"></td>
	</tr> 
	<tr> 
		<th bgcolor="#EEEEEE"><p align="center">��й�ȣ</p></th> 
		<td><input type="password" name="memberpass" maxlength="8" style="width:100px"></td>
	</tr> 
	<tr> 
		<td bgcolor="#EEEEEE" colspan="2">
			<input type="checkbox" name="rememberme" id="rememberme" onClick="saveid(this.form.memberid.value, this.checked)"><label for="rememberme">���� ID ����ϱ�</label>
		</td>
	</tr>
</form>
</table>
<table border=0 width=400 align="center" >
<form name="btn_form">
	<tr><td align="right">
		<input type="button" name="btn_apply" class="ahnbutton" value="�α���" title="" onMouseOver="goLite(this.form.name,this.name)" onMouseOut="goDim(this.form.name,this.name)" onClick="check_submit();">
		<input type="button" name="btn_cancel" class="ahnbutton" value="���" title="" onMouseOver="goLite(this.form.name,this.name)" onMouseOut="goDim(this.form.name,this.name)" onClick="history.back()">

		&nbsp; &nbsp;
		<input type="button" name="btn_memberapply" class="ahnbutton" value="ȸ������" title="" onMouseOver="goLite(this.form.name,this.name)" onMouseOut="goDim(this.form.name,this.name)" onClick="location.href='member_apply.php'">
	</td></tr>
</form>
</table>
</body> 
</html>