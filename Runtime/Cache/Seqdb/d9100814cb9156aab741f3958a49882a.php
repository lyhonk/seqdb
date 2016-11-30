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
            <div class="col-md-6">
                <h1>测序文件</h1>
            </div>

            <div class="col-md-6">
                <a class="btn btn-info pull-right" style="margin-top: 30px;" href="/index.php?s=/Data/add" role="button" target="_blank">添加测序文件</a>
            </div>
            <div class="col-md-12"><hr></div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <table id="datatable" class="table table-hover table-striped table-bordered " cellspacing="0" width="100%">
                        
                        <thead>
                            <tr>
                            <th class="text-center">数据编号</th>
                            <th class="text-center">样品名称</th>
                            <th class="text-center">样品类型</th>
                            <th class="text-center">测序类型</th>
                            <th class="text-center">测序平台</th>
                            <th class="text-center">数据读长</th>
                            <th class="text-center">数据量</th>
                            <th class="text-center">数据类型</th>
                            <th class="text-center">数据备注</th>
                            <th class="text-center">操作</th>
                            </tr>
                        </thead>
                        
                        <tbody class="text-center" >
                            <?php if(is_array($data)): foreach($data as $key=>$obj): ?><tr>
                                <td><?php echo ($obj['data_id']); ?></td>
                                <td><?php echo ($obj['sample_name']); ?></td>
                                <td><?php echo ($obj['sample_type']); ?></td>
                                <td><?php echo ($obj['seqtype']); ?></td>
                                <td><?php echo ($obj['platform']); ?></td>
                                <td><?php echo ($obj['read_length']); ?> bp</td>
                                <td><?php echo round($obj['amount'],3);?>G</td>
                                <td>
                                    <?php switch($obj['is_raw']): case "0": ?>Raw<?php break;?>
                                        <?php case "1": ?>Clean<?php break; endswitch;?> | 
                                    <?php switch($obj['read_order']): case "1": ?>R1<?php break;?>
                                        <?php case "2": ?>R2<?php break;?>
                                        <?php case "3": ?>SE<?php break; endswitch;?>
                                <td><?php echo ($obj['comment']); ?></td>
                                <td><a href="/index.php?s=/Data/detail/sid/<?php echo ($obj["id"]); ?>">详情</a> |<a href="/index.php?s=/Data/update/sid/<?php echo ($obj["id"]); ?>">修改</a> | <a href="/index.php?s=/Data/del/sid/<?php echo ($obj["id"]); ?>">删除</a></td>
                            </tr><?php endforeach; endif; ?>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>



        <div class="container">
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
                $('#datatable').DataTable({"order":[[0,"desc"]],
            });
            } );
        </script>
    </body>
</html>