<?php
$pageTitleIcon = '<i class="fas fa-list"></i>';
$pageTitle = "최신 게시물 리스트";
?>

<?php require_once __DIR__ . "/../head.php"; ?>
<?php require_once __DIR__ . "/../../part/toastUiSetup.php"; ?>
<section class="section-article-menu">
    <div class="container mx-auto py-2 flex px-4 relative">
    <?php if ( $isLogined ) { ?>
        <div>
            <a href="write" class="write-btn btn btn-ghost btn-sm">글 작성</a>
        </div>
        <div class="flex-grow"></div>
    <?php } ?>
        <div class="mobile-search-box ml-auto">
            <div class="mobile-search-box-btn md:hidden">
                <button type="button" class="btn btn-ghost btn-sm"><i class='fas fa-search'></i></button>
            </div>
            <form class="whitespace-nowrap hidden md:block" action="./list">
                <input type="hidden" name="page" value="1">
                <input type="hidden" name="boardId" value="<?=$boardId?>">
                <select class="select select-bordered select-sm" name="searchKeywordTypeCode">
                    <option value="title" selected="selected">제목</option> 
                    <option value="body">내용</option> 
                    <option value="title,body">제목, 내용</option>
                </select> 
                <?php if($searchKeywordTypeCode != null){ ?>
                    <script>
                    $("select[name='searchKeywordTypeCode']").val('<?=$searchKeywordTypeCode?>');
                    </script>
                <?php } ?>
                <input name="searchKeyword" type="text" placeholder="검색어를 입력해주세요." class="input input-sm input-bordered">
                <button type="submit" class="btn btn-ghost btn-sm"><i class='fas fa-search'></i></button>
            </form>
        </div>
    </div>
</section>
<hr>

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
        
        <?php if($blockStartNum == 1){ ?>
            <span class="prev text-gray-400"><i class="fas fa-chevron-left"></i></span>
        <?php } ?>
        <?php if($blockStartNum != 1){ ?>
            <a class="prev" href="./list?page=<?=$blockStartNum - 1?>&boardId=<?=$boardId?>"><i class="fas fa-chevron-left"></i></a>
        <?php } ?>
        <?php for($i = $blockStartNum; $i <= $blockLastNum; $i++) { ?>
            <?php if($i <= $totalPage) { ?> 
                <?php $classStr = $i == $page ? 'text-navy' : ''?>
                <a class="page-menu__list p-2 text-gray-400 <?=$classStr?>" href="./list?page=<?=$i?>&boardId=<?=$boardId?>"><?=$i?></a>
            <?php } ?>
        <?php } ?>
        <?php if($endBlock <= $blockNum) { ?>
            <span class="next text-gray-400"><i class="fas fa-chevron-right"></i></span>
        <?php } ?>
        <?php if($endBlock > $blockNum) { ?>
            <a class="next" href="./list?page=<?=$blockLastNum + 1?>&boardId=<?=$boardId?>"><i class="fas fa-chevron-right"></i></a>
        <?php } ?>
        </div>
    </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>