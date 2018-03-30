# Rapidusについて
サーバサイドのフレームワークにはジェネレータが存在する
  - Railsにはrake
  - Laravelにはartisan

しかし、ReactNativeには存在しない。
このことは開発効率を低下させる要因になる。
なので、今回はReactNative用のジェネレータを作成した。

## 仕様

### setUpについて
ReactNativeApp のプロジェクトを生成した時に初期のディレクトリ構成などを自動的に作成する。

```
$ php rapidus setUp
```

### makeについて
makeは自動的にファイルの雛形を作成する。
以下のコマンドが存在する。

```
$ php rapidus make:Component [コンポーネント名]
$ php rapidus make:Repository [リポジトリ名]
$ php rapidus make:View [ビュー名]
$ php rapidus make:Di [diコンテナ名] (未実装)
```

## LICENSE
MIT.
