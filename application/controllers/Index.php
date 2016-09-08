<?php
class IndexController extends Common_Base {

    public function indexAction() {//默认Action
        $this->getView()->display('index/index.phtml');
    }

    //读取文件
    public function readLanAction() {
        $file = $_FILES;
        $arr = parse_ini_file($file['file']['tmp_name'],true);
        $this->getView()->assign('arr', $arr);
        $this->getView()->display('index/lanList.phtml');
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

    