<?php
class IndexController extends Common_Base {

    public function indexAction() {//Ĭ��Action
        $this->getView()->display('index/index.phtml');
    }

    //��ȡ�ļ�
    public function readLanAction() {
        $file = $_FILES;
        $arr = parse_ini_file($file['file']['tmp_name'],true);
        $this->getView()->assign('arr', $arr);
        $this->getView()->display('index/lanList.phtml');
    }

    //�Ƚ��ļ�
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

    