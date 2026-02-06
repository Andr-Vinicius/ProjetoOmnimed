import 'package:flutter/material.dart';

class HomeMod02 extends StatefulWidget {
  const HomeMod02({Key? key}) : super(key: key);

  @override
  State<HomeMod02> createState() => _HomeMod02State();
}

class _HomeMod02State extends State<HomeMod02> {
  String route = "/";

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
                accountName: const Text("Módulo 02"),
                accountEmail: const Text("modulo02mobile@omnimed.com.br"),
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
              title: const Text("Agendar Consulta"),
              trailing: const Icon(
                Icons.arrow_right,
                color: Color(0xFF0f928c),
              ),
              onTap: () => Navigator.pushNamed(context, "/agendar-consulta"),
            ),
            ListTile(
              leading: const Icon(
                Icons.list,
                color: Color(0xFF0f928c),
              ),
              title: const Text("Listar Agendamentos"),
              trailing: const Icon(
                Icons.arrow_right,
                color: Color(0xFF0f928c),
              ),
              onTap: () => Navigator.pushNamed(context, "/listar-agendamentos"),
            ),
            ListTile(
              leading: const Icon(
                Icons.note_alt_outlined,
                color: Color(0xFF0f928c),
              ),
              title: const Text("Cadastrar Prescrição"),
              trailing: const Icon(
                Icons.arrow_right,
                color: Color(0xFF0f928c),
              ),
              onTap: () => Navigator.pushNamed(context, "/cadastrar-prescicao"),
            ),
            ListTile(
              leading: const Icon(
                Icons.list_alt,
                color: Color(0xFF0f928c),
              ),
              title: const Text("Listar Prescrições"),
              trailing: const Icon(
                Icons.arrow_right,
                color: Color(0xFF0f928c),
              ),
              onTap: () => Navigator.pushNamed(context, "/listar-prescricoes"),
            ),
            ListTile(
              leading: const Icon(
                Icons.photo_camera_front,
                color: Color(0xFF0f928c),
              ),
              title: const Text("Realizar Consulta"),
              trailing: const Icon(
                Icons.arrow_right,
                color: Color(0xFF0f928c),
              ),
              onTap: () => Navigator.pushNamed(context, "/realizar-consulta"),
            ),
            ListTile(
              leading: const Icon(
                Icons.list_alt,
                color: Color(0xFF0f928c),
              ),
              title: const Text("Agendamentos do Dia"),
              trailing: const Icon(
                Icons.arrow_right,
                color: Color(0xFF0f928c),
              ),
              onTap: () =>
                  Navigator.pushNamed(context, "/listar-agendamentos-dia"),
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
