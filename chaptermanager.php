<?php

class ChapterManager 
{
	private  $_db;

	public function __construct($db) 
	{
		$this->setDb($db);
	}

	public function setDb(PDO $db) 
	{
		$this->_db = $db;
	}

	public function add(Chapter $chapter) 
	{
		$requete = $this->db->prepare('INSERT INTO chapters (title, author, content, excerpt, addDate, updateDate, publishedDate, status) VALUES(:title, :author, :content, :excerpt, NOW(), NOW(), NOW(), :status)');

		$requete->bindValue(':title', $chapter->title());
		$requete->bindValue(':author', $chapter->author());
		$requete->bindValue(':content', $chapter->content());
		$requete->bindValue(':excerpt', $chapter->excerpt());
		$requete->bindValue(':status', $chapter->status());

		$requete->execute();
	}

	public function update(Chapter $chapter) 
	{
		$requete = $this->db->prepare('UPDATE chapters SET title = :title, author = :author, content = :content, excerpt = :excerpt, updateDate = NOW(), publishedDate = NOW(), status = :status WHERE id = :id');

		$requete->bindValue(':title', $chapter->title());
		$requete->bindValue(':author', $chapter->author());
		$requete->bindValue(':content', $chapter->content());
		$requete->bindValue(':excerpt', $chapter->excerpt());
		$requete->bindValue(':status', $chapter->status());
		$requete->bindValue(':id', $chapter->id(), PDO::PARAM_INT);

		$requete->execute();
	}

	public function delete($id) 
	{+
		$this->db->exec('DELETE FROM chapters WHERE id = '.(int) $id);
	}

	public function save(Chapter $chapter) 
	{
		if ($chapter->isValid())
		{
			$chapter->isNew() ? $this->add($chapter) : $this->update($chapter);
		}
		else
		{
			throw new RuntimeException('Le chapitre doit être valide pour être enregistrée');
		}
	}

	public function publish(Chapter $chapter) 
	{
		$status = 'published';

		$requete = $this->db->prepare('UPDATE chapters SET status = :status WHERE id = :id');

		$requete->bindValue(':status', $status, PDO::PARAM_STR);
		$requete->bindValue(':id', $chapter->id(), PDO::PARAM_INT);

		$requete->execute();
	}

	public function countDrafts() 
	{
		{
			return $this->db->query('SELECT COUNT(*) FROM chapters WHERE status = \'draft\'')->fetchColumn(); 
		}
	}

	public function countPublished() 
	{
		{
			return $this->db->query('SELECT COUNT(*) FROM chapters WHERE status = \'published\'')->fetchColumn(); 
		}
	}

	public function countChapters() 
	{
		public function count()
		{ 
			return $this->db->query('SELECT COUNT(*) FROM chapters')->fetchColumn();  
		}
	}

	public function getUnique($id) 
	{
		$requete = $this->db->prepare('SELECT id, title, author, content, excerpt, addDate, updateDate, publishedDate, status FROM chapters WHERE id = :id');

		$requete->bindValue(':id', (int) $id, PDO::PARAM_INT);

		$requete->execute();

		$requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\Entity\Chapter');

		$chapter = $requete->fetch();

		$chapter->setAddDate(new DateTime($chapter->AddDate()));
		$chapter->setUpdateDate(new DateTime($chapter->updateDate()));
		$chapter->setPunlishedDate(new DateTime($chapter->publishedDate()));

		return $chapter;
	}

	public function getDraftsList($start = -1, $limit = -1) 
	{
		$sql = 'SELECT id, title, author, content, excerpt, addDate, updateDate, publishedDate, status FROM chapters WHERE status = \'draft\' ORDER BY id DESC';

		if ($start != -1 || $limit != -1)
			{
				$sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $start;
			}

		$requete = $this->db->query($sql);
		$requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\Entity\Chapter');

		$DraftsList = $requete->fetchAll();

		foreach ($DraftsList as $chapter)
		{
			$chapter->setAddDate(new DateTime($chapter->AddDate()));
			$chapter->setUpdateDate(new DateTime($chapter->updateDate()));
			$chapter->setPublishedDate(new DateTime($chapter->publishedDate()));
		}

		$requete->closeCursor();

		return $DraftsList;
	}

	public function getPublishedList($start = -1, $limit = -1) 
	{
		$sql = 'SELECT id, title, author, content, excerpt, addDate, updateDate, publishedDate, status FROM chapters WHERE status = \'published\' ORDER BY id DESC';

		if ($start != -1 || $limit != -1)
			{
				$sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $start;
			}

		$requete = $this->db->query($sql);
		$requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\Entity\Chapter');

		$PublishedChaptersList = $requete->fetchAll();

		foreach ($PublishedChaptersList as $chapter)
		{
			$chapter->setAddDate(new DateTime($chapter->AddDate()));
			$chapter->setUpdateDate(new DateTime($chapter->updateDate()));
			$chapter->setPublishedDate(new DateTime($chapter->publishedDate()));
		}

		$requete->closeCursor();

		return $PublishedChaptersList;
	}

	public function getList($start = -1, $limit = -1) 
	{
		$sql = 'SELECT id, title, author, content, excerpt, addDate, updateDate, publishedDate, status FROM chapters ORDER BY id DESC';

		if ($start != -1 || $limit != -1)
			{
				$sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $start;
			}

		$requete = $this->db->query($sql);
		$requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, '\Entity\Chapter');

		$chaptersList = $requete->fetchAll();

		foreach ($chaptersList as $chapter)
		{
			$chapter->setAddDate(new DateTime($chapter->AddDate()));
			$chapter->setUpdateDate(new DateTime($chapter->updateDate()));
			$chapter->setPublishedDate(new DateTime($chapter->publishedDate()));
		}

		$requete->closeCursor();

		return $chaptersList;
	}

}