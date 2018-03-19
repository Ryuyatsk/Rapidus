<?php
/**
 * Created by IntelliJ IDEA.
 * User: syo
 * Date: 2018/03/20
 * Time: 0:58
 */

class Repository
{
    private $repositoryFile;
    private $repositoryName;

    public function __construct(string $fileName)
    {
        $this->repositoryName = ucfirst($fileName) . 'Repository';
        $fileName = ucfirst($fileName) . 'Repository.js';
        $this->repositoryFile = __DIR__ . "/../Repository/{$fileName}";
    }

    public function make()
    {
        if (!touch($this->repositoryFile)) {
            print("正常に実行できなかったため、処理を中断します。\n");
            exit;
        }
        $fp = fopen($this->repositoryFile, 'w');
        fwrite($fp, (new Heredoc())->getRepository($this->repositoryName));
        fclose($fp);
    }
}