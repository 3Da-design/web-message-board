<?php

session_start();
require_once(__DIR__ . '/../src/db_connect.php');

if (isset($_POST['action_type']) && $_POST['action_type']) {
  if ($_POST['action_type'] === 'insert') {
    require(__DIR__ . '/../src/insert_message.php');
  }
}

require(__DIR__ . '/../src/session_values.php');

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title>ひとこと掲示板</title>
    <link rel="stylesheet" href="./assets/main.css">
  </head>

  <body>
    <div class="page-cover">
      <p class="page-title">ひとこと掲示板</p>

      <div class="form-cover">
        <form action="/" method="post">
          <!-- 投稿者ニックネームの入力フォーム -->
          <div class="form-input-title">投稿者ニックネーム</div>
          <input
            type-"text"
            name="author_name"
            maxlength="40"
            value="<?php echo htmlspecialchars($messages['input_pre_author_name'], ENT_QUOTES); ?>"
            class=input-author-name
          />
          <?php if ($messages['input_error_author_name'] !== '') { ?>
            <div class="form-input-error">
              <?= $messages['input_error_author_name']; ?>
            </div>
          <?php } ?>

          <!-- 投稿内容の入力フォーム -->
          <div class="form-input-title">
            投稿内容
            <small>(必須)</small>
          </div>
          <textarea
            name="message"
            class="input-message"
          >
            <?php echo htmlspecialchars($messages['input_pre_message'], ENT_QUOTES); ?>
          </textarea>
          <?php if ($messages['input_error_message'] !== '') { ?>
            <div class="form-input-error">
              <?= $messages['input_error_message']; ?>
            </div>
          <?php } ?>

          <!-- 投稿ボタン -->
          <input type="hidden" name="action_type" value="insert" />
          <button type="submit" class="input-submit-button">投稿する</button>
        </form>
      </div>

      <hr class="page-divider"/>

      <div class="message-list-cover">
        <!-- メッセージ一覧の内容 -->
      </div>
    </div>
  </body>
</html>