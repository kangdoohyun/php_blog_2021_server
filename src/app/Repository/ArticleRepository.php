<?php

namespace App\Repository;

class ArticleRepository
{
    public function getTotalArticlesCount(int $boardId, string $searchKeyword, string $searchKeywordTypeCode): int
    {
        $sql = DB__secSql();
        $sql->add("SELECT COUNT(*) AS cnt");
        $sql->add("FROM article AS A");
        $sql->add("LEFT JOIN board AS B");
        $sql->add("ON A.boardId = B.id");
        $sql->add("WHERE 1");
        if($boardId != 0){
            $sql->add("AND B.id = ?", $boardId);
        }
        if(strlen($searchKeyword) != 0){
            switch($searchKeywordTypeCode){
            case "title":
                $sql->add("AND A.title LIKE CONCAT('%', ?, '%')", $searchKeyword);
                break;
            case "body":
                $sql->add("AND A.body LIKE CONCAT('%', ?, '%')", $searchKeyword);
                break;
            case "title,body":
                $sql->add("AND A.title LIKE CONCAT('%', ?, '%')", $searchKeyword);
                break;
            }
        }
        
        return DB__getRowIntValue($sql, 0);
    }

    public function getForPrintArticles(int $boardId, string $searchKeyword, string $searchKeywordTypeCode, int $limitFrom, int $limitTake): array
    {
        $sql = DB__secSql();
        $sql->add("SELECT A.*");
        $sql->add(", IFNULL(M.nickname, '삭제된사용자') AS extra__writerName");
        $sql->add(", B.id AS realBoardId");
        $sql->add("FROM article AS A");
        $sql->add("LEFT JOIN `member` AS M");
        $sql->add("ON A.memberId = M.id");
        $sql->add("LEFT JOIN board AS B");
        $sql->add("ON A.boardId = B.id");
        $sql->add("WHERE 1");
        if($boardId != 0){
            $sql->add("AND B.id = ?", $boardId);
        }
        if(strlen($searchKeyword) != 0){
            switch($searchKeywordTypeCode){
            case "title":
                $sql->add("AND A.title LIKE CONCAT('%', ?, '%')", $searchKeyword);
                break;
            case "body":
                $sql->add("AND A.body LIKE CONCAT('%', ?, '%')", $searchKeyword);
                break;
            case "title,body":
                $sql->add("AND A.title LIKE CONCAT('%', ?, '%')", $searchKeyword);
                break;
            }
        }
        $sql->add("ORDER BY A.id DESC");
        $sql->add("LIMIT ?", $limitTake);
        $sql->add("OFFSET ?", $limitFrom);
        
        return DB__getRows($sql);
    }

    public function getForPrintArticleById(int $id): array|null
    {
        $sql = DB__secSql();
        $sql->add("SELECT A.*");
        $sql->add(", IFNULL(M.nickname, '삭제된사용자') AS extra__writerName");
        $sql->add("FROM article AS A");
        $sql->add("LEFT JOIN `member` AS M");
        $sql->add("ON A.memberId = M.id");
        $sql->add("WHERE A.id = ?", $id);
        return DB__getRow($sql);
    }

    public function writeArticle(int $memberId, int $boardId, string $title, string $body): int
    {
        $sql = DB__secSql();
        $sql->add("INSERT INTO article");
        $sql->add("SET regDate = NOW()");
        $sql->add(", updateDate = NOW()");
        $sql->add(", memberId = ?", $memberId);
        $sql->add(", boardId = ?", $boardId);
        $sql->add(", title = ?", $title);
        $sql->add(", `body` = ?", $body);
        $id = DB__insert($sql);

        return $id;
    }

    public function modifyArticle(int $id, string $title, string $body)
    {
        $sql = DB__secSql();
        $sql->add("UPDATE article");
        $sql->add("SET updateDate = NOW()");
        $sql->add(", title = ?", $title);
        $sql->add(", `body` = ?", $body);
        $sql->add("WHERE id = ?", $id);
        $id = DB__update($sql);
    }

    public function deleteArticle(int $id)
    {
        $sql = DB__secSql();
        $sql->add("DELETE FROM article");
        $sql->add("WHERE id = ?", $id);
        $id = DB__delete($sql);
    }
}