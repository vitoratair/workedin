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

	function saveSchool($data)
	{
		$this->db->insert('FormacaoAcademica', $data); 	
	}

	function saveNewExperience($data)
	{
		$this->db->insert('ExperienciaProfissional', $data); 	
	}
	
	function updateEmployee($user, $data)
	{
		$this->db->where('idUsuario', $user);
		$this->db->update('Candidato', $data);		
	}

	function getEmployee($user) 
	{		
		$this->db->select('
			Candidato.idUsuario as employeeId,
			Candidato.nome as employeeName,
			Candidato.sobrenome as employeeLastName,
			Candidato.bairro as neighborhood,
			Candidato.telefone as employeePhone,
			Candidato.necessidadeEspecial as employeeNeeds,
			Candidato.trabalhando as employeeIsWorking,
			Usuario.email as employeeEmail,
			Candidato.dataNascimento as employeeBirth,
			TIMESTAMPDIFF(YEAR, `Candidato`.`dataNascimento`, CURDATE()) AS employeeAge,
			Habilitacao.descricao as employeeLicense,
			Habilitacao.idHabilitacao as employeeLicenseId,
			EstadoCivil.descricao as employeeCivilStatus,
			EstadoCivil.idEstadoCivil as employeeCivilStatusId,
			Sexo.descricao as employeeSex,
			Sexo.idSexo as employeeSexId,
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
			FormacaoAcademica.curso as educationCourse,
			FormacaoAcademica.instituicao as educationSchool,
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

	function getJsonJobs($user, $position, $salary)
	{

// SELECT `Vaga`.`idvaga` as Id,
//        `Vaga`.`descricao` as description, 
//        `TipoVaga`.`descricao` as position, 
//        `Combinacao`.`idEstadoCombinacao` as status,
//        `Vaga`.`lat` as latitude, 
//        `Vaga`.`lon` as longitude 
// FROM (`Vaga`) 
// LEFT JOIN `Combinacao` 
//  ON `Vaga`.`idVaga` = `Combinacao`.`idVaga` 
//  AND `Combinacao`.`idUsuario` = 4
//  AND `Combinacao`.`dataCadastro` > CURRENT_DATE()-30
// JOIN `TipoVaga` 
//  ON `TipoVaga`.`idTipoVaga` = `Vaga`.`idTipoVaga`


		$this->db->select('
			Vaga.idvaga as Id,
			Vaga.descricao as description,
			TipoVaga.descricao as position,
			Combinacao.idEstadoCombinacao as status,
			Vaga.lat as latitude,
			Vaga.lon as longitude,			
			');

		$this->db->from('Vaga');
		$this->db->join('Combinacao', 'Vaga.idVaga = Combinacao.idVaga AND Combinacao.idUsuario = ' . $user . ' AND Combinacao.dataCadastro > CURRENT_DATE()-30', 'left');		
		$this->db->join('TipoVaga', 'TipoVaga.idTipoVaga = Vaga.idTipoVaga');					

		$query = $this->db->get();

		return $query->result();		
	}

	function getJsonOpenJobs()
	{
		$this->db->select('
			Vaga.idvaga as Id,
			Vaga.descricao as description,
			TipoVaga.descricao as position,
			Vaga.lat as latitude,
			Vaga.lon as longitude,
			');

		$this->db->from('Vaga');
		$this->db->join('TipoVaga', 'TipoVaga.idTipoVaga = Vaga.idTipoVaga');		
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

	function getSchoolLevel()
	{
		$this->db->select('
			idNivelAcademico as schoolLevelId,
			descricao as schoolLevelDescription,
			exigeDescricao as schoolLevelNeedDescription');
		
		$this->db->from('NivelAcademico');
		$query = $this->db->get();
		
		return $query->result();		
	}

	function getNotification($user)
	{
		$this->db->select('
			Notificacao.idNotificacao as notificationId,
			Notificacao.idTipoNotificacao as notificationTypeId,
			Notificacao.dataCadastro as notifyDate,
			TipoNotificacao.descricao as notificationDescription');
		
		$this->db->from('Notificacao');
		$this->db->join('TipoNotificacao', 'TipoNotificacao.idTipoNotificacao = Notificacao.idTipoNotificacao');
		$this->db->where('Notificacao.idUsuario', $user);
		$this->db->order_by('Notificacao.idNotificacao', 'desc');
		$query = $this->db->get();
		
		return $query->result();		
	}

}

?>