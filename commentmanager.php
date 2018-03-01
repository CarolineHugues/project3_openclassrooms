<?php

class CommentManager extends Manager 
{
	public function add(Comment $comment) 
	{
		$requete = $this->db->prepare('INSERT INTO comments (author, content, publishedDate, authorMail, status) VALUES(:author, :content, NOW(), :authorMail, :status)');

		$requete->bindValue(':author', $comments->author());
		$requete->bindValue(':content', $comments->content());
		$requete->bindValue(':authorMail', $comments->authorMail());
		$requete->bindValue(':status', $comments->status());

		$requete->execute();
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

		$requete = $this->db->prepare('UPDATE comments SET status = :status WHERE id = :id');

		$requete->bindValue(':status', $status, PDO::PARAM_STR);
		$requete->bindValue(':id', $comment->id(), PDO::PARAM_INT);

		$requete->execute();
	}

	public function getUnique($id) 
	{
		$requete = $this->db->prepare('SELECT id, author, content, publishedDate, authorMail, status FROM comments WHERE id = :id');

		$requete->bindValue(':id', (int) $id, PDO::PARAM_INT);

		$requete->execute();

		$requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\Entity\Comment');

		$comment = $requete->fetch();

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

		$requete = $this->db->query($sql);
		$requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\Entity\Comment');

		$commentsList = $requete->fetchAll();

		foreach ($commentsList as $comment)
		{
			$comment->setPublishedDate(new DateTime($comment->publishedDate()));
		}

		$requete->closeCursor();

		return $commentsList;
	}

	public function getReportedList($start = -1, $limit = -1) 
	{
		$sql = 'SELECT id, author, content, publishedDate, authorMail, status FROM comments WHERE status = \'reported\' ORDER BY id DESC';

		if ($start != -1 || $limit != -1)
			{
				$sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $start;
			}

		$requete = $this->db->query($sql);
		$requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\Entity\Comment');

		$reportedList = $requete->fetchAll();

		foreach ($reportedList as $comment)
		{
			$comment->setPublishedDate(new DateTime($comment->publishedDate()));
		}

		$requete->closeCursor();

		return $reportedList;
	}

}