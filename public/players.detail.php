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
</head>

<body>
  <h1>選手詳細画面</h1>
  <h2>■選手データ</h2>
  <div class="soccerplayer">
    <table id="about">
      <tr>
        <th>No</th>
        <td>{{$player -> id}}</td>
      </tr>
      <tr>
        <th>ポジション</th>
        <td>{{$player -> uniform_num}}</td>
      </tr>
      <tr>
        <th>背番号</th>
        <td>{{$player -> position}}</td>
      </tr>
      <tr>
        <th>名前</th>
        <td>{{$player -> name}}</td>
      </tr>
      <tr>
        <th>所属</th>
        <td>{{$player -> club}}</td>
      </tr>
      <tr>
        <th>国</th>
        <td>{{$player -> country_name}}</td>
      </tr>
      <tr>
        <th>誕生日</th>
        <td>{{$player -> birth}}</td>
      </tr>
      <tr>
        <th>身長</th>
        <td>{{$player -> height}}</td>
      </tr>
      <tr>
        <th>体重</th>
        <td>{{$player -> weight}}</td>
      </tr>
    </table>
  </div>
  <div id="re">
    <a href="/" class="return"><button>戻る</button></a>
  </div>
</body>

</html>