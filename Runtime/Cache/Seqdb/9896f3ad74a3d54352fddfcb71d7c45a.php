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
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4><b>送样概况</b></h4>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-primary btn-block" style="margin-top: 5px;">送样编号：<?php echo ($seq['seq_id']); ?> </button>
                        </div>

                        <div class="col-md-4">
                            <button type="button" class="btn btn-primary btn-block" style="margin-top: 5px;">测序公司：<?php echo ($seq['company']); ?> </button>
                        </div>

                        <div class="col-md-4">
                            <button type="button" class="btn btn-primary btn-block" style="margin-top: 5px;">送样时间：<?php echo time_format($seq['send_date'],"Y-m-d");?></button>
                        </div>

                        <?php if(!empty($seq['comment'])): ?><div class="col-md-12">
                            <button type="button" class="btn btn-warning btn-block" style="margin-top: 20px;">备注信息：<?php echo ($seq['comment']); ?></button>
                        </div><?php endif; ?>
                     
                        <div class="col-md-12" style="margin-top: 20px;">
                            <table id="datatable" class="table table-hover table-striped table-bordered " cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">文库编号</th>
                                        <th class="text-center">测序平台</th>
                                        <th class="text-center">测序类型</th>
                                    </tr>
                                </thead>             
                                <tbody class="text-center" >
                                    <?php if(is_array($seqlibinfo)): foreach($seqlibinfo as $key=>$info): ?><tr><td><a href="<?php echo get_libinfo($info['lib_id']);?>"><?php echo ($info['lib_id']); ?></a></td><td><?php echo ($info['platform']); ?></td><td><?php echo ($info['seqtype']); ?></td></tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>

            <?php if(is_array($seqlibinfo)): foreach($seqlibinfo as $key=>$info): ?><div class="col-md-12">
                <div class="bs-callout bs-callout-info">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-inline">
                                <label> 文库编号: </label>
                                <input type="text" readonly class="form-control text-center" value="<?php echo ($info['lib_id']); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-inline">
                                <label> 测序平台: </label>
                                <input type="text" readonly class="form-control text-center" value="<?php echo ($info['platform']); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-inline">
                                <label> 测序类型: </label>
                                <input type="text" readonly class="form-control text-center" value="<?php echo ($info['seqtype']); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-inline">
                                <label> 送样体积: </label>
                                <input type="text" readonly class="form-control text-center" value="<?php echo ($info['lib_volume']); ?>" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-inline">
                                <label> 公司Qubit质检浓度 : </label>
                                <input type="text" readonly class="form-control text-center" value="<?php echo ($info['conc_qubit']); ?> (ng/uL)" size="10">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-inline">
                                <label> 公司qPCR质检浓度 : </label>
                                <input type="text" readonly class="form-control text-center" value="<?php echo ($info['conc_qpcr']); ?> (nM)" size="10">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-inline">
                                <label> 2100检测峰值 : </label>
                                <input type="text" readonly class="form-control text-center" value="<?php echo ($info['peak']); ?> bp" size="15">
                            </div>
                        </div>

                        <?php if(!empty($info['comment'])): ?><div class="col-md-8">
                            <div class="form-group form-inline">
                                <label> 备注 : </label>
                                <input type="text" readonly class="form-control text-center" value="<?php echo ($info['comment']); ?>" size="77">
                            </div>
                        </div><?php endif; ?>
                    </div>
                </div>
            </div><?php endforeach; endif; ?>

            <div class="col-md-12">
                <a class="btn btn-primary pull-right" href="/index.php?s=/Seq/index" role="button">返回送样列表</a>
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
    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function() {
            $('#datatable').DataTable({paging: false,ordering:  false
        });
        } );
    </script>
    </body>
</html>