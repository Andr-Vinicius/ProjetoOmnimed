import 'package:flutter/material.dart';
import 'package:mod01/view/home.dart';
import 'package:mod01/view/logado.dart';
import 'package:mod01/view/login.dart';
import 'package:mod01/view/naoLogado.dart';
import 'package:mod01/view/paciente.dart';
import 'package:mod01/view/recuperar.dart';
import 'package:mod01/view/sobre.dart';

class RouteGenerator {
  static Route<dynamic> generateRoute(RouteSettings settings) {
    switch (settings.name) {
      case "/":
        return MaterialPageRoute(builder: (_) => const HomeView());
      case "/PacienteView":
        return MaterialPageRoute(builder: (_) => const CadastroPacienteView());
      case "/LoginView":
        return MaterialPageRoute(builder: (_) => const LoginView());
      case "/SenhaView":
        return MaterialPageRoute(builder: (_) => const RecuperarView());
      case "/SobreView":
        return MaterialPageRoute(builder: (_) => const SobreView());
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
