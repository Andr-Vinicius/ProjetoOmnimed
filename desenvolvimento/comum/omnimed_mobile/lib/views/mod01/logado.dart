import 'package:flutter/material.dart';

class LogadoView extends StatefulWidget {
  const LogadoView({Key? key}) : super(key: key);

  @override
  State<LogadoView> createState() => _LogadoViewState();
}

class _LogadoViewState extends State<LogadoView> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          title: const Text(
            "Seja Bem Vindo(a), {current_user}!",
            style: TextStyle(
              color: Color(0xFF0f928c),
              fontWeight: FontWeight.bold,
            ),
          ),
          backgroundColor: Colors.white,
          foregroundColor: const Color(0xFF0f928c),
          centerTitle: true,
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
                  Icons.contact_page,
                  color: Color(0xFF0f928c),
                ),
                title: const Text("Perfil"),
                trailing: const Icon(
                  Icons.arrow_right,
                  color: Color(0xFF0f928c),
                ),
                onTap: () => Navigator.pushNamed(context, "/PerfilView"),
              ),
              ListTile(
                leading: const Icon(
                  Icons.campaign,
                  color: Color(0xFF0f928c),
                ),
                title: const Text("Contate-nos"),
                trailing: const Icon(
                  Icons.arrow_right,
                  color: Color(0xFF0f928c),
                ),
                onTap: () => Navigator.pushNamed(context, "/ContatoView"),
              ),
              ListTile(
                leading: const Icon(
                  Icons.logout,
                  color: Color.fromARGB(255, 167, 15, 13),
                ),
                title: const Text("Sair",
                    style: TextStyle(
                      color: Color.fromARGB(255, 118, 17, 17),
                      fontWeight: FontWeight.bold,
                    )),
                onTap: () => Navigator.pushNamed(context, "/LoginView"),
              )
            ],
          ),
        ),
        body: Container(
          decoration: const BoxDecoration(color: Color.fromARGB(255, 17, 52, 50)),
          child: ListView(children: <Widget>[
            Column(
              children: [
                (Padding(
                    padding: const EdgeInsets.symmetric(horizontal: 20, vertical: 20),
                    child: Image.asset(
                      "assets/icons/omnimed_icon.png",
                      height: 200,
                    ))),
              ],
            ),
            const SizedBox(
              height: 32,
            ),
            Column(
              children: [
                (Padding(
                    padding: EdgeInsets.symmetric(horizontal: 100),
                    child: Text(
                      "Selecione uma das opções a seguir:",
                      textAlign: TextAlign.center,
                      style: TextStyle(
                        color: Color.fromARGB(255, 251, 255, 254),
                        fontWeight: FontWeight.bold,
                        fontSize: 32
                      ),
                    ))),
              ],
            ),
            Padding(
              padding: const EdgeInsets.all(40.0),
              child: (ElevatedButton(
                onPressed: () {
                  Navigator.pushNamed(context, "/");
                },
                child: const Text("Cadastro Pessoal",
                textAlign: TextAlign.center,
                    style: TextStyle(
                      color: Color.fromARGB(255, 250, 255, 249),
                      fontSize: 24,
                    )),
                style: ButtonStyle(
                    backgroundColor: MaterialStateProperty.all(Color.fromARGB(255, 112, 156, 142)),
                    padding:
                        MaterialStateProperty.all(const EdgeInsets.symmetric(horizontal: 150, vertical: 90)),
                    textStyle: MaterialStateProperty.all(
                        const TextStyle(fontSize: 30))),
              )),
            ),
            Padding(
              padding: const EdgeInsets.all(40.0),
              child: (ElevatedButton(
                onPressed: () {
                  Navigator.pushNamed(context, "/");
                },
                child: const Text("Gestão de Dependentes",
                textAlign: TextAlign.center,
                    style: TextStyle(
                      color: Color.fromARGB(255, 250, 255, 249),
                      fontSize: 24,
                    )),
                style: ButtonStyle(
                    backgroundColor: MaterialStateProperty.all(Color.fromARGB(255, 112, 156, 142)),
                    padding:
                        MaterialStateProperty.all(const EdgeInsets.symmetric(horizontal: 150, vertical: 90)),
                    textStyle: MaterialStateProperty.all(
                        const TextStyle(fontSize: 30))),
              )),
            ),
            Padding(
              padding: const EdgeInsets.all(40.0),
              child: (ElevatedButton(
                onPressed: () {
                  Navigator.pushNamed(context, "/");
                },
                child: const Text("Agendar Atendimento Online",
                textAlign: TextAlign.center,
                    style: TextStyle(
                      color: Color.fromARGB(255, 250, 255, 249),
                      fontSize: 24,
                    )),
                style: ButtonStyle(
                    backgroundColor: MaterialStateProperty.all(Color.fromARGB(255, 112, 156, 142)),
                    padding:
                        MaterialStateProperty.all(const EdgeInsets.symmetric(horizontal: 150, vertical: 90)),
                    textStyle: MaterialStateProperty.all(
                        const TextStyle(fontSize: 30))),
              )),
            ),
            Padding(
              padding: const EdgeInsets.all(40.0),
              child: (ElevatedButton(
                onPressed: () {
                  Navigator.pushNamed(context, "/");
                },
                child: const Text("Notificação de Direcionamento a um Especialista",
                textAlign: TextAlign.center,
                    style: TextStyle(
                      color:Color.fromARGB(255, 250, 255, 249),
                      fontSize: 24,
                    )),
                style: ButtonStyle(
                    backgroundColor: MaterialStateProperty.all(Color.fromARGB(255, 112, 156, 142)),
                    padding:
                        MaterialStateProperty.all(const EdgeInsets.symmetric(horizontal: 150, vertical: 90)),
                    textStyle: MaterialStateProperty.all(
                        const TextStyle(fontSize: 30))),
              )),
            ),
            Padding(
              padding: const EdgeInsets.all(40.0),
              child: (ElevatedButton(
                onPressed: () {
                  Navigator.pushNamed(context, "/");
                },
                child: const Text("Gestão de Triagem de Atendimentos",
                textAlign: TextAlign.center,
                    style: TextStyle(
                      color:Color.fromARGB(255, 250, 255, 249),
                      fontSize: 24,
                    )),
                style: ButtonStyle(
                    backgroundColor: MaterialStateProperty.all(Color.fromARGB(255, 112, 156, 142)),
                    padding:
                        MaterialStateProperty.all(const EdgeInsets.symmetric(horizontal: 150, vertical: 90)),
                    textStyle: MaterialStateProperty.all(
                        const TextStyle(fontSize: 30))),
              )),
            ),
            Padding(
              padding: const EdgeInsets.all(40.0),
              child: (ElevatedButton(
                onPressed: () {
                  Navigator.pushNamed(context, "/");
                },
                child: const Text("Gestão do Atendimento realizadas por Médicos Especialistas",
                textAlign: TextAlign.center,
                    style: TextStyle(
                      color:Color.fromARGB(255, 250, 255, 249),
                      fontSize: 24,
                    )),
                style: ButtonStyle(
                    backgroundColor: MaterialStateProperty.all(Color.fromARGB(255, 112, 156, 142)),
                    padding:
                        MaterialStateProperty.all(const EdgeInsets.symmetric(horizontal: 150, vertical: 90)),
                    textStyle: MaterialStateProperty.all(
                        const TextStyle(fontSize: 30))),
              )),
            ),
            Padding(
              padding: const EdgeInsets.all(40.0),
              child: (ElevatedButton(
                onPressed: () {
                  Navigator.pushNamed(context, "/");
                },
                child: const Text("Vizualizar os Detalhes de Registro do último Atendimento",
                textAlign: TextAlign.center,
                    style: TextStyle(
                      color:Color.fromARGB(255, 250, 255, 249),
                      fontSize: 24,
                    )),
                style: ButtonStyle(
                    backgroundColor: MaterialStateProperty.all(Color.fromARGB(255, 112, 156, 142)),
                    padding:
                        MaterialStateProperty.all(const EdgeInsets.symmetric(horizontal: 150, vertical: 90)),
                    textStyle: MaterialStateProperty.all(
                        const TextStyle(fontSize: 30))),
              )),
            ),
            Padding(
              padding: const EdgeInsets.all(40.0),
              child: (ElevatedButton(
                onPressed: () {
                  Navigator.pushNamed(context, "/");
                },
                child: const Text("Gestão de Consultas Realizadas e Retornos Médicos",
                textAlign: TextAlign.center,
                    style: TextStyle(
                      color:Color.fromARGB(255, 250, 255, 249),
                      fontSize: 24,
                    )),
                style: ButtonStyle(
                    backgroundColor: MaterialStateProperty.all(Color.fromARGB(255, 112, 156, 142)),
                    padding:
                        MaterialStateProperty.all(const EdgeInsets.symmetric(horizontal: 150, vertical: 90)),
                    textStyle: MaterialStateProperty.all(
                        const TextStyle(fontSize: 30))),
              )),
            ),
            Padding(
              padding: const EdgeInsets.all(40.0),
              child: (ElevatedButton(
                onPressed: () {
                  Navigator.pushNamed(context, "/");
                },
                child: const Text("Vizualização de Histórico e Resultados de Exames Realizados",
                textAlign: TextAlign.center,
                    style: TextStyle(
                      color:Color.fromARGB(255, 250, 255, 249),
                      fontSize: 24,
                    )),
                style: ButtonStyle(
                    backgroundColor: MaterialStateProperty.all(Color.fromARGB(255, 112, 156, 142)),
                    padding:
                        MaterialStateProperty.all(const EdgeInsets.symmetric(horizontal: 150, vertical: 90)),
                    textStyle: MaterialStateProperty.all(
                        const TextStyle(fontSize: 30))),
              )),
            ),
          ]),
        ));
  }
}
