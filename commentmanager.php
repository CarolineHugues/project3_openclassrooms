<?php

class CommentManager extends Manager 
{
	public function add(Comment $comment) 
	{
		if ($comment->isValid())
		{
			if ($comment->isNew()) 
			{
				$request = $this->db->prepare('INSERT INTO comments (author, content, publishedDate, authorMail, status) VALUES(:author, :content, NOW(), :authorMail, :status)');

				$request->bindValue(':author', $comments->author());
				$request->bindValue(':content', $comments->content());
				$request->bindValue(':authorMail', $comments->authorMail());
				$request->bindValue(':status', $comments->status());

				$request->execute();
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

	public function countReportedComments() 
	{
		return $this->db->query('SELECT COUNT(*) FROM comments WHERE status = \'reported\'')->fetchColumn();
	}

	public function reportComment() 
	{
		$status = 'reported';

		$request = $this->db->prepare('UPDATE comments SET status = :status WHERE id = :id');

		$request->bindValue(':status', $status, PDO::PARAM_STR);
		$request->bindValue(':id', $comment->id(), PDO::PARAM_INT);

		$request->execute();
	}

	public function getUnique($id) 
	{
		$request = $this->db->prepare('SELECT id, author, content, publishedDate, authorMail, status FROM comments WHERE id = :id');

		$request->bindValue(':id', (int) $id, PDO::PARAM_INT);

		$request->execute();

		$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\Entity\Comment');

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
		$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\Entity\Comment');

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
		$sql = 'SELECT id, author, content, publishedDate, authorMail, status FROM comments WHERE status = \'reported\' ORDER BY id DESC';

		if ($start != -1 || $limit != -1)
			{
				$sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $start;
			}

		$request = $this->db->query($sql);
		$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\Entity\Comment');

		$reportedList = $request->fetchAll();

		foreach ($reportedList as $comment)
		{
			$comment->setPublishedDate(new DateTime($comment->publishedDate()));
		}

		$request->closeCursor();

		return $reportedList;
	}

}