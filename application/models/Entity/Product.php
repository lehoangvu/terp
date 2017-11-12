<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Entity\BaseEntity as Base;
/**
 * Product Model
 *
 * @Entity
 * @table(name="cf_product")
 * @author vu le hoang(hoangvu171819@gmail.com)
 */
class Product extends Base{

  /**
   * @Id
   * @Column(type="integer", nullable=false)
   */
  public $id;

  /**
   * @ManyToOne(targetEntity="Product")
   * @JoinColumn(name="master_id", referencedColumnName="id")
   */
  public $master;

  /**
   * @OneToMany(targetEntity="Product", mappedBy="master")
   */
  public $config;

  /**
   * @OneToMany(targetEntity="OrderDetail", mappedBy="product")
   */
  public $order_details;

  /**
   * @Column(type="string", length=256, nullable=true)
   */
  public $name = '';

  /**
   * @Column(type="string", length=256, nullable=true)
   */
  public $configData = '';

  /**
   * @Column(type="integer", nullable=true)
   */
  public $price;

  /**
   * @Column(type="integer", nullable=true, options={"default":1})
   */
  public $type;

  CONST TYPE_MASTER = 1;
  CONST TYPE_CONFIG = 2;

	public function __construct(){
    parent::__construct();
	}

  public function getTypeName(){
    switch ($this->status) {
      case self::TYPE_MASTER:
        return 'Master';
      case self::TYPE_CONFIG:
        return 'Cấu hình';
    }
  }
}
?>