<?php

class ArticleDB
{
      private PDOStatement $statementReadOne;
      private PDOStatement $statementUpdateOne;
      private PDOStatement $statementCreateOne;
      private PDOStatement $statementReadAll;
      private PDOStatement $statementDeleteOne;
      private PDOStatement $statementReadUserAll;


      function __construct(private PDO $pdo)
      {
            $this->statetementReadOne = $pdo->prepare('SELECT article.*, user.firstname, user.lastname FROM article LEFT JOIN user ON article.author = user.id WHERE article.id=:id');
            //user.firstname, user.lastname on peut aussi mettre firstname et lastname sans "user."


            $this->statementReadAll = $pdo->prepare("SELECT article.*, user.firstname, user.lastname FROM article LEFT JOIN user ON article.author = user.id");
            // LEFT permet de recupérérer tous les articles même si il n'y a pas d'auteur. Si on ne le met pas ça ne récupérera que les articles avec un auteur.


            $this->statetementCreateOne = $pdo->prepare('INSERT INTO article (
            title, 
            category,
            content,
            image,
            author
            ) VALUES (
            :title,
            :category, 
            :content, 
            :image,
            :author)
            ');

            $this->statetementUpdateOne = $pdo->prepare('

            UPDATE article 

    SET     
             title=:title, 
             category=:category, 
             content=:content, 
             image=:image,
             author=:author
            
    WHERE id=:id
            ');


            $this->statetementDeleteOne = $pdo->prepare("DELETE  FROM article where id=:id");


            $this->statementReadUserAll = $pdo->prepare('SELECT * FROM article WHERE author=:authorId');
      }


      public function fetchAll(): array
      {
            $this->statementReadAll->execute();
            return $this->statementReadAll->fetchAll();
      }

      public function fetchOne(string $id): array
      {
            $this->statetementReadOne->bindValue(':id', $id);
            $this->statetementReadOne->execute();
            return $this->statetementReadOne->fetch();
      }

      public function deleteOne(string $id): string
      {
            $this->statetementDeleteOne->bindValue(':id', $id);
            $this->statetementDeleteOne->execute();
            return $id;
      }

      public function CreateOne($article): array
      {
            $this->statetementCreateOne->bindValue(':title', $article['title']);
            $this->statetementCreateOne->bindValue(':image', $article['image']);
            $this->statetementCreateOne->bindValue(':category', $article['category']);
            $this->statetementCreateOne->bindValue(':content', $article['content']);
            $this->statetementCreateOne->bindValue(':author', $article['author']);
            $this->statetementCreateOne->execute();
            $this->fetchOne($this->pdo->lastInsertId());
      }


      public function UpdateOne($article): array
      {
            $this->statetementUpdateOne->bindValue(':title', $article['title']);
            $this->statetementUpdateOne->bindValue(':image', $article['image']);
            $this->statetementUpdateOne->bindValue(':category', $article['category']);
            $this->statetementUpdateOne->bindValue(':content', $article['content']);
            $this->statetementUpdateOne->bindValue(':id', $article['id']);
            $this->statetementUpdateOne->bindValue(':author', $article['author']);
            $this->statetementUpdateOne->execute();
            return $article;
      }

      public function fetchUserArticle(string $authorId): array
      {
            $this->statementReadUserAll->bindValue(':authorId', $authorId);
            $this->statementReadUserAll->execute();
            return $this->statementReadUserAll->fetchAll();
      }
}

return new ArticleDB($pdo);
