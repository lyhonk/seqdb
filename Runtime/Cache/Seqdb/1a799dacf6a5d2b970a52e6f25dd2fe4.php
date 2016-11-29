<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>test</title>
    <script src="/ot/Public/Seqdb/js/jquery/1.11.3/jquery.min.js"></script>

</head>
<body>
<select name="seqid" size="1" id="seqid">
    <option>请选择类型</option>
     <?php if(is_array($seqid)): foreach($seqid as $key=>$v): ?><option value="<?php echo ($v['seq_id']); ?>"><?php echo ($v["seq_id"]); ?></option><?php endforeach; endif; ?>
 </select>
 标签：
 <select name="lable" size="1" id="lables">
 </select>
<script type="text/javascript">


$('#seqid').click(function(){
    $(this).change(function(){
            var objectModel = {};
            var   value = $(this).val();
            var   type = $(this).attr('id');
            objectModel[type] =value;
             $.ajax({
                cache:false,
                type:"POST",
                url:"http://localhost/ot/index.php?s=/Data/datareturn",
                dataType:"json",
                data:objectModel,
                timeout:3000,
                error:function(){
                    alert("lable");
                },
                 success:function(data){
                    $("#lables").empty();
                    var count = data.length;
                    var i = 0;
                    var b="";
                    for(i=0;i<count;i++){
                        b+="<option value='"+data[i].lib_id+"'>"+data[i].lib_id+"--"+data[i].seqtype+"</option>";
                    }
                    $("#lables").append(b);
                 }


             });
    });

});

</script>


</body>
</html>