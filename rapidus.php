#!/usr/bin/env php
<?php
/**
 * Created by IntelliJ IDEA.
 * User: syo
 * Date: 2018/03/19
 * Time: 23:13
 */

require_once(__DIR__ . '/bootstrap/Rapidus.php');
require_once(__DIR__ . '/bootstrap/Component.php');
require_once(__DIR__ . '/bootstrap/View.php');
require_once(__DIR__ . '/bootstrap/SetUp.php');
require_once(__DIR__ . '/bootstrap/Heredoc.php');
require_once(__DIR__ . '/bootstrap/Repository.php');
require_once(__DIR__ . '/bootstrap/Di.php');

if ($argc < 2) {
    print("引数が足りません\n");
    exit;
}

(new Rapidus())->index();

$app = <<< EOF
import React from 'react';
import {RootStack} from './Routing';

export default class App extends React.Component {
    render() {
        return <RootStack/>;
    }
}

EOF;

if ($argv[1] === 'setUp') {
    exec('npm install --save axios react-navigation');
    exec('npm install');
    echo "無事にジェネレータを実行できました。\n\n";
    echo $app;
}

echo pack('c',0x1B) . "[1;34m" . "処理が正常に終了しました" . pack('c',0x1B) . "[0m\n";
