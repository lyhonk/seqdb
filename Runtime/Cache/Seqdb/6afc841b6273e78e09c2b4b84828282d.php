<?php if (!defined('THINK_PATH')) exit();?><FORM method="post" action="/ot/seqdb.php?s=/Library/test">
seq id<INPUT type="text" name="seq_id"/><br/>
<select  name="select[]" multiple="multiple">
  <option value = "1" selected/>1</option>
  <option value = "2">2</option>
  <option value = "3">3</option>
  <option value = "4" selected/>4</option>
</select>
<br>
<INPUT type="submit" name="submit" value="提交">
</FORM>