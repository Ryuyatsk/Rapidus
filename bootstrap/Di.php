<?php
/**
 * Created by IntelliJ IDEA.
 * User: syo
 * Date: 2018/03/20
 * Time: 1:00
 */

class Di
{
    private $diFile;
    private $diName;

    public function __construct(string $fileName)
    {
        global $basePath;
        $this->diName = ucfirst($fileName) . 'Repository';
        $fileName = ucfirst($fileName) . 'Repository.js';
        $this->diFile = $basePath . "/App/Repository/{$fileName}";
    }

    public function make()
    {
        print("まだ実装していません。処理を終了します。\n");
        exit;
    }
}