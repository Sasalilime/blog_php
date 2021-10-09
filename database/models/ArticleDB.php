<?php

class ArticleDB
{
      private PDOStatement $statementReadOne;
      private PDOStatement $statementUpdateOne;
      private PDOStatement $statementCreateOne;
      private PDOStatement $statementReadAll;
      private PDOStatement $statementDeleteOne;


      function __construct(private PDO $pdo)
      {
            $this->statetementReadOne = $pdo->prepare('SELECT * FROM article WHERE id=:id');

            $this->statementReadAll = $pdo->prepare("SELECT * FROM article");

            $this->statetementCreateOne = $pdo->prepare('INSERT INTO article (
            title, 
            category,
            content,
            image
            ) VALUES (
            :title,
            :category, 
            :content, 
            :image)
            ');

            $this->statetementUpdateOne = $pdo->prepare('

            UPDATE article 

    SET     
             title=:title, 
             category=:category, 
             content=:content, 
             image=:image
            
    WHERE id=:id
            ');


            $this->statetementDeleteOne = $pdo->prepare("DELETE  FROM article where id=:id");
      }


      public function fetchAll()
      {
            $this->statementReadAll->execute();
            return $this->statementReadAll->fetchAll();
      }

      public function fetchOne(string $id)
      {
            $this->statetementReadOne->bindValue(':id', $id);
            $this->statetementReadOne->execute();
            return $this->statetementReadOne->fetch();
      }

      public function deleteOne(string $id)
      {
            $this->statetementDeleteOne->bindValue(':id', $id);
            $this->statetementDeleteOne->execute();
            return $id;
      }

      public function CreateOne($article)
      {
            $this->statetementCreateOne->bindValue(':title', $article['title']);
            $this->statetementCreateOne->bindValue(':image', $article['image']);
            $this->statetementCreateOne->bindValue(':category', $article['category']);
            $this->statetementCreateOne->bindValue(':content', $article['content']);
            $this->statetementCreateOne->execute();
            $this->fetchOne($this->pdo->lastInsertId());
      }


      public function UpdateOne($article)
      {
            $this->statetementUpdateOne->bindValue(':title', $article['title']);
            $this->statetementUpdateOne->bindValue(':image', $article['image']);
            $this->statetementUpdateOne->bindValue(':category', $article['category']);
            $this->statetementUpdateOne->bindValue(':content', $article['content']);
            $this->statetementUpdateOne->bindValue(':id', $article['id']);
            $this->statetementUpdateOne->execute();
            return $article;
      }
}

return new ArticleDB($pdo);
