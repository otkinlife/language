<?php
class IndexController extends Common_Base {

    //首页
    public function indexAction() {//默认Action
        $this->getView()->display('index/index.phtml');
    }

    //增加语言包页面
    public function addLanPackagePageAction() {
        $this->getView()->display('index/addPackage.phtml');
    }

    //新建语言包文件
    public function addLanFileAction() {
        try {
            $file = $_GET['file'];
            $filePath = APP_PATH.'/public/package/'.$file;
            if(file_exists($filePath)){
               $this->result(1, '该文件已经存在，请重新命名或者编辑该文件');
                return;
            }
            $lanFile = fopen($filePath, "w+");
            if(!$lanFile) {
                $this->result(1, '新建文件失败');
                return;
            }
            $this->result(0, '新建成功');
        } catch(Exception $e) {
            $this->result(1, '新建文件失败');
        }
    }

    //修语言包页面
    public function editLanPackagePageAction() {

    }

    //读取文件
    public function readLanAction() {
        $file = $_FILES;
        $arr = parse_ini_file($file['file']['tmp_name'],true);
        $this->getView()->assign('arr', $arr);
        echo $this->getView()->render('index/lanList.phtml');
    }

    //比较文件
    public function compareAction() {
        $file = $_FILES;
        $firstLanguage = $this->getParam('first', 'CN');
        $secondLanguage = $this->getParam('second', 'US');
        $first = L($firstLanguage);
        $second = L($secondLanguage);
        $html = '<table border="1"><tr><th>key</th><th>'
            .$firstLanguage.'</th><th>'
            .$secondLanguage.'</th></tr>';
        foreach ($first as $firKey => $firVal) {
            foreach ($firVal as $secKey => $secVal) {
                $html .= '<tr><td>'.$secKey.'</td><td>'.$secVal
                    .'</td><td>'.$second[$firKey][$secKey].'</td></tr>';
            }
        }
        echo $html;
    }
}
?>

    