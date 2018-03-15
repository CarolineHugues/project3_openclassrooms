<?php
require_once 'Models/manager.php';  /*A ajouter ? */
require_once 'Models/chapter.php'; /*A ajouter ? */

class ChapterManager extends Manager 
{ 
	public function add(Chapter $chapter) 
	{
		$request = $this->db->prepare('INSERT INTO chapters (title, author, content, excerpt, addDate, updateDate, publishedDate, status) VALUES(:title, :author, :content, :excerpt, NOW(), NOW(), NOW(), :status)');

		$request->bindValue(':title', $chapter->title());
		$request->bindValue(':author', $chapter->author());
		$request->bindValue(':content', $chapter->content());
		$request->bindValue(':excerpt', $chapter->excerpt());
		$request->bindValue(':status', $chapter->status());

		$request->execute();

		$request->closeCursor(); 
	}

	public function update(Chapter $chapter) 
	{
		$request = $this->db->prepare('UPDATE chapters SET title = :title, author = :author, content = :content, excerpt = :excerpt, updateDate = NOW(), publishedDate = NOW(), status = :status WHERE id = :id');

		$request->bindValue(':title', $chapter->title());
		$request->bindValue(':author', $chapter->author());
		$request->bindValue(':content', $chapter->content());
		$request->bindValue(':excerpt', $chapter->excerpt());
		$request->bindValue(':status', $chapter->status());
		$request->bindValue(':id', $chapter->id(), PDO::PARAM_INT);

		$request->execute();

		$request->closeCursor(); 
	}

	public function delete($id) 
	{
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
		$this->db->exec('UPDATE chapters SET status = \'published\' WHERE id = :id');
	}

	public function countDrafts() 
	{
		return $this->db->query('SELECT COUNT(*) FROM chapters WHERE status = \'draft\'')->fetchColumn(); 
	}

	public function countPublished() 
	{
			return $this->db->query('SELECT COUNT(*) FROM chapters WHERE status = \'published\'')->fetchColumn(); 
	}

	public function countChapters() 
	{
			return $this->db->query('SELECT COUNT(*) FROM chapters')->fetchColumn();  
	}

	public function getUnique($id) 
	{
		$request = $this->db->prepare('SELECT id, title, author, content, excerpt, addDate, updateDate, publishedDate, status FROM chapters WHERE id = :id');

		$request->bindValue(':id', (int) $id, PDO::PARAM_INT);

		$request->execute();

		$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Chapter');

		$chapter = $request->fetch();

		$chapter->setAddDate(new DateTime($chapter->addDate()));
		$chapter->setUpdateDate(new DateTime($chapter->updateDate()));
		$chapter->setPublishedDate(new DateTime($chapter->publishedDate()));

		return $chapter;
	}

	public function getDraftsList($start = -1, $limit = -1) 
	{
		$sql = 'SELECT id, title, author, content, excerpt, addDate, updateDate, publishedDate, status FROM chapters WHERE status = \'draft\' ORDER BY id DESC';

		if ($start != -1 || $limit != -1)
			{
				$sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $start;
			}

		$request = $this->db->query($sql);
		$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Chapter');

		$DraftsList = $request->fetchAll();

		foreach ($DraftsList as $chapter)
		{
			$chapter->setAddDate(new DateTime($chapter->AddDate()));
			$chapter->setUpdateDate(new DateTime($chapter->updateDate()));
			$chapter->setPublishedDate(new DateTime($chapter->publishedDate()));
		}

		$request->closeCursor();

		return $DraftsList;
	}

	public function getPublishedList($start = -1, $limit = -1) 
	{
		$sql = 'SELECT id, title, author, content, excerpt, addDate, updateDate, publishedDate, status FROM chapters WHERE status = \'published\' ORDER BY id DESC';

		if ($start != -1 || $limit != -1)
			{
				$sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $start;
			}

		$request = $this->db->query($sql);
		$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Chapter');

		$PublishedChaptersList = $request->fetchAll();

		foreach ($PublishedChaptersList as $chapter)
		{
			$chapter->setAddDate(new DateTime($chapter->AddDate()));
			$chapter->setUpdateDate(new DateTime($chapter->updateDate()));
			$chapter->setPublishedDate(new DateTime($chapter->publishedDate()));
		}

		$request->closeCursor();

		return $PublishedChaptersList;
	}

	public function getList($start = -1, $limit = -1) 
	{
		$sql = 'SELECT id, title, author, content, excerpt, addDate, updateDate, publishedDate, status FROM chapters ORDER BY id DESC';

		if ($start != -1 || $limit != -1)
			{
				$sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $start;
			}

		$request = $this->db->query($sql);
		$request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Chapter');

		$chaptersList = $request->fetchAll();

		foreach ($chaptersList as $chapter)
		{
			$chapter->setAddDate(new DateTime($chapter->AddDate()));
			$chapter->setUpdateDate(new DateTime($chapter->updateDate()));
			$chapter->setPublishedDate(new DateTime($chapter->publishedDate()));
		}

		$request->closeCursor();

		return $chaptersList;
	}

}