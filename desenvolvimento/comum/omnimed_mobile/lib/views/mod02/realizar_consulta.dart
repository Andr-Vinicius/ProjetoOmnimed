import 'package:flutter/material.dart';

class RealizarConsulta extends StatelessWidget {
  const RealizarConsulta({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          "Realizar Consulta",
          style: TextStyle(
            color: Color(0xFF0f928c),
            fontWeight: FontWeight.bold,
          ),
        ),
        backgroundColor: Colors.white,
        foregroundColor: const Color(0xFF0f928c),
        centerTitle: true,
      ),
    );
  }
}