<?php
/**
 * Created by IntelliJ IDEA.
 * User: syo
 * Date: 2018/03/19
 * Time: 23:51
 */

class Rapidus
{
    public function index()
    {
        global $argv;
        global $argc;
        $pieces = explode(":", $argv[1]);
        if ($pieces[0] === 'make') {
            if (count($pieces) !== 2) {
                print("書式が間違っています。\n");
                exit;
            }
            if ($argc < 3) {
                print("引数が足りません\n");
                exit;
            }
            $this->make($pieces[1], $argv[2]);
        } elseif ($pieces[0] === 'setUp') {
            $this->setUp();
        }
    }

    public function make(string $part, string $fileName)
    {
        switch ($part) {
            case 'Component':
                (new Component($fileName))->make();
                break;
            case "Di":
                (new Di($fileName))->make();
                break;
            case 'Repository':
                (new Repository($fileName))->make();
                break;
            case 'View':
                (new View($fileName))->make();
                break;
        }
    }

    public function setUp()
    {
        (new SetUp())->index();
    }
}