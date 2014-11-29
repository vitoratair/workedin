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

	function setAllRead($user)
	{	
		$data['lido'] = 1;
		$this->db->where('idUsuario', $user);
		$this->db->update('Notificacao', $data);		
	}

	function hasPerfil($user)
	{
		$this->db->select('COUNT(Candidato.idUsuario) as candidate');		
		$this->db->from('Candidato');
		$this->db->where('idUsuario', $user);
		$query = $this->db->get();
		return $query->result()[0]->candidate;	
	}

	function getNotifyNotRead($user)
	{
		$this->db->select('COUNT(Notificacao.idNotificacao) as countNotRead');		
		$this->db->from('Notificacao');
		$this->db->where('idUsuario', $user);
		$this->db->where('lido', '0');
		$query = $this->db->get();
		return $query->result()[0]->countNotRead;		
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

	function getJsonJobs($user, $position, $salaryStart, $salaryEnd)
	{		
		$this->db->select('
			Vaga.idvaga as Id,
			Vaga.salario as salary,
			Vaga.descricao as description,			
			Empresa.nome as company,
			TipoVaga.descricao as position,
			min(`Combinacao`.`idEstadoCombinacao`) as status,
			Vaga.lat as latitude,
			Vaga.lon as longitude,
			');

		$this->db->from('Vaga');
		$this->db->join('Combinacao', 'Vaga.idVaga = Combinacao.idVaga AND Combinacao.idUsuario = ' . $user . ' AND Combinacao.dataCadastro > CURRENT_DATE()-30', 'left');		
		$this->db->join('TipoVaga', 'TipoVaga.idTipoVaga = Vaga.idTipoVaga');		
		$this->db->join('Empresa', 'Empresa.idUsuario = Vaga.idUsuario');
		$this->db->where_in('Vaga.idEstadoVaga', array(RECRUITMENT_OPEN, VACANCY_PUBLIC));
		$this->db->where_in('Combinacao.idEstadoCombinacao', array(RECRUITMENT_POSITIVE, RECRUITMENT_OPEN, RECRUITMENT_GIVE_UP));
		$this->db->or_where('Combinacao.idEstadoCombinacao', NULL);

		if ($salaryStart != 0 and $salaryEnd == 0)
			$this->db->where('Vaga.salario <= ', $salaryStart);
		
		if ($salaryStart != 0 and $salaryEnd != 0){
			$this->db->where('Vaga.salario >= ', $salaryStart);
			$this->db->where('Vaga.salario <= ', $salaryEnd);
		}

		if ($position != -1)
			$this->db->where('TipoVaga.idTipoVaga', $position);
		
		$this->db->group_by('Vaga.idVaga');
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
			Cidade.idCidade as cityId,
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
			TipoNotificacao.descricao as notificationDescription,
			TipoVaga.descricao as vacancy,
			Empresa.nome as company,
			');		

		// $this->db->select('*');

		$this->db->from('Notificacao');
		$this->db->join('NotificacaoVaga', 'NotificacaoVaga.idNotificacao = Notificacao.idNotificacao', 'left');				
		$this->db->join('Vaga', 'Vaga.idVaga = NotificacaoVaga.idVaga', 'left');
		$this->db->join('Combinacao', 'Combinacao.idVaga = Vaga.idVaga AND Combinacao.idUsuario = ' . $user, 'left');
		
		$this->db->join('Empresa', 'Vaga.idUsuario = Empresa.idUsuario', 'left');
		$this->db->join('TipoVaga', 'TipoVaga.idTipoVaga = Vaga.idTipoVaga', 'left');		
		$this->db->join('TipoNotificacao', 'TipoNotificacao.idTipoNotificacao = Notificacao.idTipoNotificacao');
		
		$this->db->where('Notificacao.idUsuario', $user);
		$this->db->order_by('Notificacao.idNotificacao', 'desc');
		$query = $this->db->get();
		
		return $query->result();		
	}

}

?>