<?php

class Employee_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function save($email, $password) 
	{		
		$this->db->query("SELECT fun_insere_usuario ('$email', '$password', 2)");
	}

	function saveNewEmployee($data)
	{
		$this->db->insert('Candidato', $data); 
	}

	function getEmployee($user) 
	{		
		$this->db->select('
			Candidato.nome as employeeName,
			Candidato.sobrenome as employeeLastName,
			Candidato.bairro as neighborhood,
			Usuario.email as employeeEmail,
			TIMESTAMPDIFF(YEAR, `Candidato`.`dataNascimento`, CURDATE()) AS employeeAge,
			Candidato.necessidadeEspecial as employeeNeeds,
			Candidato.telefone as employeePhone,
			Habilitacao.descricao as employeeLicense,
			EstadoCivil.descricao as employeeCivilStatus,
			Sexo.descricao as employeeSex,
			Estado.descricao as employeeState,
			Estado.idEstado as employeeStateId,
			Cidade.descricao as employeeCity,
			Cidade.idCidade as employeeCityId'
			);

		$this->db->from('Candidato');
		$this->db->where('Candidato.idUsuario', $user);
		$this->db->join('Sexo', 'Sexo.idSexo = Candidato.idSexo');
		$this->db->join('Estado', 'Estado.idEstado = Candidato.idEstado');
		$this->db->join('Cidade', 'Cidade.idCidade = Candidato.idCidade');
		$this->db->join('Habilitacao', 'Habilitacao.idHabilitacao = Candidato.idHabilitacao');
		$this->db->join('EstadoCivil', 'EstadoCivil.idEstadoCivil = Candidato.idEstadoCivil');
		$this->db->join('Usuario', 'Usuario.idUsuario = Candidato.idUsuario');



		$query = $this->db->get();
		return $query->result();
	}

	function getEducation($user) 
	{		
		$this->db->select('
			FormacaoAcademica.descricao as educationCourse,
			NivelAcademico.descricao as educationLevel
			');

		$this->db->from('FormacaoAcademica');
		$this->db->where('idUsuario', $user);
		$this->db->join('NivelAcademico', 'NivelAcademico.idNivelAcademico = FormacaoAcademica.idNivelAcademico');
		
		$query = $this->db->get();
		return $query->result();
	}

	function getProfession($user)
	{
		$this->db->select('
			Duracao.descricao as professionTime,
			ExperienciaProfissional.empresa as professionCompany,
			ExperienciaProfissional.cargo as professionPosition,
			');

		$this->db->from('ExperienciaProfissional');
		$this->db->where('idUsuario', $user);
		$this->db->join('Duracao', 'Duracao.idDuracao = ExperienciaProfissional.idDuracao');
		
		$query = $this->db->get();
		return $query->result();
	}

	function getLastProfession($user)
	{
		$this->db->select('
			Duracao.descricao as professionTime,
			ExperienciaProfissional.empresa as professionCompany,
			ExperienciaProfissional.cargo as professionPosition,
			');

		$this->db->where('idUsuario', $user);
		$this->db->join('Duracao', 'Duracao.idDuracao = ExperienciaProfissional.idDuracao');
		$this->db->order_by("idExperienciaProfissional","desc");
		$query = $this->db->get('ExperienciaProfissional', 3);
		return $query->result();		
	}

	function getJsonOpenJobs($vaga, $salario)
	{
		$this->db->select('
			Vaga.idvaga as Id,
			Vaga.cargo as position,
			Vaga.descricao as description,
			Endereco.lat as latitude,
			Endereco.lon as longitude,
			');

		$this->db->from('Vaga');
		$this->db->join('Endereco', 'Endereco.idEndereco = Vaga.idEndereco');
		
		$query = $this->db->get();
		return $query->result();		
	}

	function getCivilStatus()
	{
		$this->db->select('
			idEstadoCivil as civilStateId,
			descricao as civilStateDescription
			');

		$this->db->from('EstadoCivil');
		$query = $this->db->get();
		return $query->result();
	}

	function getLicense()
	{
		$this->db->select('
			idHabilitacao as licenseId,
			descricao as licenseDescription,
			');

		$this->db->from('Habilitacao');
		$query = $this->db->get();
		return $query->result();
	}

	function getStates()
	{
		$this->db->select('
			Estado.idEstado as stateId,
			Estado.descricao as stateName,
			Estado.sigla as stateAbbreviation
			');

		$this->db->from('Estado');
		$query = $this->db->get();
		return $query->result();	
	}

	function getCity($state)
	{
		$this->db->select('
			Cidade.idEstado as cityId,
			Cidade.descricao as cityName,
			');

		$this->db->from('Cidade');
		$this->db->where('Cidade.idEstado', $state);
		$query = $this->db->get();
		return $query->result();		
	}

	function getSex()
	{
		$this->db->select('
			idSexo as sexId,
			descricao as sexDescription
			');

		$this->db->from('Sexo');
		$query = $this->db->get();
		return $query->result();		
	}
}

?>