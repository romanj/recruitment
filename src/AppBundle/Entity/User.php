<?php

namespace AppBundle\Entity;

/**
 * Class User
 * @package App\Model
 */
class User
{
	/** @var integer */
	protected $id;
	/** @var string */
	protected $name;
	/** @var string */
	protected $email;

	/**
	 * @param integer $id
	 * @param string $name
	 * @param string $email
	 */
	function __construct($id, $name, $email)
	{
		$this->id    = $id;
		$this->name  = $name;
		$this->email = $email;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get Email
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set email
	 * @param string $email
	 * @return User
	 */
	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}
}