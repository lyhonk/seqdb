<?php if (!defined('THINK_PATH')) exit();?><html lang="zh-CN">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <title>SeqDB</title>

    <!-- Bootstrap core CSS -->
    <link href="/ot/Public/Seqdb/css/bootstrap.min.css" rel="stylesheet">
    <link href="/ot/Public/Seqdb/css/my.css" rel="stylesheet">
    <link href="/ot/Public/Seqdb/css/lightbox.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="/ot/Public/Seqdb/css/jumbotron.css" rel="stylesheet">
    <link href="/ot/Public/Seqdb/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/ot/Public/Seqdb/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/ot/Public/Seqdb/css/datetimepicker.css" rel="stylesheet" type="text/css" >

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/ot/Public/Seqdb/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/ot/Public/Seqdb/js/ie-emulation-modes-warning.js"></script>
    <script src="/ot/Public/Seqdb/js/jquery/1.11.3/jquery.min.js"></script>
    <script src="/ot/Public/Seqdb/js/bootstrap.min.js"></script>

    <link href="/ot/Public/Seqdb/js/skins/square/blue.css" rel="stylesheet">
    <script src="/ot/Public/Seqdb/js/icheck.min.js"></script>
    <script src="/ot/Public/Seqdb/js/lightbox.js"></script>


    <script src="/ot/Public/Seqdb/js/jquery.dataTables.js"></script>
    <script src="/ot/Public/Seqdb/js/dataTables.bootstrap.min.js"></script>
    <script src="/ot/Public/Seqdb/js/bootstrap-select.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="/ot/Public/Seqdb/js/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="/ot/Public/Seqdb/js/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">SedDB</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php if((CONTROLLER_NAME) == "Sample"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Sample/index');?>">样本管理</a></li>
                <li <?php if((CONTROLLER_NAME) == "Library"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Library/index');?>">文库管理</a></li>
                <li <?php if((CONTROLLER_NAME) == "Seq"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Seq/index');?>">送样管理</a></li>
                <li <?php if((CONTROLLER_NAME) == "Data"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Data/index');?>">数据管理</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Hello Jimmy !<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">修改密码</a></li>
                        <li><a href="<?php echo U('Index/logout');?>">退出系统</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        
        <div class="container">
        <p>SeqDB是一个二代测序数据管理系统，可以管理数据相关的样品、文库、送样等相关信息。提供可视化的管理系统。</p>
        </div>

    </div>


    <div class="container">
        <div class="row">
        <div class="col-md-12">

            <form  method="post" action="/ot/index.php?s=/Data/add">
                <fieldset id="InputsWrapper">
                    <legend><strong>数据信息 </strong></legend>

                    <div class="row"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bs-callout bs-callout-info">
                                <legend> 请填写相关信息 </legend>
                                
                                <div class="row">

                                    <div class="col-md-3">
                                            <div class="form-group form-inline">
                                                <label> 数据编号: </label>
                                                <input type="text" class="form-control text-center" name="data_id" value="<?php echo ($data['data_id']); ?>" size="10">
                                            </div>
                                    </div>

                                    <div class="col-md-3">
                                            <div class="form-group form-inline">
                                                <label> 序列读长: </label>
                                                <input type="text" class="form-control text-center" name="read_length" value="<?php echo ($data['read_length']); ?>" size="10">
                                            </div>
                                    </div>

                                    <div class="col-md-3">
                                            <div class="form-group form-inline">
                                                <label> 文件行数: </label>
                                                <input type="text" class="form-control text-center" name="line_number" value="<?php echo ($data['line_number']); ?>" size="10">
                                            </div>
                                    </div>

                                    <div class="col-md-3">
                                            <div class="form-group form-inline">
                                                <label> MD5 值 : </label>
                                                <input type="text" class="form-control text-center" name="md5" value="<?php echo ($data['md5']); ?>" size="10">
                                            </div>
                                    </div>
 
                                    <div class="col-md-6">
                                            <div class="form-group form-inline">
                                                <label> 文件原名: </label>
                                                <input type="text" class="form-control text-center" name="origin_name" value="<?php echo ($data['origin_name']); ?>" size="50">
                                            </div>
                                    </div>

                                    <div class="col-md-6">
                                            <div class="form-group form-inline">
                                                <label> 新文件名: </label>
                                                <input type="text" class="form-control text-center" name="new_name" value="<?php echo ($data['new_name']); ?>" size="50">
                                            </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>送样编号: </label>
                                            <select class="selectpicker" name="seq_id" data-hide-disabled="true" data-live-search="true" title="请选择样本来源" data-width="200px" id="seqid">
                                                <option value="00" >送样信息不在本数据库</option>
                                                <?php if(is_array($seqinfo)): foreach($seqinfo as $key=>$obj): if(($obj['seq_id']) == $data['seq_id']): ?><option value="<?php echo ($obj['seq_id']); ?>" selected><?php echo ($obj['seq_id']); ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo ($obj['seq_id']); ?>"><?php echo ($obj['seq_id']); ?></option><?php endif; endforeach; endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>文库编号: </label>
                                            <select class="selectpicker" name="lib_id" data-hide-disabled="true" data-live-search="true" title="请选择样本来源" data-width="200px" id="libid">
                                            <option value="<?php echo ($data['lib_id']); ?>" selected><?php echo ($data['lib_id']); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>样品编号: </label>
                                            <select class="selectpicker" disabled="true" name="sample_id" data-hide-disabled="true" data-live-search="true" data-width="200px" id="sampleid">
                                            <option value="<?php echo ($data['sample_id']); ?>" selected><?php echo ($data['sample_id']); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group form-inline">
                                            <label>文件状态: </label>
                                            <select class="selectpicker" name="is_raw" data-hide-disabled="true" title="是否为rawdata" data-width="150px">
                                                <?php switch($data['is_raw']): case "0": ?><option value="0" selected>Raw data</option><option value="1">Clean data</option><?php break;?>
                                                    <?php case "1": ?><option value="0">Raw data</option><option value="1" selected>Clean data</option><?php break; endswitch;?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group form-inline">
                                            <label>read状态: <?php echo ($data['read_order']); ?></label>
                                            <select class="selectpicker" name="read_order" data-hide-disabled="true" title="Read order" data-width="150px">
                                                <?php switch($data['read_order']): case "1": ?><option value="1" selected>Read 1</option><option value="2">Read 2</option><option value="3">Single end</option><?php break;?>
                                                    <?php case "2": ?><option value="1">Read 1</option><option value="2" selected>Read 2</option><option value="3">Single end</option><?php break;?>
                                                    <?php case "3": ?><option value="1">Read 1</option><option value="2">Read 2</option><option value="3" selected>Single end</option><?php break; endswitch;?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                            <div class="form-group form-inline">
                                                <label> 云上存储: </label>
                                                <input type="text" class="form-control text-center" name="cloudpath" value="<?php echo ($data['cloudpath']); ?>" size="15">
                                            </div>
                                    </div>

                                    <div class="col-md-3">
                                            <div class="form-group form-inline">
                                                <label> 本地存储: </label>
                                                <input type="text" class="form-control text-center" name="localpath" value="<?php echo ($data['localpath']); ?>" size="15">
                                            </div>
                                    </div>

                                    <div class="col-md-12">
                                            <div class="form-group form-inline">
                                                <label> 备注信息: </label>
                                                <input type="text" class="form-control text-center" name="comment" value="<?php echo ($data['comment']); ?>">
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </fieldset>


                <fieldset>
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo ($data['id']); ?>" /> 
                        <button type="submit" class="btn btn-primary pull-right ">提交</button>
                    </div>
                    
                </fieldset>

            </form>
        </div>
        
        </div>
    </div>


    <div class="container">
        <!-- Example row of columns -->
        
        <hr>

        <footer>
        <p>&copy; Company 2014</p>
        </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/ot/Public/Seqdb/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
        $('#seqid').on('changed.bs.select', function (e) {
            var objectModel = {};
            var   value = $(this).val();
            objectModel["seqid"] =value;
            $.ajax({
                        cache:false,
                        type:"POST",
                        url:"<?php echo U('Data/libinforeturn/','','');?>",
                        dataType:"json",
                        data:objectModel,
                        timeout:3000,
                        error:function(){
                            alert("未能获得文库信息！");
                        },
                         success:function(data){
                            
                            if( data.length === 0){
                                $("#libid").empty();
                                $('#libid').append("<option value='00' selected> 文库未在本数据库 </option>");
                                $('#libid').prop('disabled', true); 
                                $("#libid").selectpicker('refresh');
                                $("#sampleid").empty();
                                $('#sampleid').append("<option value='00' selected> 样品未在本数据库 </option>");
                                $('#sampleid').prop('disabled', true); 
                                $("#sampleid").selectpicker('refresh');
                            }else{
                                $("#libid").empty();
                                for (var i = 0; i < data.length; i++) {
                                    $('#libid').append("<option value='"+data[i].lib_id+"'>"+data[i].lib_id+"--"+data[i].seqtype+"</option>");
                                }
                                $('#libid').prop('disabled', false);
                                $("#libid").selectpicker('refresh');
                            }                            
                         }
                     });            
        });

        $('#libid').on('changed.bs.select', function (e) {
            var objectModel = {};
            var   value = $(this).val();
            objectModel["libid"] =value;
            $.ajax({
                        cache:false,
                        type:"POST",
                        url:"<?php echo U('Data/sampleinforeturn/','','');?>",
                        dataType:"json",
                        data:objectModel,
                        timeout:3000,
                        error:function(){
                            alert("未能获得文库信息！");
                        },
                         success:function(data){
                            $("#sampleid").empty();
                            if( data.length === 0){
                                $("#sampleid").empty();
                                $('#sampleid').append("<option value='00' selected> 样本未在本数据库 </option>");
                                $("#sampleid").selectpicker('refresh');
                            }else{
                                $("#sampleid").empty();
                                for (var i = 0; i < data.length; i++) {
                                    $('#sampleid').append("<option value='"+data[i].lib_id+"'>"+data[i].lib_id+"--"+data[i].seqtype+"</option>");
                                }
                                $("#sampleid").selectpicker('refresh');
                            }
                         }
                     });            
        });
    </script>
    </body>
</html>