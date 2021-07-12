<?php

namespace App\Repository;

use DB__SeqSql;

class BoardRepository
{
    public function makeBoard(int $memberId, string $code, string $name)
    {
        $sql = DB__secSql();
        $sql->add("INSERT INTO board");
        $sql->add("SET regDate = NOW()");
        $sql->add(", updateDate = NOW()");
        $sql->add(", `code` = ?", $code);
        $sql->add(", `name` = ?", $name);
        DB__insert($sql);
    }

    public function getBoardsByASC() : array{
        $sql = DB__secSql();
        $sql->add("SELECT * FROM board ORDER BY id ASC");
        $boards = DB__getRows($sql);

        return $boards;
    }
}