<?php
	//chama o arquivo de conexão com o bd
	require_once('Model.php');
	
	// Criando o objeto da conexão com o Banco
	$model = new Model();
	
	// Resgatando os parâmetros enviados
	$start = $_REQUEST['start'];
	$limit = $_REQUEST['limit'];
	
	// Opções para a consulta
	$optionsQuery = array(
		'fields' => '*',
		'tableName' => 'personagens',
		'start' => $start,
		'limit' => $limit,
		'order' => 'nome ASC'
	);
	
	// Opções para resgatar o total de registros
	$optionsCount = array(
		'tableName' => 'personagens'
	);
	
	if(isset($_REQUEST['filter'])) {
		$filter = "nome LIKE '%" . $_REQUEST['filter'] . "%'";
		
		// Criando o Array com as condições 
		$optionsQuery['conditions'] = $filter;
		$optionsCount['conditions'] = $filter;
	}
	
	// Resgatando os dados
	$data = $model->find($optionsQuery);
	
	// Resgatando o total de registros
	$total = $model->findCount($optionsCount);
	
	// Gerando o JSON de retorno
	echo json_encode(array(
		'success' => true,
		'total' => (int)$total['total'],
		'data' => $data
	));
?>