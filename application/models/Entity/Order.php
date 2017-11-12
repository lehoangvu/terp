<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Entity\BaseEntity as Base;
/**
 * Order Model
 *
 * @Entity
 * @table(name="cf_order")
 * @author vu le hoang(hoangvu171819@gmail.com)
 */
class Order extends Base{

	/**
	 * @ManyToOne(targetEntity="Customer")
	 * @JoinColumn(name="cid", referencedColumnName="id")
	 */
	public $customer;

  /**
   * @OneToMany(targetEntity="OrderDetail", mappedBy="order")
   */
  public $order_details;

  /**
   * @Column(type="string", length=2048, nullable=true)
   */
	public $customer_attribute;

	public function __construct(){
    parent::__construct();
		$this->order_details = new ArrayCollection();
	}
}
?>