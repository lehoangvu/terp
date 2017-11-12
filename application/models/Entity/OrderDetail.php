<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Entity\BaseEntity as Base;
/**
 * OrderDetail Model
 *
 * @Entity
 * @table(name="cf_order_detail")
 * @author vu le hoang(hoangvu171819@gmail.com)
 */
class OrderDetail extends Base{

    /**
     * @ManyToOne(targetEntity="Order")
     * @JoinColumn(name="oid", referencedColumnName="id")
     */
    public $order;

    /**
     * @ManyToOne(targetEntity="Product")
     * @JoinColumn(name="product_id", referencedColumnName="id")
     */
    public $product;

    /**
    * @Column(type="string", length=1024, nullable=true)
    */
    public $content;


    /**
      * @Column(type="integer", nullable=true)
     */
    public $qty;

    /**
      * @Column(type="integer", nullable=true)
     */
    public $price;

    public function __construct(){
      parent::__construct();
    }
}
?>