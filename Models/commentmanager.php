<?php
require_once 'Models/manager.php';  /*A ajouter ? */
require_once 'Models/comment.php'; /*A ajouter ? */

class CommentManager extends Manager 
{
	public function add(Comment $comment) 
	{
		if ($comment->isValid())
		{
			if ($comment->isNew()) 
			{
				$request = $this->db->prepare('INSERT INTO comments (author, content, publishedDate, authorMail, status, chapterId) VALUES(:author, :content, NOW(), :authorMail, :status, :chapterId)');

				$request->bindValue(':author', htmlspecialchars($comment->author()));
				$request->bindValue(':content', htmlspecialchars($comment->content()));
				$request->bindValue(':authorMail', htmlspecialchars($comment->authorMail()));
				$request->bindValue(':status', $comment->status());
				$request->bindValue(':chapterId', $comment->chapterId(), PDO::PARAM_INT);

				$request->execute();

				$request->closeCursor(); 
			}
			else 
			{
				throw new RuntimeException('Le commentaire a déjà été ajouté');
			}
		}
		else 
		{
			throw new RuntimeException('Le commentaire doit être valide pour être enregistré');
		}
	}

	public function delete($id) 
	{
		$this->db->exec('DELETE FROM comments WHERE id = '.(int) $id);
	}

	public function countComments() 
	{
		return $this->db->query('SELECT COUNT(*) FROM comments')->fetchColumn(); 
	}

	public function countPublishedComments() 
	{
		return $this->db->query('SELECT COUNT(*) FROM comments WHERE status = \'published\'')->fetchColumn();
	}

	public function countReportedComments() 
	{
		return $this->db->query('SELECT COUNT(*) FROM comments WHERE status = \'reported\'')->fetchColumn();
	}

	public function reportComment($id) 
	{
		$this->db->exec('UPDATE comments SET status = \'reported\' WHERE id =' .(int) $id);
	}

	public function ignoreReportedComment($id) 
	{
		$this->db->exec('UPDATE comments SET status = \'published\' WHERE id =' .(int) $id);
	}

	public function getUnique($id) 
	{
		$request = $this->db->prepare('SELECT id, author, content, publishedDate, authorMail, status FROM comments WHERE id = :id');

		$request->bindValue(':id', (int) $id, PDO::PARAM_INT);

		$request->execute();

		$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comment');

		$comment = $request->fetch();

		$comment->setPublishedDate(new DateTime($comment->publishedDate()));

		return $comment;
	}

	public function getList($start = -1, $limit = -1) 
	{
		$sql = 'SELECT id, author, content, publishedDate, authorMail, status FROM comments ORDER BY id DESC';

		if ($start != -1 || $limit != -1)
			{
				$sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $start;
			}

		$request = $this->db->query($sql);
		$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comment');

		$commentsList = $request->fetchAll();

		foreach ($commentsList as $comment)
		{
			$comment->setPublishedDate(new DateTime($comment->publishedDate()));
		}

		$request->closeCursor();

		return $commentsList;
	}

	public function getReportedList($start = -1, $limit = -1) 
	{
		$sql = 'SELECT co.id, ch.title, co.author, co.content, DATE_FORMAT(co.publishedDate, \'%d/%m/%Y à %Hh%i\') AS publishedDate_fr, co.authorMail, co.status, co.chapterId FROM comments co INNER JOIN chapters ch  ON ch.id = co.chapterId WHERE co.status = \'reported\' ORDER BY id DESC';

		if ($start != -1 || $limit != -1)
			{
				$sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $start;
			}

		$request = $this->db->query($sql);
		$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comment');

		$reportedList = $request->fetchAll();

		foreach ($reportedList as $comment)
		{
			$comment->setPublishedDate(new DateTime($comment->publishedDate()));
		}

		$request->closeCursor();

		return $reportedList;
	}

	public function getPublishedList($start = -1, $limit = -1) 
	{
		$sql = 'SELECT co.id, ch.title, co.author, co.content, DATE_FORMAT(co.publishedDate, \'%d/%m/%Y à %Hh%i\') AS publishedDate_fr, co.authorMail, co.status, co.chapterId FROM comments co INNER JOIN chapters ch ON ch.id = co.chapterId WHERE co.status = \'published\' ORDER BY id DESC';

		if ($start != -1 || $limit != -1)
			{
				$sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $start;
			}

		$request = $this->db->query($sql);
		$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comment');

		$publishedList = $request->fetchAll();

		foreach ($publishedList as $comment)
		{
			$comment->setPublishedDate(new DateTime($comment->publishedDate()));
		}

		$request->closeCursor();

		return $publishedList;
	}

	public function getListOf($chapterId)
  	{
  		if (!ctype_digit($chapterId))
  		{
  			throw new \InvalidArgumentException('L\'identifiant du chapitre passé doit être un nombre entier valide');
  		}

  		$request = $this->db->prepare('SELECT id, author, content, DATE_FORMAT(publishedDate, \'%d/%m/%Y à %Hh%i\') AS publishedDate_fr, authorMail, status, chapterId FROM comments WHERE chapterId = :chapterId');
    	$request->bindValue(':chapterId', $chapterId, PDO::PARAM_INT);
   		$request->execute();
    
    	$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comment');
    
    	$comments = $request->fetchAll();
    
   		return $comments;
  	}
}