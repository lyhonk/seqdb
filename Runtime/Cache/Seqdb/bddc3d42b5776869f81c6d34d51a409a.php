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
            <a class="btn btn-primary btn-lg" style="margin-top: 30px;" href="/index.php?s=/Data/index" role="button">返回数据列表</a>
        </div>
        <div class="col-md-12">
            <table id="datatable" class="table table-hover table-striped table-bordered " cellspacing="0" width="100%">
                <thead>
                    <tr><th class="text-center">项目</th><th class="text-center">描述</th></tr>
                </thead>             
                <tbody class="text-center" >
                    <tr><td>数据编号</td><td>DataID: <?php echo ($data['data_id']); ?></td></tr>
                    <?php if(($data['seq_id']) == "00"): ?><tr><td>送样编号</td><td>未收录</td></tr>
                    <?php else: ?>
                        <tr><td>送样编号</td><td><a href="<?php echo get_seqinfo($data['seq_id']);?>">SeqID: <?php echo ($data['seq_id']); ?></a></td></tr><?php endif; ?>

                    <?php if(($data['lib_id']) == "00"): ?><tr><td>文库编号</td><td>未收录</td></tr>
                    <?php else: ?>
                        <tr><td>文库编号</td><td><a href="<?php echo get_libinfo($data['lib_id']);?>">LibID: <?php echo ($data['lib_id']); ?></a> </td></tr><?php endif; ?>

                    <?php if(($data['sample_id']) == "00"): ?><tr><td>样本编号</td><td>未收录</td></tr>
                    <?php else: ?>
                        <tr><td>样本编号</td><td><a href="<?php echo get_sampleinfo($data['sample_id']);?>">SampleID: <?php echo ($data['sample_id']); ?></a>--- <?php echo ($data['sampleid']); ?> </td></tr><?php endif; ?>
                    
                    <tr><td>原文件名</td><td><?php echo ($data['origin_name']); ?></td></tr>
                    <tr><td>新文件名</td><td><?php echo ($data['new_name']); ?></td></tr>
                    <tr><td>md5</td><td><?php echo ($data['md5']); ?></td></tr>
                    <tr><td>读长</td><td><?php echo ($data['read_length']); ?> bp</td></tr>
                    <tr><td>行数</td><td><?php echo ($data['line_number']); ?></td></tr>
                    <tr><td>数据量</td><td><?php echo ($data['amount']); ?> G</td></tr>
                    <tr><td>是否为原始数据</td>
                        <td>
                            <?php switch($data['is_raw']): case "0": ?>Raw Data<?php break;?>
                                <?php case "1": ?>Clean Data<?php break; endswitch;?></td>
                        </td>
                    </tr>
                    <tr><td>Read状态</td>
                        <td>
                        <?php switch($obj['read_order']): case "1": ?>Read 1<?php break;?>
                            <?php case "2": ?>Read 2<?php break;?>
                            <?php case "3": ?>Single End<?php break; endswitch;?></td>
                    </tr>
                    <tr><td>样品名称</td><td><?php echo ($data['sample_name']); ?></td></tr>
                    <tr><td>样品类型</td><td><?php echo ($data['sample_type']); ?></td></tr>
                    <tr><td>测序类型</td><td><?php echo ($data['seqtype']); ?></td></tr>
                    <tr><td>测序平台</td><td><?php echo ($data['platform']); ?></td></tr>
                    <tr><td>云存储路径</td><td><?php echo ($data['cloudpath']); ?></td></tr>
                    <tr><td>本地存储路径</td><td><?php echo ($data['localpath']); ?></td></tr>
                    <tr><td>创建时间</td><td><?php echo time_format($data['create_time'],"Y-m-d");?></td></tr>
                    <tr><td>更新时间</td><td><?php echo time_format($data['update_time'],"Y-m-d");?></td></tr>
                    <tr><td>操作人员</td><td><?php echo get_nickname($data['operator']);?></td></tr>
                    <tr><td>备注</td><td><?php echo ($data['comment']); ?></td></tr>
                    
                </tbody>
            </table>
        </div>
        
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <a class="btn btn-primary" style="margin-top: 30px;" href="/index.php?s=/Data/update/sid/<?php echo ($data['id']); ?>" role="button" target="_blank">修改文库信息</a>
            <a class="btn btn-primary" style="margin-top: 30px; margin-left: 30px;" href="/index.php?s=/Data/del/sid/<?php echo ($data['id']); ?>" role="button" target="_blank">删除此文库</a>
            <a class="btn btn-primary" style="margin-top: 30px; margin-left: 30px;" href="/index.php?s=/Data/index" role="button">返回文库列表</a>
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
    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function() {
            $('#datatable').DataTable({paging: false,ordering:  false
        });
        } );
    </script>
    </body>
</html>