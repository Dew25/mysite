<?php
class FireWall{
	private $user;

	public function __construct()
	{
		if (!isset($_SESSION['user'])) {
			$user_id = $this->getUserId();
		  $_SESSION['user_id'] = $user_id;
		} else {
		  $this->user = $_SESSION['user'];
		}
	}
}