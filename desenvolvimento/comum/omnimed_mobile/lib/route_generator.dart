import 'package:omnimed_mobile/views/SplashScreen.dart';
import 'package:flutter/material.dart';
import 'package:omnimed_mobile/views/mod01/logado.dart';
import 'package:omnimed_mobile/views/mod01/login.dart';
import 'package:omnimed_mobile/views/mod01/naoLogado.dart';
import 'package:omnimed_mobile/views/mod01/paciente.dart';
import 'package:omnimed_mobile/views/mod01/sobre.dart';
import 'package:omnimed_mobile/views/mod02/cadastrar_prescricao.dart';
import 'package:omnimed_mobile/views/mod02/listar_prescricoes.dart';
import 'package:omnimed_mobile/views/mod02/realizar_consulta.dart';
import 'package:omnimed_mobile/views/mod02/listar_agendamentos_dia.dart';
import 'package:omnimed_mobile/views/mod03/gestao_pagamentos.dart';
import 'package:omnimed_mobile/views/mod03/guia_medico.dart';
import 'package:omnimed_mobile/views/mod03/solicitar_exames.dart';
import 'package:omnimed_mobile/views/mod03/visualizar_exames.dart';
import 'views/mod02/agendar_consulta.dart';
import 'views/mod02/listar_agendamentos.dart';

class RouteGenerator {
  static Route<dynamic> generateRoute(RouteSettings settings) {
    switch (settings.name) {
      case "/":
        return MaterialPageRoute(builder: (_) => const SplashScreen());

      case "/splash":
        return MaterialPageRoute(builder: (_) => const SplashScreen());

      case "/agendar-consulta":
        return MaterialPageRoute(builder: (_) => AgendarConsulta());

      case "/listar-agendamentos":
        return MaterialPageRoute(builder: (_) => const ListarAgendamentos());

      case "/cadastrar-prescicao":
        return MaterialPageRoute(builder: (_) => CadastrarPrescricao());

      case "/listar-prescricoes":
        return MaterialPageRoute(builder: (_) => const ListarPrescricoes());

      case "/realizar-consulta":
        return MaterialPageRoute(builder: (_) => const RealizarConsulta());

      case "/solicitar-exames-pacientes":
        return MaterialPageRoute(builder: (_) => SolicitarExamesPacientes());

      case "/visualizar-exames-pacientes":
        return MaterialPageRoute(
            builder: (_) => const VisualizarExamesPacientes());

      case "/guia-medico-especialidades":
        return MaterialPageRoute(
            builder: (_) => const GuiaMedicoEspecialidades());

      case "/gestao-pagamentos":
        return MaterialPageRoute(builder: (_) => const GestaoPagamentos());

      case "/listar-agendamentos-dia":
        return MaterialPageRoute(builder: (_) => ListarAgendamentosDia());

      case "/login":
        return MaterialPageRoute(builder: (_) => LoginView());

      case "/cadastro":
        return MaterialPageRoute( builder: (_) => const CadastroPacienteView() );

      case "/sobre":
        return MaterialPageRoute( builder: (_) => const SobreView() );

      case "/LogadoView":
        return MaterialPageRoute(builder: (_) => const LogadoView());

      case "/NaoLogadoView":
        return MaterialPageRoute(builder: (_) => const NaoLogadoView());
    
      default:
        _erroRota();
    }

    throw '';
  }

  static Route<dynamic> _erroRota() {
    return MaterialPageRoute(builder: (_) {
      return Scaffold(
        appBar: AppBar(
          title: const Text("Erro de rota"),
        ),
        body: const Text("Tela não encontrada"),
      );
    });
  }
}
