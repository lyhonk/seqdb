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
    <link href="/Public/Seqdb/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Seqdb/css/my.css" rel="stylesheet">
    <link href="/Public/Seqdb/css/lightbox.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="/Public/Seqdb/css/jumbotron.css" rel="stylesheet">
    <link href="/Public/Seqdb/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Seqdb/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/Public/Seqdb/css/datetimepicker.css" rel="stylesheet" type="text/css" >

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/Public/Seqdb/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/Public/Seqdb/js/ie-emulation-modes-warning.js"></script>
    <script src="/Public/Seqdb/js/jquery/1.11.3/jquery.min.js"></script>
    <script src="/Public/Seqdb/js/bootstrap.min.js"></script>

    <link href="/Public/Seqdb/js/skins/square/blue.css" rel="stylesheet">
    <script src="/Public/Seqdb/js/icheck.min.js"></script>
    <script src="/Public/Seqdb/js/lightbox.js"></script>


    <script src="/Public/Seqdb/js/jquery.dataTables.js"></script>
    <script src="/Public/Seqdb/js/dataTables.bootstrap.min.js"></script>
    <script src="/Public/Seqdb/js/bootstrap-select.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="/Public/Seqdb/js/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="/Public/Seqdb/js/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo U('Index/index');?>">SeqDB</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php if((CONTROLLER_NAME) == "Sample"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Sample/index');?>">样本管理</a></li>
                <li <?php if((CONTROLLER_NAME) == "Library"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Library/index');?>">文库管理</a></li>
                <li <?php if((CONTROLLER_NAME) == "Seq"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Seq/index');?>">送样管理</a></li>
                <li <?php if((CONTROLLER_NAME) == "Data"): ?>class="active"<?php endif; ?>><a href="<?php echo U('Data/index');?>">数据管理</a></li>
                <?php if(is_administrator()): ?><li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">系统管理<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo U('Sys/index');?>">用户管理</a></li>
                            <li><a href="<?php echo U('Sys/index');?>">日志管理</a></li>
                        </ul>
                    </li><?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Hello <?php echo get_nickname(is_login());?> !<span class="caret"></span></a>
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

            <form  method="post" action="/index.php?s=/Data/add">
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
                                                <input type="text" class="form-control text-center" name="data_id" placeholder="Data ID" size="10">
                                            </div>
                                    </div>

                                    <div class="col-md-3">
                                            <div class="form-group form-inline">
                                                <label> 序列读长: </label>
                                                <input type="text" class="form-control text-center" name="read_length" placeholder="Read Length" size="10">
                                            </div>
                                    </div>

                                    <div class="col-md-3">
                                            <div class="form-group form-inline">
                                                <label> 文件行数: </label>
                                                <input type="text" class="form-control text-center" name="line_number" placeholder="line number" size="10">
                                            </div>
                                    </div>

                                    <div class="col-md-3">
                                            <div class="form-group form-inline">
                                                <label> MD5 值 : </label>
                                                <input type="text" class="form-control text-center" name="md5" placeholder="line number" size="10">
                                            </div>
                                    </div>
 
                                    <div class="col-md-6">
                                            <div class="form-group form-inline">
                                                <label> 文件原名: </label>
                                                <input type="text" class="form-control text-center" name="origin_name" placeholder="origin name" size="50">
                                            </div>
                                    </div>

                                    <div class="col-md-6">
                                            <div class="form-group form-inline">
                                                <label> 新文件名: </label>
                                                <input type="text" class="form-control text-center" name="new_name" placeholder="new name" size="50">
                                            </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>送样编号: </label>
                                            <select class="selectpicker" name="seq_id" data-hide-disabled="true" data-live-search="true" title="请选择样本来源" data-width="200px" id="seqid">
                                                <option value="00" >送样信息不在本数据库</option>
                                                <?php if(is_array($seqinfo)): foreach($seqinfo as $key=>$obj): ?><option value="<?php echo ($obj['seq_id']); ?>"><?php echo ($obj['seq_id']); ?></option><?php endforeach; endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>样本编号: </label>
                                            <select class="selectpicker" name="lib_id" data-hide-disabled="true" data-live-search="true" title="请选择样本来源" data-width="200px" id="libid">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>样品编号: </label>
                                            <select class="selectpicker" disabled="true" name="sample_id" data-hide-disabled="true" data-live-search="true" data-width="200px" id="sampleid">
                                            <option value="0" selected>样品未在数据库</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group form-inline">
                                            <label>文件状态: </label>
                                            <select class="selectpicker" name="is_raw" data-hide-disabled="true" title="是否为rawdata" data-width="150px">
                                                <option value="0">Raw data</option>
                                                <option value="1">Clean data</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group form-inline">
                                            <label>read状态: </label>
                                            <select class="selectpicker" name="read_order" data-hide-disabled="true" title="Read order" data-width="150px">
                                                <option value="1">Read 1</option>
                                                <option value="2">Read 2</option>
                                                <option value="3">Single end</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                            <div class="form-group form-inline">
                                                <label> 云上存储: </label>
                                                <input type="text" class="form-control text-center" name="cloudpath" placeholder="cloud path" size="15">
                                            </div>
                                    </div>

                                    <div class="col-md-3">
                                            <div class="form-group form-inline">
                                                <label> 本地存储: </label>
                                                <input type="text" class="form-control text-center" name="localpath" placeholder="local path" size="15">
                                            </div>
                                    </div>

                                    <div class="col-md-12">
                                            <div class="form-group form-inline">
                                                <label> 备注信息: </label>
                                                <input type="text" class="form-control text-center" name="comment" placeholder="备注">
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </fieldset>


                <fieldset>
                    <div class="row">
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
    <script src="/Public/Seqdb/js/ie10-viewport-bug-workaround.js"></script>
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
                                $('#libid').append("<option value='00' selected> 文库未在本数据库 </option>");
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
                                $('#sampleid').append("<option value='0' selected> 样本未在本数据库 </option>");
                                $("#sampleid").selectpicker('refresh');
                            }else{
                                $("#sampleid").empty();
                                for (var i = 0; i < data.length; i++) {
                                    $('#sampleid').append("<option value='"+data[i].sample_id+"'>"+data[i].sample_id+"</option>");
                                }
                                $("#sampleid").selectpicker('refresh');
                            }
                         }
                     });            
        });
    </script>
    </body>
</html>