<?php
/**
 * Created by IntelliJ IDEA.
 * User: syo
 * Date: 2018/03/19
 * Time: 23:14
 */

class Component
{
    private $componentFile;
    private $componentName;

    public function __construct(string $fileName)
    {
        $this->componentName = ucfirst($fileName) . 'Component';
        $fileName = ucfirst($fileName) . 'Component.js';
        $this->componentFile = __DIR__ . "/../Component/{$fileName}";
    }

    public function make()
    {
        if (!touch($this->componentFile)) {
            print("正常に実行できなかったため、処理を中断します。\n");
            exit;
        }
        $fp = fopen($this->componentFile, 'w');
        fwrite($fp, (new Heredoc())->getComponent($this->componentName));
        fclose($fp);
    }
}