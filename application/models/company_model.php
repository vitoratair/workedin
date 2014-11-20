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

	function saveNewCompany($data)
	{
		$this->db->insert('Empresa', $data); 
	}

	function saveNewAddress($data)
	{
		$this->db->insert('Endereco', $data); 
	}

	function getCompany($usuario) 
	{		
		$this->db->select('
			Empresa.idUsuario as companyId,
			Empresa.nome as companyName,
			Empresa.descricao as companyDescription,
			RamoAtividade.descricao as companyActivity,
			RamoAtividade.idRamoAtividade as companyActivityId,
			Empresa.cpf as companyCpf,
			Empresa.nomeContato as companyContact,
			Empresa.emailContato as companyEmail,
			Empresa.telefoneContato as companyPhone,
			Empresa.cnpj as companyCnpj');

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
		$vacancyIds = $this->db->get()->result_array();

		$ids = array();
		foreach($vacancyIds AS $t) {
			array_push($ids, $t['idVaga']);
		} 		
		return $ids;
	}

	function getVacancyByUser($user)
	{
		$this->db->select('
			Vaga.idVaga as vacancyId,
			TipoVaga.descricao as vacancyPosition,
			');
		$this->db->from('Vaga');
		$this->db->join('TipoVaga', 'TipoVaga.idTipoVaga = Vaga.idTipoVaga');
		$this->db->where('Vaga.idUsuario', $user);
		$query = $this->db->get();
		return $query->result();
	}

	function getOpenVacancy($user)
	{
		$this->db->select('
			Vaga.idVaga as vacancyId,			
			Vaga.descricao as vacancyDescription,
			TipoVaga.descricao as vacancyPosition,		
			Estado.descricao as vacantionState,
			Cidade.descricao as vacantionCity,
			COUNT(Combinacao.idVaga) as vacancyTotalEmployee
			');
		$this->db->from('Vaga');
		$this->db->where('Vaga.idUsuario', $user);
		$this->db->join('Combinacao', 'Vaga.idVaga = Combinacao.idVaga AND Combinacao.idEstadoCombinacao = 1' , 'left');
		$this->db->join('TipoVaga', 'TipoVaga.idTipoVaga = Vaga.idTipoVaga');
		$this->db->join('Cidade', 'Cidade.idCidade = Vaga.idCidade AND Cidade.idEstado = Vaga.idEstado');
		$this->db->join('Estado', 'Estado.idEstado = Cidade.idEstado');
		
		// $this->db->where_in('Combinacao.idEstadoCombinacao', array(RECRUITMENT_OPEN));

		$this->db->group_by('Vaga.idVaga');
		$query = $this->db->get();

		return $query->result();		
	}

	function getCondidatesByVacancy($vacancy)
	{
		$this->db->select('
			Combinacao.idUsuario as candidateId,
			Combinacao.idEstadoCombinacao as candidateStatus,
			Candidato.nome as candidateName, 
			TIMESTAMPDIFF(YEAR, `Candidato`.`dataNascimento`, CURDATE()) AS candidateAge,
			
			');
		$this->db->from('Combinacao');
		$this->db->join('Candidato', 'Candidato.idUsuario = Combinacao.idUsuario');
		$this->db->join('Vaga', 'Vaga.idVaga = Combinacao.idVaga');
		$this->db->where('Combinacao.idVaga', $vacancy);
		$this->db->where_in('Combinacao.idEstadoCombinacao', array(RECRUITMENT_OPEN));
		$query = $this->db->get();

		return $query->result();		
	}

	function getCondidatesManagement($user)
	{
		$this->db->select('
			Vaga.idVaga as candidateIdVacancy,
			Combinacao.DataCadastro as candidateDate,
			Usuario.idUsuario as candidateId,
			Usuario.email as candidateEmail,
			Combinacao.DataEntrevista as candidateInterviewDate,
			Candidato.nome as candidateName,
			Candidato.sobrenome as candidateLastName,
			Candidato.telefone as candidatePhone,			
			TipoVaga.descricao as candidatePosition
			');

		$this->db->from('Combinacao');
		$this->db->where_in('Combinacao.idEstadoCombinacao', array(RECRUITMENT_POSITIVE, ));
		$this->db->where('Vaga.idUsuario', $user);
		$this->db->join('Candidato', 'Candidato.idUsuario = Combinacao.idUsuario');
		$this->db->join('Vaga', 'Vaga.idVaga = Combinacao.idVaga');
		$this->db->join('TipoVaga', 'TipoVaga.idTipoVaga = Vaga.idTipoVaga');
		$this->db->join('Usuario', 'Usuario.idUsuario = Combinacao.idUsuario');
		$query = $this->db->get();

		return $query->result();		
	}

	function updateCompany($data)
	{
		$this->db->where('idUsuario', $data['idUsuario']);
		$this->db->update('Empresa', $data);
	}

	function getBenefit()
	{
		$this->db->select('
			idBeneficios as benefitId,
			descricao as benefitDescription
			');

		$this->db->from('Beneficios');
		$query = $this->db->get();

		return $query->result();	
	}

	function addBenefit($data)
	{
		$this->db->insert_batch('Adicao', $data);
	}

	function getTime()
	{
		$this->db->select('
			idHorario as timeId,
			descricao as timeDescription
			');

		$this->db->from('Horario');
		$query = $this->db->get();

		return $query->result();	
	}

	function addVacancy($data)
	{
		$this->db->insert('Vaga', $data); 
		return $this->db->insert_id();
	}

	function getAddress($id)
	{
		$this->db->select('
			idCidade as cityId,
			idEstado as stateId,
			lat as latitude,
			lon as longitude
			');

		$this->db->from('Endereco');
		$this->db->where('idEndereco', $id);

		$query = $this->db->get();

		return $query->result();
	}

	function delCombine($vacancy, $user)
	{
		$this->db->where('idUsuario', $user);
		$this->db->where('idVaga', $vacancy);
		$this->db->delete('Combinacao');
	}

	function newCombine($data)
	{
		$this->db->insert('Combinacao', $data);
	}
	
	function setCombine($vacancy, $candidate, $data)
	{
		$this->db->where('idUsuario', $candidate);
		$this->db->where('idVaga', $vacancy);
		$this->db->update('Combinacao', $data);
	}

	function getDurations()
	{
		$this->db->select('
			idDuracao as durationId,
			descricao as durationDescription
			');
		$this->db->from('Duracao');
		$query = $this->db->get();
		
		return $query->result();
	}

	function getPosition()
	{
		$this->db->select('
			idTipoVaga as positionId,
			descricao as positionDescription
			');
		$this->db->from('TipoVaga');
		$query = $this->db->get();
		
		return $query->result();
	}

	function getIdPosition($position)
	{
		$this->db->select('idTipoVaga as positionId');
		$this->db->from('TipoVaga');
		$this->db->where('descricao', $position);

		$query = $this->db->get();
		
		return $query->result();		
	}

	function updateInterviewDate($user, $vacancy, $dataSaved, $data)
	{
		$this->db->where('idUsuario', $user);
		$this->db->where('idvaga', $vacancy);
		$this->db->where('dataCadastro', $dataSaved);
		$this->db->update('Combinacao', $data);		
	}
}

?>