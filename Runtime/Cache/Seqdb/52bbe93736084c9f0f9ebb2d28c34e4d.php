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

            <form  method="post" action="/index.php?s=/Sample/add">
                <fieldset id="InputsWrapper">
                    <legend><strong>样品信息</strong></legend>
                    <a class="btn btn-info pull-right" style="margin-right: 30px;" href="#" role="button" id="AddMoreFileBox">添加一个样品</a>


                    <div class="row"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bs-callout bs-callout-info">
                                <legend>样品序号 1</legend>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label> 样品编号: </label>
                                            <input type="text" class="form-control" name="sampleid[]" placeholder="1" value="1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>样品类型: </label>
                                            <input type="text" class="form-control" name="type[]" placeholder="( cell / tissue )">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>样品来源: </label>
                                            <input type="text" class="form-control" name="source[]" placeholder="样品来源">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>样品名称: </label>
                                            <input type="text" class="form-control" name="name[]" placeholder="样品名称">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>样品描述: </label>
                                            <input type="text" class="form-control" name="description[]" placeholder="样品描述">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>提取时间：</label>
                                            <input size="19" type="text" readonly class="form-control timeer" name="obtain_time[]" placeholder="提取时间">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>剩余样品量: </label>
                                            <input type="text" class="form-control" name="remain[]" placeholder="剩余样品量">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>核酸类型: </label>
                                            <input type="text" class="form-control" name="nucleic_acid[]" placeholder="DNA / RNA">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>提取方法: </label>
                                            <input type="text" class="form-control" name="method[]" placeholder="提取方法">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>核酸浓度：</label>
                                            <input type="text" class="form-control" name="concentration[]" placeholder="(ng/ul) by Qubit 2.0">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>核酸总体积: </label>
                                            <input type="text" class="form-control" name="amount[]" placeholder="Amount Volume(uL)">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>核酸质量: </label>
                                            <input type="text" class="form-control" name="mass[]" placeholder="mass(ug)">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>使用体积：</label>
                                            <input type="text" class="form-control" name="used_volume[]" placeholder="used Volume(uL)">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>使用质量：</label>
                                            <input type="text" class="form-control" name="used_mass[]" placeholder="used(ug)">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-inline">
                                            <label>剩余质量: </label>
                                            <input type="text" class="form-control" name="rest[]" placeholder="rest DNA/RNA (ug)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label>核酸提取时间: </label>
                                            <input size="32" type="text" readonly class="form-control timeer" name="extraction_data[]" placeholder="extraction date test time（gel/2100)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-inline">
                                            <label> 备 注:  </label>
                                            <input size="50" type="text" class="form-control" name="comment[]" placeholder="样品备注信息">
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

                $(InputsWrapper).append('<div class="row"><div class="col-md-12"><div class="bs-callout bs-callout-info"><legend>样品序号 '+ FieldCount +'</legend><div class="row"><div class="col-md-4"><div class="form-group form-inline"><label> 样品编号: </label><input type="text" class="form-control" name="sampleid[]" placeholder="'+ FieldCount +'" value="'+ FieldCount +'"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>样品类型: </label><input type="text" class="form-control" name="type[]" placeholder="( cell / tissue )"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>样品来源: </label><input type="text" class="form-control" name="source[]" placeholder="样品来源"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>样品名称: </label><input type="text" class="form-control" name="name[]" placeholder="样品名称"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>样品描述: </label><input type="text" class="form-control" name="description[]" placeholder="样品描述"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>提取时间：</label><input size="19" type="text" readonly class="form-control timeer" name="obtain_time[]" placeholder="提取时间"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>剩余样品量: </label><input type="text" class="form-control" name="remain[]" placeholder="剩余样品量"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>核酸类型: </label><input type="text" class="form-control" name="nucleic_acid[]" placeholder="DNA / RNA"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>提取方法: </label><input type="text" class="form-control" name="method[]" placeholder="提取方法"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>核酸浓度：</label><input type="text" class="form-control" name="concentration[]" placeholder="(ng/ul) by Qubit 2.0"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>核酸总体积: </label><input type="text" class="form-control" name="amount[]" placeholder="Amount Volume(uL)"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>核酸质量: </label><input type="text" class="form-control" name="mass[]" placeholder="mass(ug)"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>使用体积：</label><input type="text" class="form-control" name="used_volume[]" placeholder="used Volume(uL)"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>使用质量：</label><input type="text" class="form-control" name="used_mass[]" placeholder="used(ug)"></div></div><div class="col-md-4"><div class="form-group form-inline"><label>剩余质量: </label><input type="text" class="form-control" name="rest[]" placeholder="rest DNA/RNA (ug)"></div></div><div class="col-md-6"><div class="form-group form-inline"><label>核酸提取时间: </label><input size="32" type="text" readonly class="form-control timeer" name="extraction_data[]" placeholder="extraction date test time（gel/2100)"></div></div><div class="col-md-6"><div class="form-group form-inline"><label> 备 注:  </label><input size="50" type="text" class="form-control" name="comment[]" placeholder="样品备注信息"></div></div></div><div class="row"><a class="btn btn-danger btn-xs pull-right removeclass" style="margin-right: 30px;" href="#" role="button">删除</a></div></div></div></div>');   
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