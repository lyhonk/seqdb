<?php
namespace Seqdb\Controller;
use User\Api\UserApi as UserApi;

class DataController extends AdminController {

    public function index(){
        $data = M('data');
        $data = $data->order('id desc')->select();
        $this->assign('data',$data);
        $this->display();
    }

    public function add(){
        $uid = is_login();
        if($_POST){
            $data_id = I('data_id');
            $is_raw = I('is_raw');
            $read_order = I('read_order');
            $data_id = time_format(time(),"Ymd").sprintf("%03d", is_login()).sprintf("%04d",$data_id).$is_raw.$read_order;
            $read_length = I('read_length');
            $line_number = I('line_number');
            $md5 = I('md5');
            $origin_name = I('origin_name');
            $new_name = I('new_name');
            $seq_id = I('seq_id');
            $lib_id = I('lib_id');
            
            if($seq_id == "00"){
                $seq_id = 0;
                $lib_id = 0;
                $sample_id = 0;
            }elseif($lib_id == "00"){
                $seq_id = I('seq_id');
		$lib_id = 0;
                $sample_id = 0;
            }else{
                $seq_id = I('seq_id');
                $lib_id = I('lib_id');
                $sample_id = M('library')->where('lib_id='.$lib_id)->field('sample_id')->select();
                $sample_id = $sample_id[0]['sample_id'];
            }
          
            $cloudpath = I('cloudpath');
            $localpath = I('localpath');
            $comment = I('comment');
            
            $amount = $read_length * $line_number / 4 / 1000000000;
            $create_time = time();
            $operator = is_login();

            if($sample_id=="00" || $sample_id==""){
                $sample_name="未收录";
                $sample_type="未收录";
            }else{
                $sample_name = M('sample')->where('sampleid='.$sample_id)->field('name')->select();
                $sample_name = $sample_name[0]['name'];
                $sample_type = M('sample')->where('sampleid='.$sample_id)->field('type')->select();
                $sample_type = $sample_type[0]['type'];
            }
            
            if($lib_id=="00" || $lib_id==""){
                $seqtype="未收录";
                $platform="未收录";
            }else{
                $seqtype = M('seqlib')->where('seq_id='.$seq_id.' and lib_id='.$lib_id)->field('seqtype')->select();
                $seqtype = $seqtype[0]['seqtype'];
                $platform = M('seqlib')->where('seq_id='.$seq_id.' and lib_id='.$lib_id)->field('platform')->select();
                $platform = $platform[0]['platform'];
            }

            $data['data_id'] = $data_id;
            $data['seq_id'] = $seq_id;
            $data['lib_id'] = $lib_id;
            $data['sample_id'] = $sample_id;
            $data['origin_name'] = $origin_name;
            $data['new_name'] = $new_name;
            $data['md5'] = $md5;
            $data['read_length'] = $read_length;
            $data['line_number'] = $line_number;
            $data['amount'] = $amount;
            $data['is_raw'] = $is_raw;
            $data['cloudpath'] = $cloudpath;
            $data['localpath'] = $localpath;
            $data['create_time'] = $create_time;
            $data['update_time'] = $create_time;
            $data['operator'] = $operator;
            $data['comment'] = $comment;
            $data['sample_name'] = $sample_name;
            $data['sample_type'] = $sample_type;
            $data['seqtype'] = $seqtype;
            $data['platform'] = $platform;
            $data['read_order'] = $read_order;

            $datafile = M('data');
            $datafile -> add($data);

            $this->success('添加成功',U('data/index'));

        }else{
            $seq = M('seq');
            $seqinfo = $seq->order('id desc')->select();
            $this->assign('seqinfo',$seqinfo);
            $this->display(add);
        }

        
    }

    public function del(){
        $uid = is_login();
        $data = M('data');
        $condition['id'] = I('sid');
        $data->where($condition)->delete();
        $this->success('删除成功');
        action_log('delete_data','data',$uid,$uid);
    }

    public function update(){
        $uid = is_login();
        $condition['id'] = I('sid');
        if($_POST){
            // $sample->M('sample');
            // $data['id'] = $_POST['id'];
            // $data['sampleid'] = $_POST['sampleid'];
            // $data['sample_name'] = $_POST['sample_name'];
            // $data['update_time'] = time();
            // $sample = M('sample');
            // $sample->save($data);
            // action_log('update_sample','sample',$uid,$uid);
            // $this->success('修改成功',U('sample/index'));
            $data_id = I('data_id');
            $is_raw = I('is_raw');
            $read_order = I('read_order');
            // $data_id = time_format(time(),"Ymd").sprintf("%03d", is_login()).sprintf("%04d",$data_id).$is_raw.$read_order;
            $read_length = I('read_length');
            $line_number = I('line_number');
            $md5 = I('md5');
            $origin_name = I('origin_name');
            $new_name = I('new_name');
            $seq_id = I('seq_id');
            $lib_id = I('lib_id');
            $sample_id = I('sample_id');          

            $seq_id = I('seq_id');
            $lib_id = I('lib_id');
    
            if($seq_id == "00"){
                $seq_id = 0;
                $lib_id = 0;
                $sample_id = 0;
            }elseif($lib_id == "00"){
                $seq_id = I('seq_id');
                $lib_id = 0;
                $sample_id = 0;
            }else{
                $seq_id = I('seq_id');
                $lib_id = I('lib_id');
                $sample_id = M('library')->where('lib_id='.$lib_id)->field('sample_id')->select();
                $sample_id = $sample_id[0]['sample_id'];
            }

            $cloudpath = I('cloudpath');
            $localpath = I('localpath');
            $comment = I('comment');
            
            $amount = $read_length * $line_number / 4 / 1000000000;
            $create_time = time();
            $operator = is_login();

            if($sample_id=="00" || $sample_id==""){
                $sample_name="未收录";
                $sample_type="未收录";
            }else{
                $sample_name = M('sample')->where('sampleid='.$sample_id)->field('name')->select();
                $sample_name = $sample_name[0]['name'];
                $sample_type = M('sample')->where('sampleid='.$sample_id)->field('type')->select();
                $sample_type = $sample_type[0]['type'];
            }

            
            if($lib_id=="00" || $lib_id==""){
                $seqtype="未收录";
                $platform="未收录";
            }else{
                $seqtype = M('seqlib')->where('seq_id='.$seq_id.' and lib_id='.$lib_id)->field('seqtype')->select();
                $seqtype = $seqtype[0]['seqtype'];
                $platform = M('seqlib')->where('seq_id='.$seq_id.' and lib_id='.$lib_id)->field('platform')->select();
                $platform = $platform[0]['platform'];
            }
            $data['id'] = I('id');
            $data['data_id'] = $data_id;
            $data['seq_id'] = $seq_id;
            $data['lib_id'] = $lib_id;
            $data['sample_id'] = $sample_id;
            $data['origin_name'] = $origin_name;
            $data['new_name'] = $new_name;
            $data['md5'] = $md5;
            $data['read_length'] = $read_length;
            $data['line_number'] = $line_number;
            $data['amount'] = $amount;
            $data['is_raw'] = $is_raw;
            $data['cloudpath'] = $cloudpath;
            $data['localpath'] = $localpath;
            $data['update_time'] = time();
            $data['operator'] = $operator;
            $data['comment'] = $comment;
            $data['sample_name'] = $sample_name;
            $data['sample_type'] = $sample_type;
            $data['seqtype'] = $seqtype;
            $data['platform'] = $platform;
            $data['read_order'] = $read_order;

            $datafile = M("data");
            $datafile->save($data);
            action_log('update_data','data',$uid,$uid);
            $this->success('修改成功',U('data/index'));


        }else{
            //逻辑有瑕疵，待修改
            $data = M('data');
            $result = $data->where($condition)->select();
            $this->assign('data',$result[0]);

            $seq = M('seq');
            $seqinfo = $seq->order('id desc')->select();
            $this->assign('seqinfo',$seqinfo);

            $this->display(update);
        }
        

    }

    public function detail(){
        $data = M('data');
        $condition['id'] = I('sid');
        $result = $data->where($condition)->select();
        $this->assign('data',$result[0]);
        $this->display(detail);
    }

    public function libinforeturn(){
        if(I('seqid')){
            $seqid = I('seqid');
            $libinfo = M('seqlib')->where('seq_id='.$seqid)->field('lib_id,platform,seqtype')->select();
            $this->ajaxReturn($libinfo,"JSON");
        }
    }

    public function sampleinforeturn(){
        if(I('libid')){
            $libid = I('libid');
            $libinfo = M('library')->where('lib_id='.$libid)->field('sample_id')->select();
            $this->ajaxReturn($libinfo,"JSON");
        }
    }

}
