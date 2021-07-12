<?php
namespace App\Container;

use App\Application;
use App\Repository\BoardRepository;
use App\Repository\ArticleRepository;
use App\Repository\MemberRepository;
use App\Service\BoardService;
use App\Service\ArticleService;
use App\Service\MemberService;

trait Container {
    public static function application(): Application {
        static $instance;

        if ( $instance == null ) {
            $instance = new Application();
        }

        return $instance;
    }

    public static function boardService(): BoardService {
        static $instance;

        if ( $instance == null ) {
            $instance = new BoardService();
        }

        return $instance;
    }

    public static function boardRepository(): BoardRepository {
        static $instance;

        if ( $instance == null ) {
            $instance = new BoardRepository();
        }

        return $instance;
    }

    public static function memberService(): MemberService {
        static $instance;

        if ( $instance == null ) {
            $instance = new MemberService();
        }

        return $instance;
    }

    public static function memberRepository(): MemberRepository {
        static $instance;

        if ( $instance == null ) {
            $instance = new MemberRepository();
        }

        return $instance;
    }

    public static function articleService(): ArticleService {
        static $instance;

        if ( $instance == null ) {
            $instance = new ArticleService();
        }

        return $instance;
    }

    public static function articleRepository(): ArticleRepository {
        static $instance;

        if ( $instance == null ) {
            $instance = new ArticleRepository();
        }

        return $instance;
    }

    
}