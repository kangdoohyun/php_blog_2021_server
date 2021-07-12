<?php

namespace App\Controller;

use App\Container\Container;
use App\Controller\Controller;
use App\Service\BoardService;

class UsrBoardController extends Controller
{
    use Container;

    public function actionShowMake()
    {
        require_once $this->getViewPath("usr/board/make");
    }

    public function actionDoMake()
    {   
        $code = getStrValueOr($_REQUEST['code'], "");
        $name = getStrValueOr($_REQUEST['name'], "");

        if (!$code) {
            jsHistoryBackExit("코드를 입력해주세요.");
        }

        if (!$name) {
            jsHistoryBackExit("이름을 입력해주세요.");
        }

        if ($_REQUEST['App__loginedMemberId'] != 1) {
            jsHistoryBackExit("관리자만 게시판을 생성할 수있습니다.");
        }

        $this->boardService()->makeBoard($_REQUEST['App__loginedMemberId'], $code, $name);
        unset($_SESSION['loginedMemberId']);
        
        jsLocationReplaceExit("../article/list", "${name} 게시판이 생성되었습니다");
    }
}