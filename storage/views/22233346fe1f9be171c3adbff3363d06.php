<?php if(empty(@$_SERVER['HTTP_REFERER'])): ?>
<?php echo e(header('Location: /')); ?>

<?php echo e(exit); ?>

<?php endif; ?>

<!DOCTYPE HTML>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>選手詳細表示</title>
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">
</head>

<body>
  <h1>選手詳細画面</h1>
  <h2>■選手データ</h2>
  <div class="soccerplayer">
    <table id="about">
      <tr>
        <th>No</th>
        <td><?php echo e($player -> id); ?></td>
      </tr>
      <tr>
        <th>ポジション</th>
        <td><?php echo e($player -> uniform_num); ?></td>
      </tr>
      <tr>
        <th>背番号</th>
        <td><?php echo e($player -> position); ?></td>
      </tr>
      <tr>
        <th>名前</th>
        <td><?php echo e($player -> name); ?></td>
      </tr>
      <tr>
        <th>国</th>
        <td><?php echo e($player -> country_name); ?></td>
      </tr>
      <tr>
        <th>所属</th>
        <td><?php echo e($player -> club); ?></td>
      </tr>
      <tr>
        <th>誕生日</th>
        <td><?php echo e($player -> birth); ?></td>
      </tr>
      <tr>
        <th>身長</th>
        <td><?php echo e($player -> height); ?></td>
      </tr>
      <tr>
        <th>体重</th>
        <td><?php echo e($player -> weight); ?></td>
      </tr>
    </table>

    <h2>総得点</h2>
    <p><?php echo e($totalGoals); ?> 点</p>

    <h2>得点履歴</h2>
    <?php if($goalDetails->isEmpty()): ?>
    <p>無得点です</p>
    <?php else: ?>
    <ul>
      <?php $__currentLoopData = $goalDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($detail['kickoff']); ?> 開始 <?php echo e($detail['enemy_country_name']); ?>戦 <?php echo e($detail['goal_time']); ?>:<?php echo e($loop->iteration); ?>点目</li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <?php endif; ?>
  </div>
  <div id="re">
    <a href="/" class="return"><button>戻る</button></a>
  </div>
</body>

</html><?php /**PATH /var/laravel-curriculum/curriculum-app/resources/views/players/detail.blade.php ENDPATH**/ ?>