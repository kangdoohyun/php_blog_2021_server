<?php
$pageTitleIcon = '<i class="fas fa-sign-in-alt"></i>';
$pageTitle = "로그인";
?>
<?php require_once __DIR__ . "/../head.php"; ?>

<section class="secion-login">
    <div class="container mx-auto sm:w-1/2">
        <div class="con-pad">
            <form action="doLogin" method="POST">
                <div class="form-control flex">
                    <label class="label">
                        <span class="label-text">아이디</span>
                    </label>
                    <input placeholder="로그인아이디를 입력해주세요." class="input input-bordered" type="text" name="loginId">
                    <label class="label">
                        <span class="label-text">비밀번호</span>
                    </label>
                    <input type="password" name="loginPw" placeholder="비밀번호를 입력해주세요." class="input input-bordered">

                    <button type="submit" class="btn btn-outline mt-4">로그인</button>
                    <button type="button" onclick="location.href='./join'" class="btn btn-outline mt-4">회원가입</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require_once __DIR__ . "/../foot.php"; ?>