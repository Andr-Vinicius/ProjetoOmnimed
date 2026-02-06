import 'package:flutter/material.dart';

class HomeMod03 extends StatefulWidget {
  const HomeMod03({Key? key}) : super(key: key);

  @override
  State<HomeMod03> createState() => _HomeMod03State();
}

class _HomeMod03State extends State<HomeMod03> {
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
              accountName: const Text("Módulo 03"),
              accountEmail: const Text("modulo03mobile@omnimed.com.br"),
              currentAccountPicture: Container(
                decoration: const BoxDecoration(
                  borderRadius: BorderRadius.all(Radius.circular(50.0)),
                ),
                child: Image.asset("assets/images/usuario.png"),
              ),
              decoration: const BoxDecoration(
                color: Color(0xFF0f928c),
              )
            ),
            ListTile(
              leading: const Icon(
                Icons.pending_actions_outlined,
                color: Color(0xFF0f928c),
              ),
              title: const Text("Solicitar Exames"),
              trailing: const Icon(
                Icons.arrow_right,
                color: Color(0xFF0f928c),
              ),
              onTap: () => Navigator.pushNamed(context, "/solicitar-exames-pacientes"),
            ),
            ListTile(
              leading: const Icon(
                Icons.view_list_outlined,
                color: Color(0xFF0f928c),
              ),
              title: const Text("Visualizar Exames"),
              trailing: const Icon(
                Icons.arrow_right,
                color: Color(0xFF0f928c),
              ),
              onTap: () => Navigator.pushNamed(context, "/visualizar-exames-pacientes"),
            ),
            ListTile(
              leading: const Icon(
                Icons.medical_information_outlined,
                color: Color(0xFF0f928c),
              ),
              title: const Text("Guia Médico"),
              trailing: const Icon(
                Icons.arrow_right,
                color: Color(0xFF0f928c),
              ),
              onTap: () => Navigator.pushNamed(context, "/guia-medico-especialidades"),
            ),
            ListTile(
              leading: const Icon(
                Icons.payment_outlined,
                color: Color(0xFF0f928c),
              ),
              title: const Text("Gestão dos Pagamentos"),
              trailing: const Icon(
                Icons.arrow_right,
                color: Color(0xFF0f928c),
              ),
              onTap: () => Navigator.pushNamed(context, "/gestao-pagamentos"),
            ),
          ],
        ),
      ),
      body: Container(
        decoration: const BoxDecoration(color: Color(0xFF0f928c),),
      ),
    );
  }
}
