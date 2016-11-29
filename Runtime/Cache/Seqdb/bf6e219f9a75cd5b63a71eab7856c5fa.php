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

            <form  method="post" action="/index.php?s=/Sample/update/sid/<?php echo ($sample['id']); ?>">
                <fieldset id="InputsWrapper">
                    <legend><strong>修改样品信息</strong></legend>
                    <div class="row"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bs-callout bs-callout-info">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label> 样品编号: </label>
                                            <input type="text" class="form-control" name="sampleid" value="<?php echo ($sample['sampleid']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>样品类型: </label>
                                            <input type="text" class="form-control" name="type" value="<?php echo ($sample['type']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>样品来源: </label>
                                            <input type="text" class="form-control" name="source" value="<?php echo ($sample['source']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>样品名称: </label>
                                            <input type="text" class="form-control" name="name" value="<?php echo ($sample['name']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>样品描述: </label>
                                            <input type="text" class="form-control" name="description" value="<?php echo ($sample['description']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>提取时间：</label>
                                            <input size="19" type="text" readonly class="form-control timeer" name="obtain_time" value="<?php echo time_format($sample['obtain_time'],"Y-m-d");?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>剩余样品量: </label>
                                            <input type="text" class="form-control" name="remain" value="<?php echo ($sample['remain']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>核酸类型: </label>
                                            <input type="text" class="form-control" name="nucleic_acid" value="<?php echo ($sample['nucleic_acid']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>提取方法: </label>
                                            <input type="text" class="form-control" name="method" value="<?php echo ($sample['method']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>核酸浓度：</label>
                                            <input type="text" class="form-control" name="concentration" value="<?php echo ($sample['concentration']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>核酸总体积: </label>
                                            <input type="text" class="form-control" name="amount" value="<?php echo ($sample['amount']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>核酸质量: </label>
                                            <input type="text" class="form-control" name="mass" value="<?php echo ($sample['mass']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>使用体积：</label>
                                            <input type="text" class="form-control" name="used_volume" value="<?php echo ($sample['used_volume']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>使用质量：</label>
                                            <input type="text" class="form-control" name="used_mass" value="<?php echo ($sample['used_mass']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>剩余质量: </label>
                                            <input type="text" class="form-control" name="rest" value="<?php echo ($sample['rest']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label>核酸提取时间: </label>
                                            <input size="32" type="text" readonly class="form-control timeer" name="extraction_data" value="<?php echo time_format($sample['extraction_data'],"Y-m-d");?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label> 备 注:  </label>
                                            <input size="50" type="text" class="form-control" name="comment" value="<?php echo ($sample['comment']); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </fieldset>


                <fieldset>
                    <div class="row">
                            <input type="hidden" name="id" value="<?php echo ($sample['id']); ?>" /> 
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