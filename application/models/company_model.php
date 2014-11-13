<?php

class Company_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function save($email, $password) 
	{		
		$this->db->query("SELECT fun_insere_usuario ('$email', '$password', 3)");
	}

	function getCompany($usuario) 
	{		
		$this->db->select('
			empresa.nome as companyName,
			empresa.descricao as companyDescription,
			RamoAtividade.descricao as companyActivity,
			RamoAtividade.idRamoAtividade as companyActivityId,
			empresa.cpf as companyCpf,
			empresa.nomeContato as companyContact,
			empresa.emailContato as companyEmail,
			empresa.telefoneContato as companyPhone,
			empresa.cnpj as companyCnpj');

		$this->db->from('Empresa');
		$this->db->where('idUsuario', $usuario);
		$this->db->join('RamoAtividade', 'RamoAtividade.idRamoAtividade = Empresa.idRamoAtividade');

		$query = $this->db->get();
		return $query->result();
	}

	function getCompanyAddress($usuario) 
	{		
		$this->db->select('
			Endereco.idEndereco as addressId,
			Endereco.descricao as addressDescription,
			Endereco.endereco as addressStreet,
			Endereco.bairro as addressNeighborhood,
			Endereco.numero as addressNumber,
			Estado.descricao as addressState,
			Cidade.descricao as addressCity');

		$this->db->from('Endereco');
		$this->db->where('idUsuario', $usuario);
		$this->db->join('Estado', 'Estado.idEstado = Endereco.idEstado');
		$this->db->join('Cidade', 'Cidade.idCidade = Endereco.idCidade');

		$query = $this->db->get();
		return $query->result();
	}

	function getActivity()
	{
		$this->db->select('idRamoAtividade as activityId, descricao as activityDescription');
		$this->db->from('RamoAtividade');
		$query = $this->db->get();

		return $query->result();
	}

	function getArrayVacancyByUser($user)
	{

		$this->db->select('idVaga');
		$this->db->from('Vaga');
		$this->db->where('idUsuario', $user);
		return $this->db->get()->result_array()[0];
	}

	function getOpenVacancy($user)
	{



		$this->db->select('
			Combinacao.idVaga as vacancyId,
			Vaga.cargo as vacancyPosition,
			Vaga.descricao as vacancyDescription,
			COUNT(*) as vacancyTotalEmployee
			');

		$this->db->group_by('Combinacao.idVaga');
		$this->db->from('Combinacao');
		$this->db->join('Vaga', 'Vaga.idVaga = Combinacao.idVaga');

		if ($vacancyIds != 0){
			echo "asdasd";
			$this->db->where_in('Combinacao.idVaga', $vacancyIds);
		}

		$query = $this->db->get();

		return $query->result();		
	}

}

?>