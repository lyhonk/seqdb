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

            <form  method="post" action="/ot/index.php?s=/Library/update/sid/<?php echo ($sample['id']); ?>">
                <fieldset id="InputsWrapper">
                    <legend><strong>修改文库信息</strong></legend>
                    <div class="row"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bs-callout bs-callout-info">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label> 文库编号: </label>
                                            <input type="text" class="form-control" name="lib_id" value="<?php echo ($library['lib_id']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label> 文库描述: </label>
                                            <input type="text" class="form-control" name="description" value="<?php echo ($library['description']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label> 建库试剂: </label>
                                            <input type="text" class="form-control" name="kit" value="<?php echo ($library['kit']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>样品编号: </label>
                                            <select class="selectpicker" name="sample_id" data-hide-disabled="true" data-live-search="true" title="请选择样本来源">
                                                <option value="none">样本不在本数据库</option>
                                                <?php if(is_array($sampleid)): foreach($sampleid as $key=>$sample): if(($$sample['sampleid']) == $library['sampleid']): ?><option value="<?php echo ($sample['sampleid']); ?>" selected>Sample ID:<?php echo ($sample['sampleid']); ?> Type:<?php echo ($sample['type']); ?> Name:<?php echo ($sample['name']); ?> Source:<?php echo ($sample['source']); ?> Nucleic_acid:<?php echo ($sample['nucleic_acid']); ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo ($sample['sampleid']); ?>">Sample ID:<?php echo ($sample['sampleid']); ?> Type:<?php echo ($sample['type']); ?> Name:<?php echo ($sample['name']); ?> Source:<?php echo ($sample['source']); ?> Nucleic_acid:<?php echo ($sample['nucleic_acid']); ?></option><?php endif; endforeach; endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>建库时间: </label>
                                            <input  type="text" readonly class="form-control timeer" name="create_date" value="<?php echo time_format($library['create_date'],"Y-m-d");?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>PCR循环数: </label>
                                            <input type="text" class="form-control" name="cycle_num" value="<?php echo ($library['cycle_num']); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>模板质量: </label>
                                            <input type="text" class="form-control" name="template_mass" value="<?php echo ($library['template_mass']); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>文库体积: </label>
                                            <input type="text" class="form-control" name="lib_volume" value="<?php echo ($library['lib_volume']); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>Qubit浓度: </label>
                                            <input type="text" class="form-control" name="conc_qubit" value="<?php echo ($library['conc_qubit']); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>qPCR浓度: </label>
                                            <input type="text" class="form-control" name="conc_qpcr" value="<?php echo ($library['conc_qpcr']); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>2100峰值: </label>
                                            <input type="text" class="form-control" name="peak" value="<?php echo ($library['peak']); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>备注: </label>
                                            <input type="text" class="form-control" name="comment" value="<?php echo ($library['comment']); ?>">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </fieldset>


                <fieldset>
                    <div class="row">
                            <input type="hidden" name="id" value="<?php echo ($library['id']); ?>" /> 
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
    <script src="/ot/Public/Seqdb/js/bootstrap-datetimepicker.min.js"></script>
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