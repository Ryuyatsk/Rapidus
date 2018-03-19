<?php
/**
 * Created by IntelliJ IDEA.
 * User: syo
 * Date: 2018/03/20
 * Time: 0:11
 */

class SetUp
{
    private $component;
    private $di;
    private $repository;
    private $view;
    private $routing;

    public function __construct()
    {
        $this->component = __DIR__ . '/../Component';
        $this->di = __DIR__ . '/../Di';
        $this->repository = __DIR__ . '/../Repository';
        $this->view = __DIR__ . '/../Views';
        $this->routing = __DIR__ . '/../Routing.js';
    }

    public function index()
    {
        $this->makeDir();
        $this->makeRouting();
        (new View('Home'))->make();
    }

    public function makeDir()
    {
        if (!mkdir($this->component, 0777, true)) {
            print("正常に実行できなかったため、処理を中断します。\n");
            exit;
        }
        if (!mkdir($this->di, 0777, true)) {
            print("正常に実行できなかったため、処理を中断します。\n");
            exit;
        }
        if (!mkdir($this->repository, 0777, true)) {
            print("正常に実行できなかったため、処理を中断します。\n");
            exit;
        }
        if (!mkdir($this->view, 0777, true)) {
            print("正常に実行できなかったため、処理を中断します。\n");
            exit;
        }
    }

    public function makeRouting()
    {
        if (!touch($this->routing)) {
            print("正常に実行できなかったため、処理を中断します。\n");
            exit;
        }
        $fp = fopen($this->routing, 'w');
        fwrite($fp, (new Heredoc())->getRouting());
        fclose($fp);
    }
}
