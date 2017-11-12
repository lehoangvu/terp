<?php

class CustomerController extends ApiBaseController{
	public function createAct() {

		$customer = new Entity\Customer();

		$checker = $this->em->createQueryBuilder();
		$checker = $checker->select('cu');
		$checker = $checker->from('Entity\Customer', 'cu');
		$checker = $checker->where('cu.phone = :phone');
		$checker = $checker->setParameter('phone', $this->getRequest('phone'));


		$customerExisted = $checker->getQuery()->getResult();

		if(count($customerExisted) > 0) {
			return $this->response([
				'error' => 'Số điện thoại này đã tồn tại'
			]);
		}

		$customer->fullname = $this->getRequest('fullname');
		$customer->phone = $this->getRequest('phone');
		$customer->address = $this->getRequest('address');

		$this->em->persist($customer);
		$this->em->flush();

		$this->response($customer);
	}
	public function listAct() {
		$q = $this->getRequest('q');
		$page = $this->getRequest('page') ? (int)$this->getRequest('page') : 1;
		$limit = $this->getRequest('limit') ? (int)$this->getRequest('limit') : 10;

		$customerQuery = $this->em->createQueryBuilder();
		$customerQuery = $customerQuery->select('COUNT(cu.id)');
		$customerQuery = $customerQuery->from('Entity\Customer', 'cu');

		if($q) {
			$customerQuery = $customerQuery->where('cu.phone like :phone');
			$customerQuery = $customerQuery->setParameter('phone', '%' . $q . '%');

			$customerQuery = $customerQuery->andWhere('cu.fullname like :fullname');
			$customerQuery = $customerQuery->setParameter('fullname', '%' . $q . '%');

			$customerQuery = $customerQuery->andWhere('cu.address like :address');
			$customerQuery = $customerQuery->setParameter('address', '%' . $q . '%');
		}

		$total = (int)$customerQuery->getQuery()->getSingleScalarResult();

		$results = [];

		if($total > 0) {
			$customerQuery = $customerQuery->select('cu');
            $customerQuery = $customerQuery->setFirstResult((int) (($page - 1) * $limit));
            $customerQuery = $customerQuery->setMaxResults((int) $limit);
			$results = $customerQuery->getQuery()->getResult();
		}

		$data = [
			'results' => $results,
			'paging' => [
				'total' => $total,
				'page' => $page,
				'limit' => $limit
			]
		];

		$this->response($data);
	}

	public function index(){
		echo "Due, go back now!";
	}
}
