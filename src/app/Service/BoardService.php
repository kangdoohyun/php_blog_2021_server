<?php

namespace App\Service;

use App\Container\Container;

class BoardService
{
    use Container;
    public function makeBoard(int $memberId, string $code, string $name)
    {
        $this->boardRepository()->makeBoard($memberId, $code, $name);
    }
}