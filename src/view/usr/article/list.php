<?php
$pageTitleIcon = '<i class="fas fa-list"></i>';
$pageTitle = "최신 게시물 리스트";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<?php require_once __DIR__ . "/../../part/toastUiSetup.php"; ?>

<?php if ( $isLogined ) { ?>

<section class="section-article-menu">
  <div class="container mx-auto">
    <a href="write" class="btn btn-link">글 작성</a>
  </div>
</section>
<hr>

<?php } ?>

<section class="section-articles mt-4">
  <div class="container mx-auto">
    <div class="con-pad">

      <div>
        <div class="badge badge-primary badge-outline">게시물 수</div>
        <?=$totalCount?>
      </div>

      <hr class="mt-4">

      <div>
        <?php foreach ( $articles as $article ) { ?>
          <div class="py-5">
            <?php
            $detailUri = "detail?id=${article['id']}";
            $body = ToastUiEditor__getSafeSource($article['body']);
            ?>
            <div>
              <div class="badge badge-primary badge-outline">번호</div>
              <a href="<?=$detailUri?>"><?=$article['id']?></a>
            </div>
            <div class="mt-2">
              <div class="badge badge-primary badge-outline">제목</div>
              <a href="<?=$detailUri?>"><?=$article['title']?></a>
            </div>
            <div class="mt-2">
              <div class="badge badge-primary badge-outline">작성자</div>
              <?=$article['extra__writerName']?>
            </div>
            <div class="mt-2">
              <div class="badge badge-primary badge-outline">작성날짜</div>
              <?=$article['regDate']?>
            </div>
            <div class="mt-2">
              <div class="badge badge-primary badge-outline">수정날짜</div>
              <?=$article['updateDate']?>
            </div>
            <div class="mt-2">
              <script type="text/x-template"><?=$body?></script>
              <div class="toast-ui-viewer"></div>
            </div>
          </div>
          <hr>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>
