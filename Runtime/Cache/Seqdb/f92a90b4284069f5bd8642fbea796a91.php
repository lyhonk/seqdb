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

            <form  method="post" action="/index.php?s=/Seq/add">
                <fieldset id="InputsWrapper">
                    <legend><strong>送样信息</strong></legend>

                    <div class="row"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bs-callout bs-callout-info">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label> 送样编号: </label>
                                            <input type="text" class="form-control" name="seq_id" placeholder="1" value="1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>测序公司: </label>
                                            <input type="text" class="form-control" name="company" placeholder="测序公司">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>送样时间: </label>
                                            <input  type="text" readonly class="form-control timeer" name="send_date" placeholder="建库时间">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-inline">
                                            <label>送样备注: </label>
                                            <input size="24" type="text" class="form-control" name="seq_comment" placeholder="备注">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <a class="btn btn-info pull-right" style="margin-right: 30px;" href="#" role="button" id="AddMoreFileBox">添加一个文库</a>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="bs-callout bs-callout-danger">
                            <h4>文库序号 1</h4>
                            <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label> 文库编号: </label>
                                            <select class="selectpicker" name="lib_id[]" data-hide-disabled="true" data-live-search="true" title="请选择文库来源" data-width="210px">
                                                <option value="none">文库不在本数据库</option>
                                                <?php if(is_array($lib)): foreach($lib as $key=>$obj): ?><option value="<?php echo ($obj["lib_id"]); ?>">文库ID: <?php echo ($obj["lib_id"]); ?> -- 描述：<?php echo ($obj["description"]); ?></option><?php endforeach; endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>测序平台: </label>
                                            <input type="text" class="form-control" name="platform[]" placeholder="seq platform" size = "24">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>测序类型: </label>
                                            <input type="text" class="form-control" name="seqtype[]" placeholder="Seqtype">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>送样量: </label>
                                            <input type="text" class="form-control" name="lib_volume[]" placeholder="送样量">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>公司Qubit2.0质检浓度: </label>
                                            <input type="text" class="form-control" name="conc_qubit[]" placeholder="Conc. By Qubit2.0" size="12">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>公司qPCR质检浓度: </label>
                                            <input type="text" class="form-control" name="conc_qpcr[]" placeholder="Conc. By qPCR" size="11">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>公司2100测得峰值: </label>
                                            <input type="text" class="form-control" name="peak[]" placeholder="peak by 2100" size="9" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label>备注 : </label>
                                            <input size="28" type="text" class="form-control" name="comment[]" placeholder="备注">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <a class="btn btn-danger btn-xs pull-right removeclass" style="margin-right: 30px;" href="#" role="button">删除</a>
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
    <script src="/Public/Seqdb/js/bootstrap-datetimepicker.min.js"></script>
    <script>  

    $(document).ready(function() {  
      
    var MaxInputs       = 8; //maximum input boxes allowed  
    var InputsWrapper   = $("#InputsWrapper"); //Input boxes wrapper ID  
    var AddButton       = $("#AddMoreFileBox"); //Add button ID  
      
    var x = InputsWrapper.length; //initlal text box count  
    var FieldCount=1; //to keep track of text box added  
      
    $(AddButton).click(function (e)  //on add input button click  
    {  
            if(x <= MaxInputs) //max input box allowed  
            {  
                FieldCount++; //text box added increment  
                //add input box  

                $(InputsWrapper).append('<div class="row"><div class="col-md-12"><div class="bs-callout bs-callout-danger"><h4>文库序号 '+ FieldCount +'</h4><hr><div class="row"><div class="col-md-4"><div class="form-group form-inline"><label> 文库编号: </label><select class="selectpicker" name="lib_id[]" data-hide-disabled="true" data-live-search="true" title="请选择文库来源" data-width="210px"><option value="none">文库不在本数据库</option><?php if(is_array($lib)): foreach($lib as $key=>$obj): ?><option value="<?php echo ($obj["lib_id"]); ?>">文库ID: <?php echo ($obj["lib_id"]); ?> -- 描述：<?php echo ($obj["description"]); ?></option><?php endforeach; endif; ?></select></div></div><div class="col-md-4"><div class="form-group form-inline"><label>测序平台: </label><input type="text" class="form-control" name="platform[]" placeholder="seq platform" size = "24"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>测序类型: </label><input type="text" class="form-control" name="seqtype[]" placeholder="Seqtype"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>送样量: </label><input type="text" class="form-control" name="lib_volume[]" placeholder="送样量"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>公司Qubit2.0质检浓度: </label><input type="text" class="form-control" name="conc_qubit[]" placeholder="Conc. By Qubit2.0" size="12"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>公司qPCR质检浓度: </label><input type="text" class="form-control" name="conc_qpcr[]" placeholder="Conc. By qPCR" size="11"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>公司2100测得峰值: </label><input type="text" class="form-control" name="peak[]" placeholder="peak by 2100" size="9" ></div></div><div class="col-md-6"><div class="form-group form-inline"><label>备注 : </label><input size="28" type="text" class="form-control" name="comment[]" placeholder="备注"></div></div></div><div class="row"><a class="btn btn-danger btn-xs pull-right removeclass" style="margin-right: 30px;" href="#" role="button">删除</a></div></div></div></div>');  
                $(".selectpicker").selectpicker();
                $(".timeer").datetimepicker(
                    {format: 'yyyy-mm-dd', 
                    startView:2, 
                    todayBtn: true, 
                    autoclose: true,
                    minView: 2, 
                    clearBtn:true}
                    ); 
                x++; //text box increment  
            }  
    return false;  
    });  
      
    $("body").on("click",".removeclass", function(e){ //user click on remove text  
            if( x > 1 ) {  
                    $(this).parent('div').parent('div').remove(); //remove text box  
                    x--; //decrement textbox  
            }  
    return false;  
    })   
      
    });  
    </script>
    <script type="text/javascript">
        $(".timeer").datetimepicker(
            {format: 'yyyy-mm-dd', 
            startView:2, 
            todayBtn: true, 
            autoclose: true,
            minView: 2, 
            clearBtn:true}
            );
    </script>

    </body>
</html>