<!DOCTYPE HTML>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>選手一覧</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <!-- CSSファイルのリンクを追加 -->

  <style>
    /* ここに直接CSSスタイルを追加することもできます */
    /* 例: テーブルのスタイル */
    #players {
      width: 100%;
      border-collapse: collapse;
    }

    #players th,
    #players td {
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
  <script>
    function confirmDeletion(playerId) {
      if (confirm('この選手を削除しますか？')) {
        document.getElementById('delete-form-' + playerId).submit();
      }
    }
  </script>
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
        <td><a href="{{ route('player.edit', ['id' => $player->id]) }}" class="btn btn-primary">編集</a></td>
        <td>
          <form action="{{ route('player.delete', ['id' => $player->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('この選手を削除しますか？')">削除</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
  {{ $players->appends(request()->query())->links() }}
</body>

</html>