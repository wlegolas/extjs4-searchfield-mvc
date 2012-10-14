<?php
Class Model {
	/**
	 * @var {String} $server IP do servidor
	 */
	private $server = 'localhost';
	
	/**
	 * @var {String} $user Nome do usuário da conexão
	 */
	private $user = 'root';

	/**
	 * @var {String} $password Senha do usuário da conexão
	 */
	private $password = '';
	
	/**
	 * @var {String} $dbName Nome do Banco de Dados a ser selecionado
	 */
	private $dbName = 'blog_legolas';
	
	/**
	 * @var {Object} $conn Referência da conexão com o Banco de Dados
	 */
	public $conn = null;

	/**
	 * @var {String} $dataBase Referência do Banco selecionado
	 */
	private $dataBase = '';
	
	/**
	 * @var {String} $baseFindQuery Query base para o find
	 */
	private $baseFindQuery = 'SELECT [FIELDS] FROM [TABLE_NAME] WHERE [CONDITIONS] ORDER BY [ORDER_BY] LIMIT [START], [LIMIT]';
	
	/**
	 * @var {String} $baseFindCount Query base para resgatar o total do registros
	 */
	private $baseFindCount = 'SELECT count(*) AS total FROM [TABLE_NAME] WHERE [CONDITIONS]';
	
	/**
	 * Método contrutor da classe
	 */
	public function __construct() {
		$this->conn = mysql_connect($this->server, $this->user, $this->password) or die (mysql_error());
		
		// Selecionando o Banco de Dados
		$this->dataBase = mysql_select_db($this->dbName, $this->conn) or die(mysql_error());
	}
	
	/**
	 * Método que irá executar o SELECT referente as opções passadas no array
	 * @param {Array} $options Array com as opções para a consulta
	 * @return {Array} Retorna o Array com os dados da consulta
	 */
	public function find($options) {
		$query = $this->baseFindQuery;
		
		if(array_key_exists('fields', $options)) {
			$query = str_replace('[FIELDS]', $options['fields'], $query);
		}
		
		if(array_key_exists('tableName', $options)) {
			$query = str_replace('[TABLE_NAME]', $options['tableName'], $query);
		}
		
		if(array_key_exists('conditions', $options)) {
			$query = str_replace('[CONDITIONS]', $options['conditions'], $query);
		}
		
		if(array_key_exists('order', $options)) {
			$query = str_replace('[ORDER_BY]', $options['order'], $query);
		}
		
		if(array_key_exists('start', $options)) {
			$query = str_replace('[START]', $options['start'], $query);
		}
		
		if(array_key_exists('limit', $options)) {
			$query = str_replace('[LIMIT]', $options['limit'], $query);
		}
		
		$query = $this->removeConstants($query);

		return $this->query($query);
	}
	
	/**
	 * Método que irá executar o SELECT referente as opções passadas no array
	 * @param {Array} $options Array com as opções para a consulta
	 * @return {Array} Retorna o Array com os dados da consulta
	 */
	public function findCount($options) {
		$query = $this->baseFindCount;
		
		if(array_key_exists('tableName', $options)) {
			$query = str_replace('[TABLE_NAME]', $options['tableName'], $query);
		}
		
		if(array_key_exists('conditions', $options)) {
			$query = str_replace('[CONDITIONS]', $options['conditions'], $query);
		}
		
		$query = $this->removeConstants($query);
		
		// Recebendo o resultado da consulta
		$result = $this->query($query);
		
		return $result[0];
	}

	/**
	 * Método que irá verificar se todos valores das constantes foram passadas
	 * @param {String} $query Query para verificar as constantes
	 * @return {String} Retorna a query sem as constantes
	 */
	private function removeConstants($query) {
		// Constantes a serem removidas
		$constants = array('[FIELDS]', '[CONDITIONS]', '[ORDER_BY]', '[START]', '[LIMIT]');
		
		// Valores a serem alterados
		$defaultValues = array('*', '1=1', 'ID ASC', '0', '50');
		
		// Trocando os valores das constantes
		$query = str_replace($constants, $defaultValues, $query);
		
		return $query;
	}
	
	/**
	 * Método que irá executar a query passada via parâmetro
	 * @param {Strng} $query Query a ser executada
	 * @return {Array} Retorna um Array com os dados da consulta
	 */
	public function query($query) {
		// Realizando a consulta
		$result = mysql_query($query, $this->conn) or die(mysql_error());
		
		return $this->formatResult($result);
	}
	
	/**
	 * Métedo que irá resgatar os dados do resource
	 * @param {Resource} $result Resource da consulta
	 * @return {Array} Retorna o Array dos dados do result
	 */
	private function formatResult($result) {
		// Array com os dados dos personagens
		$data = array();

		while($row = mysql_fetch_assoc($result)) {
			$data[] = $row;
		}

		return $data;
	}
}	
?>