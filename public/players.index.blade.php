<<<<<<< HEAD
<!DOCTYPE HTML>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>選手一覧</title>
  <link rel="stylesheet" type="text/css" >
  <!-- CSSファイルのリンクを追加 -->

  <style>
    /* ここに直接CSSスタイルを追加することもできます */
    /* 例: テーブルのスタイル */
    #players {
      width: 100%;
      border-collapse: collapse;
    }

    #players th, #players td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }

    #players th {
      background-color: #f2f2f2;
    }

    #players tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <h1>選手一覧画面</h1>
  <h2>■選手データ</h2>
  <div id="playerlist">
    <table id="players">
      <tr>
        <th>No</th>
        <th>背番号</th>
        <th>ポジション</th>
        <th>所属</th>
        <th>名前</th>
        <th>国</th>
        <th>誕生日</th>
        <th>身長</th>
        <th>体重</th>
        <th></th>
      </tr>
      @foreach($players as $player)
      <tr>
        <td>{{ $player->id }}</td>
        <td>{{ $player->uniform_num }}</td>
        <td>{{ $player->position }}</td>
        <td>{{ $player->club }}</td>
        <td>{{ $player->name }}</td>
        <td>{{ $player->country_name }}</td>
        <td>{{ $player->birth }}</td>
        <td>{{ $player->height }}</td>
        <td>{{ $player->weight }}</td>
        <td><a href="/player/{{ $player->id }}"><button>詳細</button></a></td>
      </tr>
      @endforeach
    </table>
  </div>
  {{ $players->appends(request()->query())->links() }}
</body>

=======
<!DOCTYPE HTML>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>選手一覧</title>
  <link rel="stylesheet" type="text/css" >
  <!-- CSSファイルのリンクを追加 -->

  <style>
    /* ここに直接CSSスタイルを追加することもできます */
    /* 例: テーブルのスタイル */
    #players {
      width: 100%;
      border-collapse: collapse;
    }

    #players th, #players td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }

    #players th {
      background-color: #f2f2f2;
    }

    #players tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <h1>選手一覧画面</h1>
  <h2>■選手データ</h2>
  <div id="playerlist">
    <table id="players">
      <tr>
        <th>No</th>
        <th>背番号</th>
        <th>ポジション</th>
        <th>所属</th>
        <th>名前</th>
        <th>国</th>
        <th>誕生日</th>
        <th>身長</th>
        <th>体重</th>
        <th></th>
      </tr>
      @foreach($players as $player)
      <tr>
        <td>{{ $player->id }}</td>
        <td>{{ $player->uniform_num }}</td>
        <td>{{ $player->position }}</td>
        <td>{{ $player->club }}</td>
        <td>{{ $player->name }}</td>
        <td>{{ $player->country_name }}</td>
        <td>{{ $player->birth }}</td>
        <td>{{ $player->height }}</td>
        <td>{{ $player->weight }}</td>
        <td><a href="/player/{{ $player->id }}"><button>詳細</button></a></td>
      </tr>
      @endforeach
    </table>
  </div>
  {{ $players->appends(request()->query())->links() }}
</body>

>>>>>>> 04a1a7bf2af2daf13de46401cdf7ccb53c151cf2
</html>