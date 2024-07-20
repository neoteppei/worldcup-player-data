@if(empty(@$_SERVER['HTTP_REFERER']))
{{header('Location: /')}}
{{exit}}
@endif

<!DOCTYPE HTML>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>選手詳細表示</title>
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

  <style>
#about {
    width: 100%;
    border-collapse: collapse;
}

#about th, #about td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}


.goal-details {
    width: 100%;
    
}

.goal-details td {
    border: none;
    padding: 0;
    text-align: left;
}
    

    #about tr:nth-child(odd) {
      background-color: #f2f2f2;
    }

 

    

    #re button{
      width: 100%;
      text-align: center;
      background-color: black;
      color: white;
    }
  </style>
</head>

<body>
  <h2>■選手データ</h2>
  <div class="soccerplayer">
    <table id="about">
        <tr>
            <th>No</th>
            <td>{{$player->id}}</td>
        </tr>
        <tr>
            <th>ポジション</th>
            <td>{{$player->uniform_num}}</td>
        </tr>
        <tr>
            <th>背番号</th>
            <td>{{$player->position}}</td>
        </tr>
        <tr>
            <th>名前</th>
            <td>{{$player->name}}</td>
        </tr>
        <tr>
            <th>国</th>
            <td>{{ $player->country->name }}</td>
        </tr>
        <tr>
            <th>所属</th>
            <td>{{$player->club}}</td>
        </tr>
        <tr>
            <th>誕生日</th>
            <td>{{$player->birth}}</td>
        </tr>
        <tr>
            <th>身長</th>
            <td>{{$player->height}}</td>
        </tr>
        <tr>
            <th>体重</th>
            <td>{{$player->weight}}</td>
        </tr>
        <tr>
            <th>総得点</th>
            <td>{{ $totalGoals }} 点</td>
        </tr>
        <tr>
            <th>得点履歴</th>
            @if($goalDetails->isEmpty())
            <td>無得点です</td>
            @else
            <td>
                <table class="goal-details">
                    @foreach($goalDetails as $detail)
                    <tr>
                        <td>{{ $detail['kickoff'] }} 開始 {{ $detail['enemy_country_name'] }}戦 {{ $detail['goal_time'] }}:{{ $loop->iteration }}点目</td>
                    </tr>
                    @endforeach
                </table>
            </td>
            @endif
        </tr>
    </table>
</div>
  
  <div id="re">
    <a href="/" class="return"><button>戻る</button></a>
  </div>
</body>

</html>