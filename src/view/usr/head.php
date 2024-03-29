<?php
if (isset($pageTitle) == false) {
    $pageTitle = "";
}

$application = $this->application();
$envCode = $application->getEnvCode();
$prodSiteDomain = $application->getProdSiteDomain();
$isLogined = $_REQUEST['App__isLogined'];
$loginedMemberId = $_REQUEST['App__loginedMemberId'];
$loginedMember = $_REQUEST['App__loginedMember'];

$boards = $this->boardService()->getBoardsByASC();
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>

    <!-- 제이쿼리 불러오기 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- 폰트어썸 불러오기 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- 테일윈드 불러오기 -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
    <!-- 데이지UI 불러오기, 테일윈드 필요 -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.3.2/dist/full.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="/resource/common.css">
    <script type="text/javascript" src="/resource/common.js" defer></script>

    <?php if ($envCode == 'prod') { ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-94LNZ8CK0K"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-94LNZ8CK0K');
    </script>
    <?php } ?>

    <?php require_once "meta.php"; ?>

</head>

<body>
    <div class="site-wrap min-h-screen flex flex-col pt-10">
        <header class="top-bar fixed top-0 inset-x-0 bg-navy text-white h-10 z-10 maple-font hidden md:block">
            <div class="container mx-auto h-full flex">
                <a href="/" class="top-bar__logo px-5 flex items-center">
                    <span><i class="fas fa-desktop"></i></span>
                    <span class="ml-2 font-bold hidden sm:inline">NCD BLOG</span>
                </a>

                <div class="flex-grow w-0"></div>

                <nav class="top-bar__menu-box-1 flex-grow w-0">
                    <ul class="flex  h-full justify-end ">
                        <li class="flex-grow">
                            <a href="/usr/home/aboutMe" class="h-full flex items-center px-5 h-10 justify-center">
                                <span><i class="far fa-id-card"></i></span>
                                <span class="ml-2 font-bold">ABOUT ME</span>
                            </a>
                        </li>
                        <li class="flex-grow">
                            <a href="/usr/board/make" class="h-full flex items-center px-5 h-10 justify-center">
                                <span><i class="fas fa-book"></i></span>
                                <span class="ml-2 font-bold">BOARD</span>
                            </a>
                            <ul>
                                <li>
                                    <a href="/usr/board/make" class="h-10 flex items-center px-5 flex-grow justify-center">
                                        <span><i class="fas fa-book"></i></span>
                                        <span class="ml-2 font-bold">MAKE BOARD</span>
                                    </a>
                                </li>
                                <li class="flex flex-grow items-center">
                                    <a class="h-10 flex items-center px-5 justify-center flex-grow"
                                        href="/usr/article/list">
                                        <span><i class="fas fa-book-open"></i></span>
                                        <span class="ml-2 font-bold">전체보기</span>
                                    </a>
                                </li>
                                <?php foreach ($boards as $board) { ?>
                                <li class="flex flex-grow items-center">
                                    <a class="h-10 flex items-center px-5 justify-center flex-grow" href="/usr/article/list?boardId=<?= $board['id'] ?>">
                                        <?php if($board['code'] === "java"){ ?>
                                            <span><i class="fab fa-java"></i></span>
                                        <?php } else if($board['code'] === "html/css"){  ?>
                                            <span><i class="fab fa-html5"></i></span>
                                        <?php } else {?>
                                            <span><i class="fas fa-book"></i></span>
                                        <?php }?>
                                        <span class="ml-2 font-bold"><?= $board['name'] ?></span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php if ($isLogined) { ?>
                        <li class="flex-grow">
                            <a href="/usr/member/doLogout" class="h-full flex items-center px-5 justify-center">
                                <span><i class="fas fa-sign-out-alt"></i></span>
                                <span class="ml-2 font-bold">LOGOUT</span>
                            </a>
                        </li>
                        <?php } else { ?>
                        <li class="flex-grow">
                            <a href="/usr/member/login" class="h-full flex items-center px-5 justify-center">
                                <span><i class="fas fa-sign-in-alt"></i></span>
                                <span class="ml-2 font-bold">LOGIN</span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </header>

        <header class="mobile-top-bar fixed top-0 inset-x-0 bg-navy text-white h-10 z-10 maple-font md:hidden">
            <div class="container mx-auto h-full flex">
                <div class="flex-grow w-0"></div>
                <a href="/" class="top-bar__logo px-5 flex items-center">
                    <span><i class="fas fa-desktop"></i></span>
                    <span class="ml-2 font-bold">NCD BLOG</span>
                </a>
                <div class="flex-grow flex items-center h-full w-0">
                    <div
                        class="mobile-top-bar__side-menu-open-btn ml-auto flex items-center h-full px-4 cursor-pointer">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </div>
        </header>

        <nav class="mobile-side-menu z-20 md:hidden">
            <div class="mobile-side-menu__bg fixed inset-0">
                <div class="mobile-side-menu__content flex flex-col">
                    <div class="mobile-side-menu__head flex justify-end h-10 flex-shrink-0">
                        <div class="mobile-side-menu__close-btn px-4 flex items-center text-navy cursor-pointer">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="mobile-side-menu__body overflow-y-auto flex-gorw px-4">
                        <ul class="mobile-side-menu__link-box flex flex-grow border-b-8 border-gray-100 maple-font">
                            <li class="flex-grow">
                                <a onclick="location.href='/usr/home/aboutMe'" class="h-full flex items-center justify-center text-navy cursor-pointer">
                                    <span><i class="far fa-id-card"></i></span>
                                    <span class="ml-2 font-bold">ABOUT ME</span>
                                </a>
                            </li>
                            <?php if ($isLogined) { ?>
                            <li class="flex-grow">
                                <a onclick="location.href='/usr/member/dologout'" class="h-full flex items-center justify-center text-navy cursor-pointer">
                                    <span><i class="fas fa-sign-out-alt"></i></span>
                                    <span class="ml-2 font-bold">LOGOUT</span>
                                </a>
                            </li>
                            <?php } else { ?>
                            <li class="flex-grow">
                                <a onclick="location.href='/usr/member/login'" class="h-full flex items-center justify-center text-navy cursor-pointer">
                                    <span><i class="fas fa-sign-in-alt"></i></span>
                                    <span class="ml-2 font-bold">LOGIN</span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                        <ul class="mobile-side-menu__board-box flex flex-col maple-font">
                            <li class="flex flex-grow items-center">
                                <a onclick="location.href='/usr/article/list'" class="block w-full p-3 cursor-pointer">전체보기</a>
                            </li>
                            <?php foreach ($boards as $board) { ?>
                            <li class="flex flex-grow items-center">
                                <a onclick="location.href='/usr/article/list?boardId=<?= $board['id'] ?>'" class="block w-full p-3 cursor-pointer"><?= $board['name'] ?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="flex-grow">
            <section class="section-title mt-5 text-2xl font-bold">
                <h1 class="container mx-auto">
                    <div class="con-pad maple-font">
                        <span><?= $pageTitleIcon ?></span>
                        <span><?= $pageTitle ?></span>
                    </div>
                </h1>
            </section>