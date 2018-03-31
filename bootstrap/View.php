<?php
/**
 * Created by IntelliJ IDEA.
 * User: syo
 * Date: 2018/03/20
 * Time: 0:03
 */

class View
{
    private $viewFile;
    private $viewName;

    public function __construct(string $fileName)
    {
        $this->viewName = ucfirst($fileName) . 'View';
        $fileName = ucfirst($fileName) . 'View.js';
        $this->viewFile = __DIR__ . "/../App/Views/{$fileName}";
    }

    public function make()
    {
        if (!touch($this->viewFile)) {
            print("正常に実行できなかったため、処理を中断します。\n");
            exit;
        }
        $fp = fopen($this->viewFile, 'w');
        fwrite($fp, (new Heredoc())->getView($this->viewName));
        fclose($fp);
    }
}