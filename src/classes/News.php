<?php

class News {
	protected $perPage = 4;

	public function __construnct()
	{

	}

	public function setPerPage(int $perPage)
	{
		$this->perPage = $perPage;

		return $this;
	}

	public function getPageCount()
	{
		$mysqli = (new mysqli('127.0.0.1', 'root', '', 'my_db'));

		$result = $mysqli->query("SELECT COUNT(*) FROM `news`")->fetch_assoc();

		$count = array_shift($result);

		return (int)ceil($count / $this->perPage);
	}

	public function getByOffset(int $page)
	{
		$offset = $this->perPage * ($page - 1);

		$mysqli = (new mysqli('127.0.0.1', 'root', '', 'my_db'));

		$newsResult = $mysqli->query("SELECT * FROM `news` ORDER BY date DESC LIMIT {$this->perPage} OFFSET {$offset}");

		$result = [];
		while ($news = $newsResult->fetch_assoc()) {
			$result[] = $news;
		}

		return $result;
	}

	public function getNewsById(int $id)
	{
		$mysqli = (new mysqli('127.0.0.1', 'root', '', 'my_db'));

		$newsResult = $mysqli->query("SELECT * FROM `news` WHERE `id` = {$id}");

		return $newsResult->fetch_assoc();
	}

	public function getLastNews()
	{
		$mysqli = (new mysqli('127.0.0.1', 'root', '', 'my_db'));

		$newsResult = $mysqli->query("SELECT * FROM `news` ORDER BY id DESC LIMIT 1");

		return $newsResult->fetch_assoc();
	}

	
}
?>
