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

            <form  method="post" action="/index.php?s=/Seq/update">
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
                                            <input type="text" class="form-control text-center" name="seq_id" value="<?php echo ($seqinfo['seq_id']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>测序公司: </label>
                                            <input type="text" class="form-control text-center" name="company" value="<?php echo ($seqinfo['company']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>送样时间: </label>
                                            <input  type="text" readonly class="form-control text-center timeer" name="send_date" value="<?php echo time_format($seqinfo['send_date'],'Y-m-d');?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-inline">
                                            <label>送样备注: </label>
                                            <input size="20" type="text" class="form-control text-center" name="seq_comment" value="备注">
                                        </div>
                                    </div>
                                    <input type="hidden" name="sid" value="<?php echo ($seqinfo['id']); ?>" /> 
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <?php if(is_array($seqlib)): foreach($seqlib as $key=>$seqlib): ?><div class="row">
                            <div class="col-md-12">
                                <div class="bs-callout bs-callout-danger">
                                <h4>文库编号 <?php echo ($seqlib['lib_id']); ?></h4>
                                <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group form-inline">
                                                <label> 文库编号: </label>
                                                <select class="selectpicker" name="lib_id[]" data-hide-disabled="true" data-live-search="true" data-width="210px">
                                                    
                                                    <?php if(($seqlib[lib_id]) == "none"): ?><option value="none" selected>文库不在本数据库</option>
                                                    <?php else: ?>
                                                        <option value="none">文库不在本数据库</option><?php endif; ?>
                                                    <?php if(is_array($library)): foreach($library as $key=>$obj): if(($obj['lib_id']) == $seqlib['lib_id']): ?><option value="<?php echo ($obj["lib_id"]); ?>" selected>文库ID: <?php echo ($obj["lib_id"]); ?> -- 描述：<?php echo ($obj["description"]); ?></option>
                                                        <?php else: ?>
                                                        <option value="<?php echo ($obj["lib_id"]); ?>">文库ID: <?php echo ($obj["lib_id"]); ?> -- 描述：<?php echo ($obj["description"]); ?></option><?php endif; endforeach; endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-inline">
                                                <label>测序平台: </label>
                                                <input type="text" class="form-control text-center" name="platform[]" value="<?php echo ($seqlib['platform']); ?>" size = "24">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-inline">
                                                <label>测序类型: </label>
                                                <input type="text" class="form-control text-center" name="seqtype[]" value="<?php echo ($seqlib['seqtype']); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-inline">
                                                <label>送样量: </label>
                                                <input type="text" class="form-control text-center" name="lib_volume[]" value="<?php echo ($seqlib['lib_volume']); ?>"> uL
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-inline">
                                                <label>公司Qubit2.0质检浓度: </label>
                                                <input type="text" class="form-control text-center" name="conc_qubit[]" value="<?php echo ($seqlib['conc_qubit']); ?>" size="12"> ng/uL
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-inline">
                                                <label>公司qPCR质检浓度: </label>
                                                <input type="text" class="form-control text-center" name="conc_qpcr[]" value="<?php echo ($seqlib['conc_qpcr']); ?>" size="11"> nM
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group form-inline">
                                                <label>公司2100测得峰值: </label>
                                                <input type="text" class="form-control text-center" name="peak[]" value="<?php echo ($seqlib['peak']); ?>" size="9" > bp
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-inline">
                                                <label>备注 : </label>
                                                <input size="28" type="text" class="form-control text-center" name="comment[]" value="<?php echo ($seqlib['comment']); ?>">
                                            </div>
                                        </div>
                                        <input type="hidden" name="seqlib_id[]" value="<?php echo ($seqlib['id']); ?>" /> 
                                    </div>
                                </div>
                            </div>
                        </div><?php endforeach; endif; ?>

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