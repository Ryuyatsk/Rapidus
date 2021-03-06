<?php
/**
 * Created by IntelliJ IDEA.
 * User: syo
 * Date: 2018/03/20
 * Time: 0:11
 */

class SetUp
{
    private $app;
    private $component;
    private $di;
    private $repository;
    private $view;
    private $routing;

    /**
     * SetUp constructor.
     * それぞれのディレクトリやファイルを作成するPATHを指定する
     */
    public function __construct()
    {
        $this->app = __DIR__ . '/../App';
        $this->component = __DIR__ . '/../App/Component';
        $this->di = __DIR__ . '/../App/Di';
        $this->repository = __DIR__ . '/../App/Repository';
        $this->view = __DIR__ . '/../App/Views';
        $this->routing = __DIR__ . '/../App/Routing.js';
    }

    /**
     * もし、SetUpコマンドが実行されたら、
     * このメソッドが実行される
     */
    public function index()
    {
        $this->makeDir();
        $this->makeRouting();
        (new View('Home'))->make();
    }

    /**
     * このメソッドはSetUp時のAppディレクトリ内のディレクトリ構成を作る
     */
    public function makeDir()
    {
        if (!mkdir($this->app, 0777, true)) {
            print("正常に実行できなかったため、処理を中断します。\n");
            exit;
        }
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

    /**
     * ルーティングファイルを生成するメソッド
     */
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
