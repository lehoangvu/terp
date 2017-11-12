<?php

namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Entity\BaseEntity as Base;

/**
 * Customer Model
 *
 * @Entity
 * @Table(name="cf_customer")
 * @author  Vu Le Hoang <hoangvu171819@gmail.com>
 */
class Customer extends Base
{

	/**
	 * @Column(type="string", length=128, unique=true, nullable=false)
	 */
	public $fullname;

	/**
	 * @Column(type="string", length=128, nullable=true)
	 */
	public $email;

	/**
	 * @Column(type="string", length=15, nullable=true)
	 */
	public $phone;

	/**
	 * @Column(type="string", length=128, nullable=true)
	 */
	public $address;

	/**
	 * @OneToMany(targetEntity="Order", mappedBy="customer")
	 */
	public $orders;

	public function __toString()
	{
	    return $this->fullname;
	}

	function __construct(){
		parent::__construct();
	    // $this->orders = new ArrayCollection();
	}
}
