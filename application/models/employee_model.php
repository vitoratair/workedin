<?php

class Employee_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function getEmployee($user) 
	{		
		$this->db->select('
			Candidato.nome as employeeName,
			Candidato.sobremone as employeeLastName,
			Candidato.dataNascimento as employeeBirth,
			Candidato.necessidadeEspecial as employeeNeeds,
			Candidato.telefone as employeePhone,
			Habilitacao.descricao as employeeLicense,
			EstadoCivil.descricao as employeeCivilStatus,
			Sexo.descricao as employeeSex,
			Estado.descricao as employeeState,
			Cidade.descricao as employeeCity');

		$this->db->from('Candidato');
		$this->db->where('idUsuario', $user);
		
		$this->db->join('Sexo', 'Sexo.idSexo = Candidato.idSexo');
		$this->db->join('Estado', 'Estado.idEstado = Candidato.idEstado');
		$this->db->join('Cidade', 'Cidade.idCidade = Candidato.idCidade');
		$this->db->join('Habilitacao', 'Habilitacao.idHabilitacao = Candidato.idHabilitacao');
		$this->db->join('EstadoCivil', 'EstadoCivil.idEstadoCivil = Candidato.idEstadoCivil');


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
		// $this->db->where('recrutamentoAberto', RECRUTAMENTO_ABERTO);
		$this->db->join('Endereco', 'Endereco.idEndereco = Vaga.idEndereco');
		
		$query = $this->db->get();
		return $query->result();		
	}

}

?>