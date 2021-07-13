<?php
$pageTitleIcon = '<i class="fas fa-list"></i>';
$pageTitle = "최신 게시물 리스트";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<?php require_once __DIR__ . "/../../part/toastUiSetup.php"; ?>

<?php if ( $isLogined ) { ?>

<section class="section-article-menu">
    <div class="container mx-auto py-2">
        <a href="write" class="btn btn-ghost">글 작성</a>
    </div>
</section>
<hr>

<?php } ?>

<section class="section-articles mt-4">
    <div class="container mx-auto">
        <div class="con-pad">
            <div>
                <div class="badge badge-outline badge-outline">게시물 수</div>
                <?=$totalCount?>
            </div>
        </div>
        <hr class="mt-4">
        <div class="con-pad">
            <div>
                <?php foreach ( $articles as $article ) { ?>
                <div class="py-4">
                    <?php
            $detailUri = "detail?id=${article['id']}";
            $body = ToastUiEditor__getSafeSource($article['body']);
            ?>
                    <div>
                        <div class="badge badge-outline">번호</div>
                        <a href="<?=$detailUri?>"><?=$article['id']?></a>
                    </div>
                    <div class="mt-2">
                        <div class="badge badge-outline">제목</div>
                        <a href="<?=$detailUri?>"><?=$article['title']?></a>
                    </div>
                    <div class="mt-2">
                        <div class="badge badge-outline">작성자</div>
                        <?=$article['extra__writerName']?>
                    </div>
                    <div class="mt-2">
                        <div class="badge badge-outline">작성날짜</div>
                        <?=$article['regDate']?>
                    </div>
                    <div class="mt-2">
                        <div class="badge badge-outline">수정날짜</div>
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
        <div class="page-menu flex items-center justify-center maple-font">
        <?php $bId = $boardId != 0 ? $boardId : 0?>
        <?php if($blockStartNum == 1){ ?>
            <span class="prev text-gray-400"><i class="fas fa-chevron-left"></i></span>
        <?php } ?>
        <?php if($blockStartNum != 1){ ?>
            <a class="prev" href="./list?page=<?=$blockStartNum - 1?>&boardId=<?=$bId?>"><i class="fas fa-chevron-left"></i></a>
        <?php } ?>
        <?php for($i = $blockStartNum; $i <= $blockLastNum; $i++) { ?>
            <?php if($i <= $totalPage) { ?> 
                <?php $classStr = $i == $page ? 'text-navy' : ''?>
                <a class="page-menu__list p-2 text-gray-400 <?=$classStr?>" href="./list?page=<?=$i?>&boardId=<?=$bId?>"><?=$i?></a>
            <?php } ?>
        <?php } ?>
        <?php if($endBlock <= $blockNum) { ?>
            <span class="next text-gray-400"><i class="fas fa-chevron-right"></i></span>
        <?php } ?>
        <?php if($endBlock > $blockNum) { ?>
            <a class="next" href="./list?page=<?=$blockLastNum + 1?>&boardId=<?=$bId?>"><i class="fas fa-chevron-right"></i></a>
        <?php } ?>
        </div>
    </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>