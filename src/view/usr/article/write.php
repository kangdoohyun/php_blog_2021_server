<?php
$pageTitleIcon = '<i class="fas fa-pen"></i>';
$pageTitle = "게시물 작성";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<?php require_once __DIR__ . "/../../part/toastUiSetup.php"; ?>

<section class="secion-article-write">
    <div class="container mx-auto">
        <div class="con-pad">
            <script>
                let ArticleDoWrite__submitFormDone = false;

                function ArticleDoWrite__submitForm(form) {
                    if (ArticleDoWrite__submitFormDone) {
                        return;
                    }

                    form.title.value = form.title.value.trim();

                    if (form.title.value.length == 0) {
                        alert('제목을 입력해주세요.');
                        form.title.focus();

                        return;
                    }

                    const bodyEditor = $(form).find('.input-body').data('data-toast-editor');
                    const body = bodyEditor.getMarkdown().trim();
                    if (body.length == 0) {
                        bodyEditor.focus();
                        alert('내용을 입력해주세요.');
                        return;
                    }

                    form.body.value = body;

                    form.submit();
                    ArticleDoWrite__submitFormDone = true;
                }
            </script>
            <form action="doWrite" method="POST" onsubmit="ArticleDoWrite__submitForm(this); return false;">
                <div class="pt-2">
                    <select class="select select-bordered w-full max-w-xs" name="boardId">
                        <option disabled="disabled" selected="selected" value="0">게시판 선택</option>
                        <?php foreach ($boards as $board) { ?>
                        <option class="bluck p-2" value="<?= $board['id'] ?>"><?= $board['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="hidden" name="body">
                <div>
                    <label class="label">
                        <span class="label-text">제목</span>
                    </label>
                    <input placeholder="제목을 입력해주세요." class="input input-bordered w-full" type="text" name="title">
                </div>
                <div>
                    <label class="label">
                        <span class="label-text">내용</span>
                    </label>
                    <script type="text/x-template"></script>
                    <div class="toast-ui-editor input-body"></div>
                </div>
                <div class="py-4 w-80 flex">
                    <input class="btn btn-ghost flex-grow w-0" type="submit" value="글작성">
                    <input class="btn btn-ghost flex-grow w-0" type="button" onclick="history.back()" value="작성 취소">
                </div>
            </form>
        </div>
    </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>