<?php

class ProductController extends ApiBaseController{

	CONST BASE_HRV_API = "https://b99deaa64e480ee3fd2e13d91c6a065f:1c901d68302996e8ab632dd5ad7a15fc@congngheshop.myharavan.com/admin";

	function curl($api, $data = [], $method = 'get') {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		if(strtolower($method) == 'post') {
			$postData = '';
			foreach($params as $k => $v) { 
				$postData .= $k . '='.$v.'&'; 
			}
		   	$postData = rtrim($postData, '&');
		   	curl_setopt($ch, CURLOPT_POST, count($postData));
        	curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); 
		}

		$output=curl_exec($ch);
		curl_close($ch);
		return $output;
	}

	function __construct(){
		parent::__construct();
	} 

	function tranform($product = null) {
		if($product == null) return $product;
		if(is_array($product)) {
			$results = [];
			foreach ($product as $item) {
				$results[] = $this->tranform($item);
			}
			return $results;
		} else {
			$configData = json_decode($product->configData);
			$obj = [
				'id' => $product->id,
				'name' => $product->name,
				// 'image' => $configData->image
			];
			if($product->type == 1) {
				$obj['image'] = $configData->image;
				$configs = [];
				foreach ($product->config as $item) {
					$configs[] = $this->tranform($item);
				}
				$obj['config'] = $configs;
			} else {
				$obj['price'] = $product->price;
			}
			return $obj;
		}
	}

	public function syncHrvAct() {
		$api_products = self::BASE_HRV_API . "/products.json?collection_id=1001001952";
		$products = json_decode($this->curl($api_products));

		$query = $this->em->createQuery('DELETE Entity\Product c WHERE c.type = 2');
		$query->execute(); 

		$query = $this->em->createQuery('DELETE Entity\Product c');
		$query->execute(); 
			
		foreach ($products->products as $key => $product) {
			$master = new Entity\Product();
			$master->id = $product->id;
			$master->name = $product->title;
			$master->configData = json_encode([
				'image' => $product->images[0]->src
			]);
			$master->type = 1;
		    $this->em->persist($master);
		    $this->em->flush();

		    // create config
		    foreach ($product->variants as $variant) {
		    	$config = new Entity\Product();

		    	$variant_name = '';
		    	$variant->option1 != null && $variant_name .= $variant->option1;
		    	$variant->option2 != null && $variant_name .= '-' . $variant->option2;
		    	$variant->option3 != null && $variant_name .= '-' . $variant->option3;
		    	$config->name = $variant_name;

				$config->id = $variant->id;
				$config->price = $variant->price;
				$config->type = 2;


				$config ->master = $master;

			    $this->em->persist($config);
			    $this->em->flush();
		    }

		    $this->em->merge($master);
		    $this->em->flush();
		}	
	}

	public function listAct() {
		$mqb =  $this->em->createQueryBuilder();
		$mqb = $mqb->select('mp');
		$mqb = $mqb->from('Entity\Product', 'mp');
		$mqb = $mqb->where('mp.type = 1');
		$q = $this->input->get('q');
		if($q) {
			$mqb = $mqb->andWhere('mp.name like :q');
			$mqb = $mqb->setParameter('q', "%$q%");
			
		}
		$masters = $mqb->getQuery()->getResult();
		$results = $this->tranform($masters);
		$this->response($results);
	}

	public function detailAct($id) {
		$mqb =  $this->em->createQueryBuilder();
		$mqb = $mqb->select('mp');
		$mqb = $mqb->from('Entity\Product', 'mp');
		$mqb = $mqb->where('mp.id = :id');
		$mqb = $mqb->setParameter('id', $id);
		$masters = $mqb->getQuery()->getResult();
		$master = isset($masters[0]) ? $masters[0] : null;

		$this->response($this->tranform($master));
	}

	public function index(){
		echo "Due, go back now!";
	}
}
