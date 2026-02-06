import 'package:flutter/material.dart';

class HomeView extends StatelessWidget {
  const HomeView({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          "OMNIMED",
          style: TextStyle(
            color: Color(0xFF0f928c),
            fontWeight: FontWeight.bold,
          ),
        ),
        centerTitle: true,
        backgroundColor: Colors.white,
        foregroundColor: const Color(0xFF0f928c),
      ),
      drawer: Drawer(
        child: ListView(
          children: <Widget>[
            UserAccountsDrawerHeader(
                accountName: const Text("Módulo 01"),
                accountEmail: const Text("modulo01mobile@omnimed.com.br"),
                currentAccountPicture: Container(
                  decoration: const BoxDecoration(
                    borderRadius: BorderRadius.all(Radius.circular(50.0)),
                  ),
                  child: Image.asset("assets/images/usuario.png"),
                ),
                decoration: const BoxDecoration(
                  color: Color(0xFF0f928c),
                )),
            ListTile(
              leading: const Icon(
                Icons.arrow_circle_right_outlined,
                color: Color(0xFF0f928c),
              ),
              title: const Text("Sobre"),
              trailing: const Icon(
                Icons.arrow_right,
                color: Color(0xFF0f928c),
              ),
              onTap: () => Navigator.pushNamed(context, "/SobreView"),
            ),
            ListTile(
              leading: const Icon(
                Icons.arrow_circle_right_outlined,
                color: Color(0xFF0f928c),
              ),
              title: const Text("Login"),
              trailing: const Icon(
                Icons.arrow_right,
                color: Color(0xFF0f928c),
              ),
              onTap: () => Navigator.pushNamed(context, "/LoginView"),
            ),
            ListTile(
              leading: const Icon(
                Icons.arrow_circle_right_outlined,
                color: Color(0xFF0f928c),
              ),
              title: const Text("Recuperar Senha"),
              trailing: const Icon(
                Icons.arrow_right,
                color: Color(0xFF0f928c),
              ),
              onTap: () => Navigator.pushNamed(context, "/SenhaView"),
            ),
            ListTile(
              leading: const Icon(
                Icons.arrow_circle_right_outlined,
                color: Color(0xFF0f928c),
              ),
              title: const Text("Cadastrar Paciente"),
              trailing: const Icon(
                Icons.arrow_right,
                color: Color(0xFF0f928c),
              ),
              onTap: () => Navigator.pushNamed(context, "/PacienteView"),
            ),
            ListTile(
              leading: const Icon(
                Icons.arrow_circle_right_outlined,
                color: Color(0xFF0f928c),
              ),
              title: const Text("Página Inicial"),
              trailing: const Icon(
                Icons.arrow_right,
                color: Color(0xFF0f928c),
              ),
              onTap: () => Navigator.pushNamed(context, "/LogadoView"),
            ),
            ListTile(
              leading: const Icon(
                Icons.arrow_circle_right_outlined,
                color: Color(0xFF0f928c),
              ),
              title: const Text("Página Inicial"),
              trailing: const Icon(
                Icons.arrow_right,
                color: Color(0xFF0f928c),
              ),
              onTap: () => Navigator.pushNamed(context, "/NaoLogadoView"),
            ),
          ],
        ),
      ),
      body: Container(
        decoration: const BoxDecoration(
          color: Color(0xFF0f928c),
        ),
      ),
    );
  }
}
