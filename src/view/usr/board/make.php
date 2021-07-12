<?php
$pageTitleIcon = '<i class="fas fa-book"></i>';
$pageTitle = "게시판 생성";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<?php require_once __DIR__ . "/../../part/toastUiSetup.php"; ?>

<section class="secion-board-make">
    <div class="container mx-auto">
        <div class="con-pad">
            <script>
                let BoardDoMake__submitFormDone = false;

                function BoardDoMake__submitForm(form) {
                    if (BoardDoMake__submitFormDone) {
                        return;
                    }

                    form.code.value = form.code.value.trim();

                    if (form.code.value.length == 0) {
                        alert('코드를 입력해주세요.');
                        form.code.focus();

                        return;
                    }

                    form.name.value = form.name.value.trim();

                    if (form.name.value.length == 0) {
                        alert('이름을 입력해주세요.');
                        form.name.focus();

                        return;
                    }

                    form.submit();
                    BoardDoMake__submitFormDone = true;
                }
            </script>
            <form action="doMake" method="POST" onsubmit="BoardDoMake__submitForm(this); return false;">
                <div>
                    <label class="label">
                        <span class="label-text">게시판 코드</span>
                    </label>
                    <input placeholder="게시판 코드을 입력해주세요." class="input input-bordered w-full" type="text" name="code">
                </div>
                <div>
                    <label class="label">
                        <span class="label-text">게시판 이름</span>
                    </label>
                    <input placeholder="게시판 이름을 입력해주세요." class="input input-bordered w-full" type="text" name="name">
                </div>
                <div class="py-2 w-full flex whitespace-nowrap md:w-80">
                    <input class="btn btn-ghost flex-grow w-0" type="submit" value="게시판 생성">
                    <input class="btn btn-ghost flex-grow w-0" type="button" onclick="history.back()" value="취소">
                </div>
            </form>
        </div>
    </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>